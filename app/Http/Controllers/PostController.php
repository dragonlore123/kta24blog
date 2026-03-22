<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Create the post
        $post = new Post($request->validated());
        $post->user()->associate(Auth::user());
        $post->save();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('images'); // stored in storage/app/images
            $image = new Image();
            $image->path = Storage::url($file); // generates a URL for public access
            $image->post()->associate($post);
            $image->save();
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        // Optional: handle new image upload on update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::delete(str_replace('/storage/', 'public/', $post->image->path));
                $post->image->delete();
            }

            $file = $request->file('image')->store('images');
            $image = new Image();
            $image->path = Storage::url($file);
            $image->post()->associate($post);
            $image->save();
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete associated image if exists
        if ($post->image) {
            Storage::delete(str_replace('/storage/', 'public/', $post->image->path));
            $post->image->delete();
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
