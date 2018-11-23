<?php

namespace JackNersary;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	/* Ask user table if the user is admin, normal user or teacher */
	public function is_admin(){
	   if($this->admin==0){
	      return 'user';
	   }else if($this->admin==1){
	      return 'admin';
	   }else if($this->admin==2){
	      return 'teacher';
	   }
	}
}
