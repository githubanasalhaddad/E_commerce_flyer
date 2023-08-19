<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clientcntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoryPage()
    {
        return response()->view('home.homeLayouts.category');
    }

    public function singleProduct()
    {
        return response()->view('home.homeLayouts.product');
    }

    public function AddCart()
    {
        return response()->view('home.homeLayouts.addToCart');
    }

    public function checkout()
    {
        return response()->view('home.homeLayouts.checkout');
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
