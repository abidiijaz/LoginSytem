<?php

namespace App;

/////////add for gaurd //////////
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/////////////////

use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{   
    // use HasFactory;
    use Notifiable;
    protected $guard = 'teacher';
    protected $fillable = [
        'name','email','password','type','image','status','mobile'
    ];
     protected $hidden = [
        'password', 'remember_token',
    ];
}
