<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    public function index(){
        return view('categories', [
            "title" => "Categories",
            "categories" => Category::all()
        ]);
    }
}
