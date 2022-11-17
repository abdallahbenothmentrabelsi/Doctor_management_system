<?php

namespace App\Http\Controllers\Admin;
use App\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExpertController extends Controller
{
   
    public function AllExpert()
    {
       
        $users = user::where('Role', '=', 'Expert')->get();
        return view('admin.expertCategories.allexpert')->with('users',$users);

    }
    
    
    

    public function FullInfo(Request $request,$id)
    {
      
        $users = User::find($id);
        return view('admin.ExpertCategories.FullinfoExpert')->with('users',$users);
    }

    // public function showmore(Request $request,$id)
    // {
      
    //     $users = User::find($id);
    //     return view('admin.expertCategories.FullinfoExpert')->with('users',$users);
    // }

    public function registerupdate(Request $request,$id)
    {
          $users =User::find($id);
          
          $users->category= $request->input('category');
          $users->update();
          return redirect('/allexpert')->with('status','Category added');
    }

}
