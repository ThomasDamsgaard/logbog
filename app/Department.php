<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function supervisors()
    {
      return $this->hasMany('Supervisor');
    }
}
