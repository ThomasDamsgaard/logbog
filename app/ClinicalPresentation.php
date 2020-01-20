<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicalPresentation extends Model
{
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'icd10' => 'array',
  ];

  /**
  * Get the department where the patient came.
  */
  public function department()
  {
    return $this->belongsTo('App\Department');
  }

  /**
  * Get the primary pain for the clinical presentation.
  */
  public function primaryPain()
  {
    return $this->belongsTo('App\PrimaryPain');
  }
}
