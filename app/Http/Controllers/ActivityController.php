<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Charts\ActivityChart;


class ActivityController extends Controller
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
   * Show the activity page.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
   public function index()
   {
     $min = DB::table('mini_c_e_x_e_s')
     ->where('user_id', '=', Auth::id())
     ->orderBy('date', 'desc')
     ->select('date', 'activities')
     ->get();

     $history = array();

     $query = DB::table('mini_c_e_x_e_s')
     ->where('user_id', '=', Auth::id())
     // ->select('date', 'activities')
     ->get();


     $chart = new ActivityChart;
     $chart->labels(['One', 'Two', 'Three', 'Four']);
     $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
     $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

     // foreach ($query as $value) {
     //   if (in_array('Anamnese (ny pt)', $value) {
     //     $history[] = 'hej'
     //   }
     // }

     // dd($min[0]->activities);

     $query->toJson();
     $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May');

     $data1  = array(0, 1, 3, 4, 6);
     $data2  = array(0, 4, 6, 8, 10);
     $data3  = array(0, 6, 9, 12, 15);

     return view('activity', compact('months', 'data1', 'data2', 'data3', 'query', 'chart'));
   }
}
