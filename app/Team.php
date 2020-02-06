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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
      'b_start',
      'c_start',
      'd_start',
      'e_start',
      'f_start',
      'g_start',
      'h_start',
      'b_end',
      'c_end',
      'd_end',
      'e_end',
      'f_end',
      'g_end',
      'h_end',
      'created_at',
      'updated_at'
    ];
}
