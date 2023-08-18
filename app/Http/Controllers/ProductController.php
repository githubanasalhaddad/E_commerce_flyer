<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        $categorys = Category::all();
        return response()->view('cms.product.allProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorys = Category::all();
        $subCategorys = subCategory::all();
        return response()->view('cms.product.addProduct', compact('categorys', 'subCategorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator::make($request->all(), [
        //     'name' => 'required|min:3|max:15',
        //     'category_id' => 'required',
        //     'shortDescr' => 'required',
        //     'longDescr' => 'required',
        //     'count' => 'required',
        //     'price' => 'required',
        // ])->validate();

        $request->validate([
            'img' => 'required'
        ]);


        $category_id = $request->category_id;
        $categoryName = Category::where('id', $category_id)->value('name');
        $subCategory_id = $request->subCategory_id;
        $subCategoryName = subCategory::where('id', $subCategory_id)->value('subCategoryName');

        $image = $request->file('img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;



        $product = new Product();
        $product->name = $request->get('name');
        $product->shortDescr = $request->get('shortDescr');
        $product->longDescr = $request->get('longDescr');
        $product->price = $request->get('price');
        $product->count = $request->get('quantity');
        $product->slug = strtolower(str_replace(' ', '-', $request->name));
        $product->category_id = $category_id;
        $product->categoryName = $categoryName;
        $product->subCategory_id = $subCategory_id;
        $product->subCategoryName = $subCategoryName;
        $product->img = $img_url;
        // $product->img = 'tttt';
        $isSaved = $product->save();



        Category::where('id', $category_id)->increment('subCategoryCount', 1);
        subCategory::where('id', $subCategory_id)->increment('product_count', 1);
        session()->flash('message', $isSaved ? 'Product created successfully ' : 'Failed to create Product');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $products = Product::findorFail($id);
        $categorys = Category::all();
        $subCategorys = subCategory::all();
        return view('cms.product.edit', compact('products', 'categorys', 'subCategorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $category_id = $request->category_id;
        $categoryName = Category::where('id', $category_id)->value('name');
        $subCategory_id = $request->subCategory_id;
        $subCategoryName = subCategory::where('id', $subCategory_id)->value('subCategoryName');
        $prod = Product::findorFail($id);
        $previousImg = $prod->img;

        
        $prod->name = $request->get('name');
        $prod->shortDescr = $request->get('shortDescr');
        $prod->longDescr = $request->get('longDescr');
        $prod->price = $request->get('price');
        $prod->count = $request->get('quantity');
        $prod->slug = strtolower(str_replace(' ', '-', $request->name));
        $prod->category_id = $category_id;
        $prod->categoryName = $categoryName;
        $prod->subCategory_id = $subCategory_id;
        $prod->subCategoryName = $subCategoryName;
        $prod->img = $previousImg;
        $isSaved = $prod->save();

        session()->flash('message', $isSaved ? 'Product Updated successfully ' : 'Failed to Updated Product');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Product::findorFail($id);
        $isDeleted =  $products->delete();
        session()->flash('message', $isDeleted ? 'Product Deleted successfully' : 'Product doesnt deleted');
        return redirect()->back();
    }



    public function EditProductImg($id)
    {
        $products = Product::findorFail($id);
        return response()->view('cms.product.editImg', compact('products'));
    }

    public function updateImgProduct(Request $request, $id)
    {
        $request->validate([
            'img' => 'required'
        ]);
        $id = $request->id;
        $image = $request->file('img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        $isUpdated = Product::findorFail($id)->update([
            'img' => $img_url
        ]);

        session()->flash('message', $isUpdated ? 'I Image Updated successfully ' : 'Failed to create Product');
        return redirect()->back();
    }
}
