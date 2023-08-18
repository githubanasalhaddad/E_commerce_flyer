<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subCategors = subCategory::all();
        return response()->view('cms.subCategory.allsubCategory', compact('subCategors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categotys = Category::all();
        return response()->view('cms.subCategory.addsubCategory', compact('categotys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Validator::make($request->all(), [
            'name' => 'required|min:3|max:15',
            'category_id' => 'required'
        ])->validate();

        $subCategors = new subCategory();
        $category_id = $request->category_id;
        $categoryName = Category::where('id', $category_id)->value('name');
        $subCategors->subCategoryName = $request->get('name');
        $subCategors->slug = strtolower(str_replace(' ', '-', $request->name));
        $subCategors->category_id = $category_id;
        $subCategors->category_name = $categoryName;

        $isSaved = $subCategors->save();

        Category::where('id', $category_id)->increment('subCategoryCount', 1);
        session()->flash('message', $isSaved ? 'SUB Category created successfully ' : 'Failed to create SUB Category');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(subCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categotys = Category::all();
        $subCategors = subCategory::findorFail($id);
        return response()->view('cms.subCategory.edit', compact('subCategors', 'categotys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //
        Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required'
        ])->validate();

        $subCategors = subCategory::findorFail($id);
        $subCategors->subCategoryName = $request->name;
        $category_id = $request->category_id;
        $categoryName = Category::where('id', $category_id)->value('name');
        $subCategors->category_id = $category_id;
        $subCategors->category_name = $categoryName;
        $isUpdated = $subCategors->save();
        session()->flash('message', $isUpdated ? ' SUB Category Updated successfully' : 'SUB Category doesnt Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $subCategors = subCategory::findorFail($id);
        $isDeleted =  $subCategors->delete();
        session()->flash('message', $isDeleted ? 'SUB Category Deleted successfully' : 'SUB Category doesnt deleted');
        return redirect()->back();
    }
}
