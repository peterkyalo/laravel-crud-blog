<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->paginate(5);
        return view('posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Get the image uploaded by the user.
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Get the authenticated user to associate the post with.
        $user = Auth::user();
        // Create a new post instance and save it to the database.
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->user_id = $user->id;
        $post->image = $imagePath;

        // Save the post to the database.
        $post->save();
        // Redirect the user to the posts index page with a success message.
        return redirect()->route('posts.index')->with('success', 'Post created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Get the post with the category and user relationship.
        // $post = Post::with('category', 'user')->find($post->id);
        $post = $post->load('category', 'user'); // Eager loading
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // // Get the post with the category and user relationship.
        // $post = Post::with('category')->find($post->id);
        // // Get all categories to populate the dropdown in the edit form.
        // $categories = Category::all();
        // Pass the post and categories to the edit form.
        $post = $post->load('category', 'user'); // Eager loading
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Check if there's an existing image and delete it
            if ($post->image) {
                // Delete the old image
                Storage::disk('public')->delete($post->image);
                // Storage::delete($post->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $user = Auth::user();
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        }
    }
}
