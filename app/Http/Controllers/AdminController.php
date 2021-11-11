<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //put hackers and users away if not admin
    public function __construct() {
        $this->middleware('auth');
    }


    //show admin dahsboard (admin home pade)
    public function Dashboard() {
        return view("admin.dashboard");
    }

    //function for showint add new cours
    public function addCoursePage() {
        $categories = Category::all();
        return view('admin.addcours', compact('categories'));
    }

    //stire  formData in database mysql
    public function storeCours(Request $request) {
        $data = $request->validate(
            array(
                'title' => ['required'],
                'slug' => ['required'],
                'desc' => ['required'],
                'created_by' => ['required'],
                'url' => ['required', 'url'],
                'img' => ['required', 'image'],
                'category' => ['required'],
            ),
        );

        if($request->hasFile('img')) {

            $imagePath = request('img')->store('courses_image', 'public');

        }

        $cours = new Cours;

        $cours->create(
            array(
                'title' => $data['title'],
                'slug' => $data['slug'],
                'desc' => $data['desc'],
                'created_by' => $data['created_by'],
                'url' => $data['url'],
                'img' => $imagePath,
                'category_id' => $data['category'],
            ), 
        );
        
        return back()->with(
            array(
                'message' => 'Done! Cours Has Been Created Successfuly'
            ),
        );
        
    }

    //add new category function
    public function addCategory() {
        return view('admin.addcategory');
    }

    //store category in database backend function
    public function StoreCategory(Request $request) {
        $data = $request->validate(
            array(
                'name' => 'required',
                'slug' => 'required',
                'img' => 'image'
            ),
        );

        $category = new Category;

        if($request->hasFile('img')) {
            $imgPath = request('img')->store('category_img', 'public');
        }
        $category->create(
            array(
                'name' => $data['name'],
                'slug' => $data['slug'],
                'img' => $imgPath ?? '',
            )
        );

        return back()->with(
            array(
                'message' => 'Category Created Successfuly'
            )
        );
        
    }

    //manage all courses in page admin
    public function manageCourses() {
        $courses = Cours::all();
        //return to view page admin 
        return view('admin.managecourses', compact('categories'));
    }

    //manage all categories in page admin
    public function manageCatgories() {
        $categories = category::all();
        //return to view page admin 
        return view('admin.managegategory', compact('categories'));
    }

    //showing updateing cours forms
    public function showUpdateCours($slug) {
        $cours = Cours::where('slug', $slug)->get();
        return view('admin.updatecours', compact('cours'));
    }
    //updating cours 
    public function updateCours(Request $request, $slug) {
        $data = $request->validate(
            array(
                'title' => ['required'],
                'slug' => ['required'],
                'desc' => ['required'],
                'created_by' => ['required'],
                'url' => ['required', 'url'],
                'img' => ['required', 'image'],
                'category' => ['required'],
            ),
        );  
    }
    if($request->hasFile('img')) {
        $imagePath = request('img')->store('courses_image', 'public');
    }
    $coursTwo = Cours::where('slug', $slug)->get();
    $cours = Cours::where('slug', $slug)->update(
        array(
            'title' => $data['title'],
            'slug' => $data['slug'],
            'desc' => $data['desc'],
            'created_by' => $data['created_by'],
            'url' => $data['url'],
            'img' => $imagePath ?? $coursTwo->img ,
            'category_id' => $data['category'],
        )
    );

    return back()->with(
        array(
            "message" => "Wow My Hero! Cours Has Been Updated Successfuly"
        ),
    );
    
}
