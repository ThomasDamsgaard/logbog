<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Supervisor;
use App\Activity;
use App\PrimaryPain;
use App\Diagnosis;
use App\Team;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $departments = Department::where('active', '=', '1')->get();
        $supervisors = Supervisor::where('department_id', '=', '1')->get();
        $activities = Activity::all();
        $complaints = PrimaryPain::all();
        $diagnoses = Diagnosis::all();
        $teams = Team::where('active', 1)->get();

        return view('home', compact(
            'departments',
            'supervisors',
            'activities',
            'complaints',
            'diagnoses',
            'teams'
        ));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->team_id = $request->id;

        $user->save();

        flash('Tilføjet til team')->success();

        return redirect(route('home'));
    }

    public function getSupervisors($id)
    {
        $supervisors = Supervisor::where('department_id', $id)->pluck('name', 'id');

        return json_encode($supervisors);
    }
}
