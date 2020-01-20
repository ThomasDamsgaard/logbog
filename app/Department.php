<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
    * Get the supervisor that works on the department.
    */
    public function supervisors()
    {
      return $this->hasMany('App\Supervisor');
    }

    public function clinical_presentations()
    {
      return $this->hasMany('App\ClinicalPresentation');
    }

    public function feedbacks()
    {
      return $this->hasMany('App\Feedback');
    }

    public function minicexes()
    {
      return $this->hasMany('App\MiniCEX');
    }
}
