<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniCEX extends Model
{
    /**
     * The attributes that aren't mass assignable.
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
        'user_id'
      ];

      /**
       * The attributes that should be cast to native types.
       *
       * @var array
       */
      protected $casts = [
        'activities' => 'array',
        'diagnosis' => 'array',
      ];

      /**
       * Get the user that owns the MiniCEX.
       */
      public function user()
      {
          return $this->belongsTo('App\User');
      }
}
