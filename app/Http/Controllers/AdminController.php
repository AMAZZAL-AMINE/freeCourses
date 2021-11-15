<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    
            //put hackers and users away if not admin
    public function __construct() {
        $this->middleware('auth');
    }


    //show admin dahsboard (admin home pade)
    public function Dashboard() {
        if(auth()->user()->id_admin == "yes") {
          return view("admin.dashboard");
        }else {
            echo '
              <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
                  LOOOOOOOOOOOOOOOOL <br>
                  I think You Are not loking for courses, I think You Loking For problems my kid;
                  <br>
                  Go Away Please, Dont be stupid.
              
              
              </h1>
            ';
        }
    }

    //function for showint add new cours
    public function addCoursePage() {
      if(auth()->user()->id_admin == "yes") {
        $categories = Category::all();
        return view('admin.addcours', compact('categories'));
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //stire  formData in database mysql
    public function storeCours(Request $request) {
      if(auth()->user()->id_admin == "yes") {
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
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //add new category function
    public function addCategory() {
      if(auth()->user()->id_admin == "yes") {
        return view('admin.addcategory');
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //store category in database backend function
    public function StoreCategory(Request $request) {
      if(auth()->user()->id_admin == "yes") {
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
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //manage all courses in page admin
    public function manageCourses() {
      if(auth()->user()->id_admin == "yes") {
        $courses = Cours::all();
        //return to view page admin 
        return view('admin.managecourses', compact('courses'));
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //manage all categories in page admin
    public function manageCatgories() {
      if(auth()->user()->id_admin == "yes") {
        $categories = category::all();
        //return to view page admin 
        return view('admin.managegategory', compact('categories'));
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //showing updateing cours forms
    public function showUpdateCours($slug) {
      if(auth()->user()->id_admin == "yes") {
        $cours = Cours::find($slug);
        $categories = Category::all();
        return view('admin.upcours', compact('cours','categories'));
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }


    //updating cours 
    public function updateCours(Request $request, $slug) {
      if(auth()->user()->id_admin == "yes") {
        $data = $request->validate(
            array(
                'title' => 'required',
                'slug' => 'required',
                'desc' => 'required',
                'created_by' => 'required',
                'url' => ['required', 'url'],
                'img' => ['image'],
                'category' => ['required'],
            )
        );      
        
        if($request->hasFile('img')) {
            $imagePath = request('img')->store('courses_image', 'public');
        }
        
        $coursTwo = Cours::find($slug);
        $coursTwo->update(
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

      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //update categories 
    public function updateCategoriesForm($id) {
      if(auth()->user()->id_admin == "yes") {
        //showing update form 
        $category = Category::find($id);
        return view('admin.updatecategory', compact('category'));
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //store new updated cours in data base
    public function categoryUpdate($id, Request $request) {
      if(auth()->user()->id_admin == "yes") {
        $category = Category::find($id);
        $data = $request->validate(
            array(
                'name' => 'required',
                'slug' => 'required',
                'img' => 'image'
            )
        );

        if($request->hasFile('img')) {
            $imgPath = request('img')->store('category_img', 'public');
        }

        $category->update(
            array(
                'name' => $data['name'],
                'slug' => $data['slug'],
                'img' => $imgPath ?? $category->img
            )
        );

        return back()->with(
            array(
                'message' => 'Oh Thats Fast Bro!, Your Category Is Updated Hamdullah <3 ',
            )
        );
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }

    }


    //find cours and delete cours
    public function deleteCourses($id) {
      if(auth()->user()->id_admin == "yes") {
        $cours = Cours::find($id);
        $cours->where('id', $id)->delete();

        return back()->with(
            array(
                "message" => "Done Bro ; Hamdullah Cours Deleted"
            )
        );
      }else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }


    //deleting category
    public function deleteCategory($id) {
      if(auth()->user()->id_admin == "yes") {
        $category = Category::find($id);
        $category->where('id', $id)->delete();

        return back()->with(
           array(
            "message" => "Oh Bro You Are Amazzing, You Do This, You Deleting This Category Without Any Problem"
           )
        );
      }
      else {
        echo '
          <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
              LOOOOOOOOOOOOOOOOL <br>
              I think You Are not loking for courses, I think You Loking For problems my kid;
              <br>
              Go Away Please, Dont be stupid.
          
          
          </h1>
        ';
    }
    }

    //get all users in page admin
    public function allUsers() {
        
        if(auth()->user()->id_admin == "yes") {
            $users = User::all();
            return view("admin.users", compact('users'));
        } else {
            echo '
            <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
                LOOOOOOOOOOOOOOOOL <br>
                I think You Are not loking for courses, I think You Loking For problems my kid;
                <br>
                Go Away Please, Dont be stupid.
            
            
            </h1>
          ';
        }
    }

    //deleting users
    public function  deleteUser($id) {
      if(auth()->user()->id_admin == "yes") {
        $user = User::find($id);
        $user->where('id', $id)->delete();
        return back()->with(
            array(
                "message" => "Oh You Do This Again Bro, You Delete This User, This Is Amazzing."
            )
        ); 
      } else {
          echo '
            <h1 style="text-align: center;margin-top: 15%; font-family: sans-serife;" class=" mt-5">
                LOOOOOOOOOOOOOOOOL <br>
                I think You Are not loking for courses, I think You Loking For problems my kid;
                <br>
                Go Away Please, Dont be stupid.
            
            
            </h1>
          ';
      }
    }
  
}
