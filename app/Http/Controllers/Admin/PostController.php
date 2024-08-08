<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::orderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:10',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new Company instance
        $post = new post();

        // Assign validated data to the model
        $post->company_name = $validatedData['title'];
        $post->description = $validatedData['description'];

        // Handle the file upload
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $newName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/post'), $newName); // Use public_path() for better practice
            $post->images = 'images/post/' . $newName;
        }

        // Save the post$post$post instance to the database
        $post->save();
        toast('Record added successfully!', 'success');

        // Redirect with a success message
        return redirect()->back();
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
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:10',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new Company instance
        $post =  post::find($id);

        // Assign validated data to the model
        $post->company_name = $validatedData['title'];
        $post->description = $validatedData['description'];

        // Handle the file upload
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $newName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/post'), $newName); // Use public_path() for better practice
            $post->images = 'images/post/' . $newName;
        }

        // Save the post$post$post instance to the database
        $post->update();
        toast('Record updated successfully!', 'success');
        // Redirect with a success message
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Post = Post::find($id);
        $Post->delete();
        toast('Delete  successfully!', 'success');
        return redirect()->back();
    }
}
