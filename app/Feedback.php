<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
  /**
   * Get the user that owns the MiniCEX.
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  /**
  * Get the department associated with the feedback.
  */
  public function department()
  {
    return $this->belongsTo('App\Department');
  }

  /**
  * Get the supervsor associated with the feedback.
  */
  public function supervisor()
  {
    return $this->belongsTo('App\Supervisor');
  }

  /**
   * Get the user feedback on the MiniCEX.
   */
  public function minicexes()
  {
      return $this->belongsTo('App\MiniCEX');
  }
}
