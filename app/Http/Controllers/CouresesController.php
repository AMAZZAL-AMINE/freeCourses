<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouresesController extends Controller
{
    //return to page courses
    public function index() {
        return view('cours.index');
    }
}


