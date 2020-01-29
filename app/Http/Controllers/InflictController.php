<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;

class InflictController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $professions = Profession::all();
        return view('user.inflict', compact('professions'));
    }
}
