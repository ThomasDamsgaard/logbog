<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  /**
  * Get the activity associated with the minicex.
  */
  public function minicexActivities()
  {
    return $this->hasMany('App\MiniCEXActivity');
  }
}
