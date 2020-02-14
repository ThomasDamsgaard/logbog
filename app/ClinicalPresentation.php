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
    * Get the user who made the minicex
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get the minicex where the clinical presentations are
    */
    public function minicexes()
    {
        return $this->belongsTo('App\MiniCEX', $mini_c_e_x_e_s_id);
    }

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
