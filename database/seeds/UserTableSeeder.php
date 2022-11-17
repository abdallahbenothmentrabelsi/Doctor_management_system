<?php

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // User::truncate();
      // $adminRole = Role::where('name','admin')->first();
      // $expertRole = Role::where('name','expert')->first();
      // $adherentRole = Role::where('name','adherent')->first();


      $admin = User::create([
        'name' => 'abdou',
        'lastname' => 'ben othmen' ,
        'dateofbirth'=>  Carbon::parse('18 September 1992') ,
        'email' =>  'abdallah.benothmentrabelsi@gmail.com' ,
        'phonenumber' => '96566268' ,
        'gender'=> 'male' ,
        'country' =>  'tunisa',
        'city' => 'ariana',  
        'postalcode' => '2037',
        'role' => 'Admin',
        'institution' => 'esen',
        'description' => 'abdalah ben othmen developpeur web',
        'password' =>  bcrypt('abdouabdou'),
      ]);

      $expert = User::create([
        'name' => 'lindoo',
        'lastname' => 'belhadj' ,
        'dateofbirth'=>  Carbon::parse('18 September 1992') ,
        'email' =>  'lindoo.belhadj@gmail.com' ,
        'phonenumber' => '55581420' ,
        'gender'=> 'femmale' ,
        'country' =>  'tunisa',
        'city' => 'ariana',  
        'postalcode' => '2037',
        'role' => 'Expert',
        'institution' => 'esen',
        'description' => 'lindoo belhadj developpeur web',
        'password' =>  bcrypt('lindoolindoo'),
      ]);



      $adherent = User::create([
        'name' => 'hamza',
        'lastname' => 'hsan' ,
        'dateofbirth'=>  Carbon::parse('18 September 1992') ,
        'email' =>  'hamza.hsan@gmail.com' ,
        'phonenumber' => '54505079' ,
        'gender'=> 'male' ,
        'country' =>  'tunisa',
        'city' => 'ariana',  
        'postalcode' => '2037',
            'role' => 'Adherent',
        'institution' => 'isam',
        'description' => 'hamza hsan developpeur jeux video',
        'password' =>  bcrypt('hamzahamza'),
      ]);

      // $admin->roles()->attach($adminRole);

      // $expert->roles()->attach($expertRole);

      // $adherent->roles()->attach($adherentRole);


    }
}
