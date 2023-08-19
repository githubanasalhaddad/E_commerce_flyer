<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allProducts = Product::all();
        return view('home.home', compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
}
