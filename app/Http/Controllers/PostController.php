<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostPublishedMail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $posts = Post::with('category','tags','user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        if($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail')->store('posts','public');
        }

        $post = Post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'thumbnail'=>$image ?? null,
            'status'=>$request->status,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->id()
        ]);

        $post->tags()->sync($request->tags);
        
        if($request->status == 'published'){
            Mail::to($post->user->email)->send(new PostPublishedMail($post));
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        $oldStatus = $post->status;

        if ($request->hasFile('thumbnail')) {

            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $image = $request->file('thumbnail')->store('posts', 'public');
        } else {
            $image = $post->thumbnail;
        }

        $post->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'status'=>$request->status,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id,
            'thumbnail'=>$image
        ]);

        $post->tags()->sync($request->tags);

        if($oldStatus == 'draft' && $request->status == 'published'){
            Mail::to($post->user->email)->send(new PostPublishedMail($post));
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(auth()->id() != $post->user_id){
            abort(403);
        }

        $post->delete();
        return back();
    }
}
