<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;

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
}
