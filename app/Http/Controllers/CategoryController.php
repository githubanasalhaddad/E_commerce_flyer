<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categorys = Category::all();
        return response()->view('cms.category.allCategory', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('cms.category.addCategory');
        //    return "hi world"; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        Validator::make($request->all(), [
            'name' => 'required|min:3|max:15'
        ])->validate();

        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = strtolower(str_replace(' ','-',$request->name));


        $isSaved = $category->save();
        session()->flash('message', $isSaved ? 'Category created successfully ' : 'Failed to create Category');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {


        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categorys = Category::findorFail($id);
        return response()->view('cms.category.edit', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        Validator::make($request->all(), [
            'name' => 'required',
        ])->validate();

        $category = Category::findorFail($id);
        $category->name = $request->name;
        $isUpdated = $category->save();
        session()->flash('message', $isUpdated ? 'Category Updated successfully' : 'Category doesnt Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = Category::findorFail($id);
        $isDeleted =  $category->delete();
        session()->flash('message', $isDeleted ? 'Category Deleted successfully' : 'Category doesnt deleted');
        return redirect()->back();
    }
}
