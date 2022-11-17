<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']) ;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcomePage');
    }



    public function Profileadherent()
    {
      
        $users = Auth::user();
        return view('adherent.profile')->with('users',$users);
    }
    public function Profileexpert()
    {
      
        $users = Auth::user();
        return view('expert.profile')->with('users',$users);
    }
}
