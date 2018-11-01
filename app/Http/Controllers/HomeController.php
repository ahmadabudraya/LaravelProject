<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skills;
use DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$skills = DB::table('skills')->where('user_id',1)->get();
        return view('home');
    }
}
