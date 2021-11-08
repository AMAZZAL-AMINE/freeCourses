<?php

namespace App\Http\Controllers;

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
}
