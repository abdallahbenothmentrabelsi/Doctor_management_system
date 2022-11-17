<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  
{
    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
     
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function filesdoc() {
        return $this->hasMany(Filedoc::class);
    }

    public function consent() {
        return $this->hasOne(ConsentLetter::class);
    }

    public function rate()
    {
        return $this->hasMany(Rate::class);
    }
 
    // public function roles()
    // {
    //     return $this->BelongsToMany(Role::class);
    // }


     
  
    //     public function hasAnyRoles($roles){
    //         return null !== $this->roles()->whereIn('name' , $roles )->first();
    //     }

    //     public function hasAnyRole($role){
    //         return null !== $this->roles()->where('name' , $role )->first();
    //     }


}
