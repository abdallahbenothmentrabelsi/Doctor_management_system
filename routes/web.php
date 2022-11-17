<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|---------------------------n-----------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('home');



// Route::get('/index', function () {
//     return view('welcomePage');
// });
// Route::get('/home', function () {
//      return view('welcome');
// });







 
Route::get('/email',function(){
    $data = array('name'=>"Virat Gandhi");
    Mail::send('mail', $data, function($message) {
        $message->to('linda.belhadj@esen.tn', 'Tutorials Point')->subject
           ('Abdou PFE');
        $message->from('abdou@gmail.com','Virat Gandhi');
});
});
Auth::routes();
// Route::get('register','auth\RegisterController@');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// ,'prefix'=>'admin'
Route::group(['middleware' => ['auth','Admin']] ,function(){ 

    Route::get('/Admin/dashboard', 'Admin\DashboardController@welcom');

    Route::get('/Admin/registered','Admin\DashboardController@registered');

    Route::get('/Admin/ADHERENTLIST','Admin\DashboardController@adherent');

    Route::get('/Admin/EXPERTLIST','Admin\DashboardController@expert');

    Route::get('/Admin/search','Admin\DashboardController@search');

    Route::get('/Admin/search_Not_approved','Admin\DashboardController@search_not_approved');   
     
    Route::get('/Admin/info/{id}','Admin\DashboardController@showmore');
   
    Route::get('/Admin/adminprofile/{id}','Admin\DashboardController@adminProfile');

    Route::put('/Admin/adminupdate/{id}','Admin\DashboardController@adminUpdate');

    Route::get('/Admin/register-edit/{id}','Admin\DashboardController@registeredit');

    Route::put('/Admin/role-register-update/{id}','Admin\DashboardController@registerupdate');    

    Route::DELETE('/Admin/role-delete/{id}','Admin\DashboardController@registerdelete');

    Route::get('/Admin/not_approved','Admin\DashboardController@Not_approved');

    Route::get('/Admin/not_approved_ADHERENT','Admin\DashboardController@Not_approved_adherent');

    Route::get('/Admin/not_approved_EXPERT','Admin\DashboardController@Not_approved_expert');

    Route::put('/Admin/approved/{id}','Admin\DashboardController@approved');

    Route::put('/Admin/disapproved/{id}','Admin\DashboardController@disapproved');
    Route::get('/Admin/blocked','Admin\DashboardController@blocke');
    Route::get('/Admin/blocked_adherent','Admin\DashboardController@blockedadherent');
    Route::get('/Admin/blocked_expert','Admin\DashboardController@blockedexpert');

    Route::put('/Admin/unblock/{id}','Admin\DashboardController@unblock');

    Route::put('/Admin/block/{id}','Admin\DashboardController@block');

    Route::get('/Admin/not_approved_letter','Admin\DashboardController@Not_approved_letter');

    Route::get('/Admin/search_Consent_letters','Admin\DashboardController@search_Not_approved_letter');

    Route::put('/Admin/approveletter/{id}','Admin\DashboardController@approved_letter');
     
    });
   

    Route::group(['middleware' => ['auth','Expert','block']] ,function()
    { 

        Route::get('/Expert/profile','HomeController@Profileexpert');

        Route::put('/Expert/update/{id}','Expert\ExpertController@expertupdate' );

        Route::get('/indexexpert','Expert\ExpertController@index');

        Route::get('/Expert/received','Expert\ExpertController@received');
        // Route::get('/Expert/download/{id}','Expert\ExpertController@download')->name('downloadfile');
        
        // Route::get('/Expert/chatroom',function(){
        //         return view('expert.chatroom');}); 
        //  Route::get('/contacts','ContactsController@get');
        
        // Route::get('/conversation/{id}','ContactsController@getMessagesFor');
        // Route::post('/conversation/send','ContactsController@send');
        
    });
    Route::get('/chatroom',function(){
        return view('expert.chatroom');}); 
 Route::get('/contacts','ContactsController@get');

Route::get('/conversation/{id}','ContactsController@getMessagesFor');
Route::post('/conversation/send','ContactsController@send');


    Route::group(['middleware'=>['Adherent','block']], function() 
      {
        //  Route::get('/Adherent/chatroom',function(){
        //     return view('adherent.chatroom');
        //          });
        //  Route::get('/contacts','ContactsController@getexpert');
        //  Route::get('/conversation/{id}','ContactsController@getMessagesFor');
        //  Route::post('/conversation/send','ContactsController@send');
        Route::get('/Adherent/expertliste','Adherent\AdherentController@litsexpert'); 

        Route::get('/Adherent/giverates/{id}','Adherent\AdherentController@rate'); 

        Route::put('/Adherent/rate/{id}','Adherent\AdherentController@expertrates'); 

        Route::get('/indexadherent','Adherent\AdherentController@index');

        Route::get('/Adherent/profile','HomeController@Profileadherent');

        Route::put('/adherentupdate/{id}','Adherent\adherentController@adherentupdate' );

        Route::get('/Adherent/sharing','Adherent\AdherentController@AllExpert');

        Route::post('/Adherent/share/doc','Adherent\AdherentController@send')->name('Adherent.share.doc'); 

        Route::get('/Adherent/rate/search','Adherent\AdherentController@search');
        

      
         
    });
    
    
            // sending email   
     //    Route::post('/sent','Admin\DashboardController@sendEmailReminder');
 

