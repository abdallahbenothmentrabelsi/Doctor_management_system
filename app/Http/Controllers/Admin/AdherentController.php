<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdherentController extends Controller
{
    public function AllAdherent()
    {
       
        $users = user::where('role', '=', 'Adherent')->get();
        return view('admin.Adherents.AllAdherents')->with('users',$users);

    }
    
}
