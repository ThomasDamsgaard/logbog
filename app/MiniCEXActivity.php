<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniCEXActivity extends Model
{
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'activities' => 'array',
  ];

  /**
  * Get the minicex associated with the activity.
  */
  public function minicexes()
  {
    return $this->belongsTo('App\MiniCEX');
  }

  /**
  * Get the activity associated with the minicex.
  */
  public function activity()
  {
    return $this->belongsTo('App\Activity');
  }
}
