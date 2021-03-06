<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
      ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
      ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['clinical'];

    /**
     * Get the user that owns the MiniCEX.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get the minicex associated with the department.
    */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
    * Get the supervsor associated with the minicex.
    */
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }

    /**
    * Get the feedback associated with the minicex.
    */
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    /**
    * Get the clinical presentations associated with the minicex.
    */
    public function clinical()
    {
        return $this->hasOne('App\ClinicalPresentation', 'mini_c_e_x_e_s_id');
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $date);
    }
}
