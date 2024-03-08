<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Course;

class CategoryController extends Controller
{
    public function index($slug){
        $category = Category::where("slug", $slug)->first();
        $courses = Course::where('category_id', $category->id)->paginate(10);
        return view ('client.category.index', compact('category', 'courses'));
    }

    public function view_categories(){
        $categories = Category::paginate(10);
        return view ('client.category.categories', compact('categories'));
    }
}