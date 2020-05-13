<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    //

    protected $guard = 'admin';

    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password', 'date_of_birth',];

    protected $hidden = ['password'];
}
