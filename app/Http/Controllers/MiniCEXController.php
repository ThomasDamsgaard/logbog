<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MiniCEX;
use App\Feedback;
use App\MiniCEXActivity;
use App\ClinicalPresentation;
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

    public function index()
    {
        $minicexes = MiniCEX::where('user_id', Auth::user()->id)->get();

        dd($minicexes);

        return view('user.minicex.index');
    }

    public function store(Request $request)
    {
        //Department extraction
        $department = explode('|', $request->department);

        //Grade exctraction
        $supervisorRating = str_split($request->supervisorrating, 1);
        $studentRating = str_split($request->studentrating, 1);

        //Diagnoses split to array
        $diagnoses = explode(',', $request->diagnosis);

        $minicex = new MiniCEX;

        $minicex->date = Carbon::now();
        $minicex->user_id = Auth::id();
        $minicex->supervisor_id = $request->supervisor;
        $minicex->department_id = $department[0];
        $minicex->activities = $request->activities;
        $minicex->grade1 = $supervisorRating[0];
        $minicex->grade2 = $supervisorRating[1];
        $minicex->grade3 = $supervisorRating[2];
        $minicex->grade4 = $supervisorRating[3];
        $minicex->grade5 = $supervisorRating[4];
        $minicex->grade6 = $supervisorRating[5];
        $minicex->grade7 = $supervisorRating[6];
        $minicex->grade8 = $supervisorRating[7];
        $minicex->grade9 = $supervisorRating[8];

        $minicex->save();

        $clinicalPresentation = new ClinicalPresentation;

        $clinicalPresentation->department_id = $department[0];
        $clinicalPresentation->age = $request->age;
        $clinicalPresentation->sex = $request->sex;
        $clinicalPresentation->primary_pain = $request->complaint;
        $clinicalPresentation->duration = $request->duration;
        $clinicalPresentation->icd10 = $diagnoses;

        $clinicalPresentation->save();

        $feedback = new Feedback();

        $feedback->mini_c_e_x_e_s_id = $minicex->id;
        $feedback->date = Carbon::now();
        $feedback->user_id = Auth::id();
        $feedback->supervisor_id = $request->supervisor;
        $feedback->department_id = $department[0];
        $feedback->grade1 = $studentRating[0];
        $feedback->grade2 = $studentRating[1];
        $feedback->grade3 = $studentRating[2];
        $feedback->grade4 = $studentRating[3];
        $feedback->grade5 = $studentRating[4];
        $feedback->grade6 = $studentRating[5];
        $feedback->grade7 = $studentRating[6];

        $feedback->save();

        $minicexActivities = new MiniCEXActivity();

        $minicexActivities->mini_c_e_x_e_s_id = $minicex->id;
        $minicexActivities->activities = $request->activities;

        $minicexActivities->save();

        flash('MiniCEX er gemt')->success()->important();

        return redirect('/home');
    }

    public function show(MiniCEX $minicex)
    {
    }

    public function destroy(MiniCEX $minicex)
    {
    }
}
