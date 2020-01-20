<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  /**
   * A team consists of many users
   */
  public function users()
  {
      return $this->hasMany('App\User');
  }
}
