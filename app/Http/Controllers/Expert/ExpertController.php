<?php

namespace App\Http\Controllers\Expert;

use Image;
use App\User;
use App\Filedoc;
use App\Message;
use App\ConsentLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller


{ public function index()
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
     return view('expert.indexexpert')->with('role', json_encode($array));
    }
    
    public function expertupdate(Request $request,$id)
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
        return redirect('/indexexpert')->with('status','Your Profile Is Updated');
    }
    public function count_message()
    {
        $auth_id = Auth::id();
        $chats = Message::where('to', $auth_id)
            ->where('read', 1)
            ->get()
            ->count();
        return($chats);
    }
    
    public function received()
    {
        $files = Filedoc::where('receiver', Auth::id())->get();
        $letters = ConsentLetter::where('receiver' ,Auth::id())->get();
        return view('expert.received')->with('files', $files)->with('letters',$letters);
    }
     


}
 