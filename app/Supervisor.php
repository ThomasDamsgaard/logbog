<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    /**
    * Get the department where the supervisor works.
    */
    public function department()
    {
      return $this->belongsTo('App\Department');
    }

    /**
    * Get the feedback associated with the supervisor.
    */
    public function feedbacks()
    {
      return $this->hasMany('App\Feedback');
    }

    /**
    * Get the minicexes from the supervisor.
    */
    public function minicexes()
    {
      return $this->hasMany('App\MiniCEX');
    }
}
