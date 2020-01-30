<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;
use DB;

class SupervisorController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required',
          'profession' => 'required',
          'active' => 'required',
          'department' => 'required',
        ]);

        $supervisor = new Supervisor;

        $supervisor->name = $request->name;
        $supervisor->profession_id = $request->profession;
        $supervisor->active = $request->active;
        $supervisor->department_id = $request->department;

        $supervisor->save();

        flash('Supervisor tilføjet')->success();

        return redirect(route('inflict.index'));
    }

    public function status(Request $request)
    {
        $supervisor = explode('|', $request->supervisor);

        $update = DB::table('supervisors')
        ->where('id', $supervisor[0])
        ->update(['active' => $request->active]);

        flash('Status er opdateret')->success();

        return redirect(route('inflict.index'));
    }
}
