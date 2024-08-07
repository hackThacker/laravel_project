<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        // Create a new categoriy instance
        $categories = new Category();
        // Assign validated data to the model
        $categories->title = $validatedData['title'];
        $categories->slug = Str::slug($request->title);
        // Save the categories $categories instance to the database
        $categories->save();
        toast('Record added successfully!', 'success');
        // Redirect with a success message
        return redirect()->route('category.index');
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
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        // Create a new categoriy instance
        $categories =  Category::find($id);
        // Assign validated data to the model
        $categories->title = $validatedData['title'];
        $categories->slug = Str::slug($request->title);
        // Save the categories $categories instance to the database
        $categories->update();
        toast('Record updated successfully!', 'success');
        // Redirect with a success message
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
      $categories->delete();
      return redirect()->back();
    }
}
