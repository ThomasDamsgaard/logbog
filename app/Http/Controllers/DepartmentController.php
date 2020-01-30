<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use DB;

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

    public function status(Request $request)
    {
        $department = explode('|', $request->department_status);

        // dd($request);

        $update = DB::table('departments')
        ->where('id', $department[0])
        ->update(['active' => $request->department_active]);

        flash('Status er opdateret')->success();

        return redirect(route('inflict.index'));
    }
}
