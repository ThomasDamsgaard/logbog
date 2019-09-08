<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('home', compact('activities'));
    }
}
