<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Carbon\Carbon;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $team = new Team();
        // dd(Carbon::parse($request->b_start));
        $team->b_start = $request->b_start;
        $team->c_start = $request->c_start;
        $team->d_start = $request->d_start;
        $team->e_start = $request->e_start;
        $team->f_start = $request->f_start;
        $team->g_start = $request->g_start;
        $team->h_start = $request->h_start;
        $team->b_end = $request->b_end;
        $team->c_end = $request->c_end;
        $team->d_end = $request->d_end;
        $team->e_end = $request->e_end;
        $team->f_end = $request->f_end;
        $team->g_end = $request->g_end;
        $team->h_end = $request->h_end;

        $team->save();

        flash('Holdet er gemt')->success()->important();

        return redirect(route('admin.home'));
    }
}
