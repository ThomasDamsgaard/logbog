<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MiniCEX;
use Carbon\Carbon;

class MiniCEXController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
      //Validate
      dd($request);

      //Department extraction
      $department = explode('|', $request->department);

      //Grade exctraction
      $rating = str_split($request->supervisorrating, 1);

      //Diagnoses split to array
      $diagnoses = explode(',', $request->diagnosis);

      $minicex = new MiniCEX;

      $minicex->date = Carbon::now();
      $minicex->department = $department[1];
      $minicex->supervisor = $request->supervisor;
      $minicex->age = $request->age;
      $minicex->sex = $request->sex;
      $minicex->complaint = $request->complaint;
      $minicex->duration = $request->duration;
      $minicex->diagnosis = $diagnoses;
      $minicex->grade1 = $rating[0];
      $minicex->grade2 = $rating[1];
      $minicex->grade3 = $rating[2];
      $minicex->grade4 = $rating[3];
      $minicex->grade5 = $rating[4];
      $minicex->grade6 = $rating[5];
      $minicex->grade7 = $rating[6];
      $minicex->grade8 = $rating[7];
      $minicex->grade9 = $rating[8];
      $minicex->cc = 1;
      $minicex->activities = $request->activities;
      $minicex->user_id = Auth::id();

      $minicex->save();

      flash('MiniCEX er gemt')->success()->important();

      return redirect('/home');
    }
}
