<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Supervisor;

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

        $activities = [
          'Anamnese (ny pt)',
          'Undersøgelse (ny pt)',
          'Paraklinisk svar',
          'Anden opfølgende kontrol',
          'Konference (kirurg, ect)',
          'Sygeplejerske overdragelse',
          'FV overdragelse',
          'Journalisering, henvisning m.m.',
          'Ingen aktivitet',
          'Behandling (f.eks SMT)'
        ];

        return view('home', compact('activities', 'departments', 'supervisors'));
    }

    public function getSupervisors($id)
    {
      $supervisors = Supervisor::where('department_id', $id)->pluck('name', 'id');

      return json_encode($supervisors);
    }
}
