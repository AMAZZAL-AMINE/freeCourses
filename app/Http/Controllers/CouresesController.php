<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cours;
use Illuminate\Http\Request;

class CouresesController extends Controller
{
    //return to page courses
    public function index() {
        $courses = Cours::all();
        return view('cours.index',compact('courses'));
    }
    
    //get courses by catefories products
    public function coursByCategory($slug) {

        $category = Category::where('slug', $slug)->first();
        $courses = $category->courses;
        return view('cours.category', compact('courses'));
    }

    //return to categories page
    public function allCategories() {
        $categories = Category::has('courses')->get();
        return view('cours.allcategories', compact('categories'));
    }
}


