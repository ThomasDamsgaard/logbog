<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Supervisor;
use App\Activity;

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
        // Fecth all departments
        $departments = Department::all();

        // Fetch supervisors associated with the first department record
        $supervisors = Supervisor::where('department_id', '=', '1')->get();

        $activities = Activity::all();

        return view('home', compact(
          'departments', 
          'supervisors',
          'activities',
        ));
    }

    public function getSupervisors($id)
    {
      $supervisors = Supervisor::where('department_id', $id)->pluck('name', 'id');

      return json_encode($supervisors);
    }
}
