<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Clientcntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allCategory()
    {
        $allProducts = Product::all();
        // return $allProducts;
        return response()->view('home.home', compact('allProducts'));
    }


    public function categoryPage($id, $slug)
    {
        $category = Category::findorFail($id);
        // return $category;
        $products = Product::where('category_id', $id)->get();
        // return $products;
        return response()->view('home.homeLayouts.category', compact('category', 'products'));
    }

    public function singleProduct($id)
    {
        $products = Product::findorFail($id);
        $subCategoryId = Product::where('id',  $id)->value('subCategory_id');
        $Relatedproducts = Product::where('subCategory_id', $subCategoryId)->latest()->get();

        return response()->view('home.homeLayouts.singleProduct', compact('products', 'Relatedproducts'));
    }

    public function AddCart()
    {

        $userId = Auth::id();
        $cart_item = Cart::where('user_id', $userId)->get();
        return response()->view('home.homeLayouts.addToCart', compact('cart_item'));
    }

    public function addProductToCart(Request $request)
    {
        Validator::make($request->all(), [
            'quntity' => 'required',
        ])->validate();

        $product_price = $request->price;
        // return   $product_price;
        $quntity = $request->quntity;
        // return   $quntity;
        $price = ($product_price * $quntity);
        // return   $price;
        Cart::insert([

            'product_id' => $request->ProductId,
            'user_id' => Auth::id(),
            'price' => $price,
            'quantity' => $request->quntity,
        ]);

        return redirect()->route('addCart')->with('massage', 'Your item Added to cart successfully');
    }

    public function deleteProductFromCart($id)
    {
        $productCart = Cart::findorFail($id);
        $isDeleted =  $productCart->delete();
        session()->flash('message', $isDeleted ? 'Product Deleted successfully' : 'Product doesnt deleted');
        return redirect()->back();
    }

    public function shippingAddress()
    {
        return view('home.homeLayouts.shippingAddress');
    }


    public function AddShippingAddress(Request $request)
    {
        Validator::make($request->all(), [
            'postal_code' => 'required',
            'city_name' => 'required',
            'phone_number' => 'required'
        ])->validate();

        $shippingAddress = new ShippingInfo();
        $shippingAddress->postal_code = $request->postal_code;
        $shippingAddress->city_name = $request->city_name;
        $shippingAddress->phone_number = $request->phone_number;
        $shippingAddress->user_id = Auth::id();
        $isSaved = $shippingAddress->save();
        return redirect()->route('checkout')->with('massage', 'Shipping Address created successfully');
    }



    public function checkout()
    {
        $user_id  = Auth::id();
        $cart_item = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();
        return response()->view('home.homeLayouts.checkout', compact('cart_item', 'shipping_address'));
    }



    public function PlaceOrder()
    {

        $user_id = Auth::id();
        $cart_item = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        foreach ($cart_item as $item) {
            Order::insert([
                'user_id' => $user_id,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_postcode' => $shipping_address->postal_code,
                'product_id' => $item->id,
                'total_price' => $item->price,
                'quantity' => $item->quantity,

            ]);

            $id = $item->id;
            Cart::findorFail($id)->delete();
        }

        return redirect()->route('pendingOrder')->with('massage', 'Your Order Has Been Placed ');
    }




    public function pendingOrder()

    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return response()->view('home.homeLayouts.pendingOrder', compact('pending_orders'));
    }

    public function userProfile()
    {
        return response()->view('home.homeLayouts.userProfile');
    }


    public function newRelease()
    {
        return response()->view('home.homeLayouts.newRelease');
    }

    public function todayDeal()
    {
        return response()->view('home.homeLayouts.todayDeal');
    }

    public function costumerService()
    {
        return response()->view('home.homeLayouts.costumerService');
    }
}
