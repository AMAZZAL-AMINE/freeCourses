<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CouresesController extends Controller
{
    //return to page courses
    public function index() {
        $courses = Cours::all();
        return view('cours.index',compact('courses'));
    }
}


