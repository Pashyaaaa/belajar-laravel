<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = "in $category->category_name";
        }
        if(request('author')){
            $user = User::firstWhere('username', request('author'));
            $title = "by $user->name";
        }

        return view('posts', [
            "title"=>"All Posts $title",
            "posts"=>Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }
    public function detail(Post $post) {
        return view('post', [
            "title"=>"Detail Post",
            "post" => $post
        ]);
    }
    
}
