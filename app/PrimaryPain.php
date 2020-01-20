<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimaryPain extends Model
{
  /**
  * Get the clinical presentations associated with the primary pain.
  */
  public function ClinicalPresentations()
  {
    return $this->hasMany('App\ClinicalPresentation');
  }
}
