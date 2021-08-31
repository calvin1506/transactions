<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\website as web;
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
        $web = web::all()->count();
        $leader = user::where('role', 'Leader')->count();
        $ops = user::where('role', 'Operator')->count();
        $custs = user::where('role', 'Customer')->count();
        return view('home', ["count_web"=>$web, 'count_leader'=>$leader, 'ops_count'=>$ops, 'cust_count'=>$custs]);
    }
}
