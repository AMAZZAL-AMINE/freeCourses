<?php

namespace App\Http\Controllers;

use App\Models\Cours;
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
        return view('admin.addcours');
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
                'message' => 'Done ! Product Created Successfuly'
            ),
        );
        
    }

    
    
}
