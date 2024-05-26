<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts'=>Post::where('user_id', auth()->user()->id)->get(),
            'sidebar_posts'=>Post::where('user_id', auth()->user()->id)->latest()->limit(3)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories'=>Category::all(),
            'sidebar_posts'=>Post::where('user_id', auth()->user()->id)->latest()->limit(3)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>['required', 'max:255'],
            'slug'=>['required'],
            'image'=>['image', 'file', 'max:3024'],
            'category_id'=>['required'],
            'body'=>['required'],
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('posts-image');
        }

        $slug = $validatedData['slug'];
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $validatedData['slug'] . '-' . $count;
            $count++;
        }

        $validatedData['slug'] = $slug;

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }
        return view('dashboard.posts.detail', [
            'post' => $post,
            'sidebar_posts'=>Post::where('user_id', auth()->user()->id)->latest()->limit(3)->get()
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }
        return view('dashboard.posts.edit', [
            'categories'=>Category::all(),
            'post'=>$post,
            'sidebar_posts'=>Post::where('user_id', auth()->user()->id)->latest()->limit(3)->get()
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'=>['required', 'max:255'],
            'slug'=>['required'],
            'category_id'=>['required'],
            'image'=>['image', 'file', 'max:3024'],
            'body'=>['required'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 200);

        $slug = $validatedData['slug'];
        $count = 1;

        if ($slug != $post->slug) {
            $count = 1;
            $originalSlug = $slug;
    
            // Loop to ensure the slug is unique
            while (Post::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
    
            $validatedData['slug'] = $slug;
        }

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('posts-image');
        }

        $validatedData['slug'] = $slug;

        $post->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post "' . $post->title . '" has been deleted!');

    }
    
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
