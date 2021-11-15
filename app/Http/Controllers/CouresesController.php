<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cours;
use Illuminate\Http\Request;

class CouresesController extends Controller
{
    //return to page courses
    public function index() {
        $courses = Cours::paginate(15);
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

    //create function cours details
    public function coursDetails($slug) {
        //find product by slug
        $cours = Cours::where('slug', $slug)->first();
        //get some courses with same categories 
        $courses = Cours::where('category_id', $cours->category_id)->paginate(5);
        //return to page details with cours who has this slug
        return view('cours.coursdetails', compact('cours','courses'));
    }

}


