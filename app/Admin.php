<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $guard = 'admin';

    protected $fillable = [
          'firstname', 'lastname', 'email', 'password',
      ];

    protected $hidden = [
          'password', 'remember_token',
      ];
}
