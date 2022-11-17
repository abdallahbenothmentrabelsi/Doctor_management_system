<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\User;
use App\Filedoc;
use App\ConsentLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserApprovedNotification;

class DashboardController extends Controller
{
    
    public function welcom()
       {
           $filesdoc = Filedoc::all();
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
     return view('admin.dashboard')->with('role', json_encode($array))->with('filesdoc',$filesdoc);
    }
    


    public function registered()
    {
        $users = user::where('approved', '=', '1')->where('block', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('admin.register')->with('users',$users);
    }
    public function adherent()
    {
        $users = user::where('approved', '=', '1')->where('role', '=', 'ADHERENT')->orderBy('created_at', 'desc')->get();
        return view('admin.register')->with('users',$users);
    }
    public function expert()
    {
        $users = user::where('approved', '=', '1')->where('role', '=', 'EXPERT')->orderBy('created_at', 'desc')->get();
        return view('admin.register')->with('users',$users);
    }
    public function search(request $request)
    {
        $search = $request->get('search');
        $users = DB::table('users')->where('name', 'like', '%'.$search.'%')->paginate(4);
        return view('admin.register',['users' => $users]);
    }
    public function search_not_approved(request $request)
    {
        $search = $request->get('search');
        $users = DB::table('users')->where('approved', '=', '0')->where('name', 'like', '%'.$search.'%')->paginate(4);
        return view('admin.not_approved',['users' => $users]);
    }

    // public function registeredit( Request $request ,$id)
    // {
    //     $users =User::find($id);
    //     return view('admin.register-edit')->with('users',$users );
    // }
    public function Not_approved()
    {
       
        $users = user::where('approved', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('admin.not_approved')->with('users',$users);

    }
    public function Not_approved_adherent()
    {
       
        $users = user::where('approved', '=', '0')->where('role', '=', 'ADHERENT')->orderBy('created_at', 'desc')->get();
        return view('admin.not_approved')->with('users',$users);

    }
    public function Not_approved_expert()
    {
       
        $users = user::where('approved', '=', '0')->where('role', '=', 'EXPERT')->orderBy('created_at', 'desc')->get();
        return view('admin.not_approved')->with('users',$users);

    }
    public function approved(Request $request, $id)
    {
        $users =User::find($id);
        $users->approved=1;
        $approved = $users->approved;
        if ($approved == 0 && $users->approved == 1) {
            $users->notify(new UserApprovedNotification());
        }
         
        $users->update();
        return redirect('/Admin/not_approved')->with('status','Doctor APPROVED SIR');
    }
    public function block(Request $request, $id)
    {
        $users =User::find($id);
        $users->block=1;
        $users->update();
        return redirect('/Admin/registered')->with('block','Doctor BLOCKED SIR');

    }public function blockedexpert()
    {
       
        $users = user::where('block', '=', '1')->where('role', '=', 'EXPERT')->orderBy('created_at', 'desc')->get();
        return view('admin.blocked')->with('users',$users);

    } 
    public function blocke()
    {
       
        $users = user::where('block', '=', '1')->orderBy('created_at', 'desc')->get();
        return view('admin.blocked')->with('users',$users);

    } 
    public function blockedadherent()
    {
       
        $users = user::where('block', '=', '1')->where('role', '=', 'ADHERENT')->orderBy('created_at', 'desc')->get();
        return view('admin.blocked')->with('users',$users);

    } 
    public function unblock(Request $request, $id)
    {
        $users =User::find($id);
        $users->block=0;
        $users->update();
        return redirect('/Admin/dashboard')->with('status','Doctor UNBLOCKED SIR');

    }
    public function unblocke(Request $request, $id)
    {
        $users =User::find($id);
        $users->block=0;
        $users->update();
        return redirect('/Admin/blocked')->with('status','Doctor UNBLOCKED SIR');

    }


    public function disapproved(Request $request, $id)
    {
        $users =User::find($id);
        $users->approved=2;
        $approved = $users->approved;
        if ($approved == 0 && $users->approved == 1) {
            $users->notify(new UserApprovedNotification());
        }
         
        $users->update();
        return redirect('/Admin/not_approved')->with('disapprove','Doctor DESAPPROVED SIR');
    }
   
    
    public function showmore(Request $request,$id)
    {
      
        $users = User::find($id);
        return view('admin.fullinfo')->with('users',$users);
    }
    public function adminProfile(Request $request,$id)
    {
      
        $users = User::find($id);
        return view('admin.AdminProfile')->with('users',$users);
    }
    
    public function adminUpdate(Request $request,$id)
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
          
          $users->usertype= $request->input('usertype');
          if ($request->hasFile('avatar')) 
          {
              $avatar = $request->file('avatar');
              $filename = time() . '.' . $avatar->getClientOriginalExtension();
              Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename ) );
               
              $users->avatar = $filename;
               
          }   
           
 
          $users->update();
          return redirect('/Admin/dashboard')->with('status','Your Profile is Updated SIR');
    }

    public function registerupdate(Request $request,$id)
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
          $users->usertype= $request->input('usertype');
          $users->role= $request->input('role');
          $users->approved=$request->input('approved');
          
          $approved = $users->approved;          
        
        if ($request->hasFile('avatar')) 
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename ) );
             
            $users->avatar = $filename;
             
        }       
         $users->update();
          return redirect('/Admin/registered')->with('status','THE DOCTOR IS UPDATED SIR');
    }
    
    public function registerdelete ($id)
    {
      $users = User::findOrfail($id);
      $users->delete();
 
      return redirect('/Admin/registered')->with('status','Your Data Is Deleted');

    }

    public function search_Not_approved_letter(Request $request)
    {
        $search = $request->get('search');
        $letters = DB::table('consent_letters')->where('approved', '=', '0')->where('name', 'like', '%'.$search.'%')->paginate(4);
        
        return view('admin.not_approved__consent_letter',['letters' => $letters]);
        
    }
    
    public function Not_approved_letter()
    {
        $letters = ConsentLetter::where('approved', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('admin.not_approved__consent_letter')->with('letters',$letters); 
    }

    public function approved_letter(Request $request, $id)
    {
        $letters =ConsentLetter::find($id);
        $letters->approved=1;
        
         
        $letters->update();
        return redirect('/Admin/not_approved_letter')->with('status','Consent Letter Approved');
    }










    

    // public function expert_neonates()
    // {
       
    //     $users = user::where('role', '=', 'Expert_Neonates')->get();
    //     return view('admin.expertCategories.ExpertList')->with('users',$users);

    // }
    // public function expert_child()
    // {
       
    //     $users = user::where('role', '=', 'Expert_Child')->get();
    //     return view('admin.expertCategories.ExpertList')->with('users',$users);

    // }
    // public function expert_adult()
    // {
       
    //     $users = user::where('role', '=', 'Expert_Adult')->get();
    //     return view('admin.expertCategories.ExpertList')->with('users',$users);

    // }

    // public function expert_EpilepticEncephalopathy ()
    // {
       
    //     $users = user::where('role', '=', 'Expert_Epileptic_Encephalopathy')->get();
    //     return view('admin.expertCategories.ExpertList')->with('users',$users);

    // }



















    
    
    // public function sendEmailReminder(Request $request,$id)
    // {
      
        
    //    $email= $request->input('email');
    //    $to_name= $request->input('name');
    //    $data=array("name"=>"abdou" , "body"=>"test email");
    //         Mail::raw('it works', function ($message){
    //             $message->to( $email )->subject('hello there');

    //         });
                
            
    //     return redirect('/registered');


    //     Mail::send('mail',$data, function ($message) use ($to_name,$email) {
    //         $message->to('$email','abdou')-> subject('nja7na sayee');

    //     });
    //     echo "email sent , Chek your inbox";
    // }


    
}
