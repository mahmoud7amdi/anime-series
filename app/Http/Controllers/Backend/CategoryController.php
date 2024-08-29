<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view('backend.category.all_category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        category::create([
            'name'  => $request->name
        ]);
        return redirect()->route('all.categories')->with('success', 'category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = category::findOrFail($id);
        return view('backend.category.edit_category',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request)
    {
        $category_id = $request->id ;
        Category::findOrFail($category_id)->update([
            'name' => $request->name,
        ]);
         $notification = array(
             'message' => 'Category Updated Successfully',
             'alert_type' => 'success'
         );
         return redirect()->route('all.categories')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.categories')->with($notification);
    }
}
