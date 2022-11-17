<?php

namespace App\Http\Controllers\Auth;

 
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\AdminNewUserNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
   
        return Validator::make($data, [ 
            'name' => 'required',
            'lastname' => 'required', 
            'dateofbirth'  => 'required',
            'email' => 'required', 
            'phonenumber' => 'required' ,
            'gender' => 'required' ,
            'country' => 'required', 
            'city' => 'required',
            'postalcode' => 'required', 
            'password' => 'required', 
            'role'=>'required',
            'institution' => 'required',
            //  'specialty' => 'required', 
           
            'description' => 'required', 
            
           
            'password' => 'required', 


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {      
      $user = User::create([
                   'name' => $data['name'],
               'lastname' => $data['lastname'],
             'dateofbirth'=> $data['dateofbirth'],
                  'email' => $data['email'],
            'phonenumber' => $data['phonenumber'],
                  'gender'=> $data['gender'],
                'country' => $data['country'],
                   'city' => $data['city'],  
             'postalcode' => $data['postalcode'],
                   'role' => $data['role'], 
            'institution' => $data['institution'],
            'description' => $data['description'],          
            'password' => Hash::make($data['password']),     
             ]);  

            $administrators = user::where('role', '=', 'admin')->get();
            foreach ($administrators as $administrator) 
            {
                $administrator->notify(new AdminNewUserNotification($user));
            }
            
        return $user;

    }


}
 //  if ( $data['role'] =='Expert')
    //     {
    //       $role = Role::select('id')->where('name','Expert')->first();
    //       $user->roles()->attch($role);
    //     }                  
      
    //   elseif ( $data['role'] =='Adherent')
    //                 {
    //                     $role = Role::select('id')->where('name','Adherent')->first();
    //                     $user->roles()->attch($role);
    //                 }         