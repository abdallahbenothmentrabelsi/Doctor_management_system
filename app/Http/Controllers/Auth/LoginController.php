<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;


    protected function redirectTo()
    {
        if (Auth::user()->usertype =='Admin')
        {
            return $this->redirectTo= '/Admin/dashboard' ;
        }
        elseif (Auth::user()->role =='Adherent')
        {                      
            return $this->redirectTo= '/indexadherent' ;
        }
        elseif (Auth::user()->role =='Expert')
        {
            return '/indexexpert' ;
        }
        
         
         
    }
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    

     
// public function SendEmail()
// {
//    request()->validate(['email' => 'required|email']);

//     $email=request('email');
//     dd($email);
// }
    

}
