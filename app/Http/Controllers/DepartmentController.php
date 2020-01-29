<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        'active' => 'required',
      ]);

        $department = new Department;

        $department->name = $request->name;
        $department->active = $request->active;

        $department->save();

        flash('Afdeling tilføjet')->success();

        return redirect(route('inflict.index'));
    }
}
