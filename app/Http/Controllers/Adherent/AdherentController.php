<?php

namespace App\Http\Controllers\Adherent;

use Image;
use App\Rate;
use App\User;
use App\Filedoc;
use App\Message;
use App\ConsentLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdherentController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']) ;
    }

    // public function index()
    // {
    //     return view('/adherent.indexadherent');
    // }
    public function adherentupdate(Request $request,$id)
    {
          $users =User::find($id);
          $users->name= $request->input('name');
          $users->lastname= $request->input('lastname');
          $users->dateofbirth= $request->input('dateofbirth');
          $users->email= $request->input('email');
          $users->phonenumber= $request->input('phonenumber');
          $users->gender= $request->input('gender');
          $users->country= $request->input('country');
          $users->city= $request->input('city');
          $users->postalcode= $request->input('postalcode');         
          $users->institution= $request->input('institution');
          $users->description= $request->input('description');   
          if ($request->hasFile('avatar')) 
       {
           $avatar = $request->file('avatar');
           $filename = time() . '.' . $avatar->getClientOriginalExtension();
           Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename ) );
            
           $users->avatar = $filename;
            
       }        
        
          $users->update();
           
          return redirect('/indexadherent')->with('status','Your Profile Is Updated');
    }


    
    public function AllExpert()
    {
       
        $users = user::where('role', '=', 'Expert')->get();
        return view('adherent.sharing')->with('users',$users);

    }
    public function litsexpert()
    {
       
        $users = user::where('role', '=', 'Expert')->get();
        return view('adherent.expertList')->with('users',$users);

    }
    public function rate(Request $request,$id)
    {
      
        $users = User::find($id);
        return view('adherent.expertRate')->with('users',$users);
    }
    public function expertrates(Request $request,$id)
    {
          $users =User::find($id);
           $rate = new Rate();
           $rate->from = Auth::id(); 
           $rate->to = $users->id; 
           $rate->rates =  $request->input('input-1');
           $rate->save();
          return redirect('/Adherent/expertliste')->with('status','Your rate is done');
    }
    public function search(request $request)
    {
        $search = $request->get('search');
        $users = DB::table('users')->where('name', 'like', '%'.$search.'%')->paginate(4);
        return redirect('/Adherent/expertliste',['users' => $users]);
    }
    public function send(Request $request)
    { 
        $fichier = new Filedoc();
         
        $fichier->receiver = $request->get('user'); 
        $fichier->sender = Auth::id(); 

        $fichier->doc = $request->file('file');  
       
        
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $filedestinationPath = public_path('/file/');
        $file->move($filedestinationPath, $filename); 
        $fichier->name=$filename;   
        $fichier->save(); 

        $consentletter= new ConsentLetter();
        
        $letter=$request->file('constent');
        $lettername = $letter->getClientOriginalName();
        $letterdestinationPath = public_path('/consent/');
        $letter->move($letterdestinationPath, $lettername);
        $consentletter->sender = Auth::id();
        $consentletter->receiver = $request->get('user'); 
        
        $consentletter->name = $lettername;
        $consentletter->letter=$lettername;
        $consentletter->save();

        $message = new Message();
        $message->from = Auth::id();
        $message->to = $request->get('user'); 
        $message->text = $request->input('message');
        $message->read = false;
        $message->save();
         
        return redirect('/indexadherent')->with('status','file sent');
         


    }
    
    
    public function index()
   {
     $data = DB::table('users')
       ->select(
        DB::raw('role as role'),
        DB::raw('count(*) as number'))
       ->groupBy('role')
       ->get();
     $array[] = ['role', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->role, $value->number];
     }
     return view('adherent.indexadherent')->with('role', json_encode($array));
    }
}
