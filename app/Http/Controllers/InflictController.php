<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use App\Department;
use App\Supervisor;

class InflictController extends Controller
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
        $professions = Profession::all();
        $departments = Department::all();
        $department = $departments->first();
        $supervisors = Supervisor::where('department_id', '=', '1')->get();
        $status = $supervisors->first();

        // dd($status);

        return view('user.inflict', compact('professions', 'departments', 'department', 'supervisors', 'status'));
    }

    public function getSupervisorActiveStatus($id)
    {
        $status = Supervisor::where('id', $id)->pluck('active');
        return json_encode($status);
    }

    public function getDepartmentActiveStatus($id)
    {
        $status = Department::where('id', $id)->pluck('active');
        return json_encode($status);
    }
}
