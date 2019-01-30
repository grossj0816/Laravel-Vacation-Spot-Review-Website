<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacationSpot;


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
        $spots = VacationSpot::all();
        return view('vacation_spots.index')->with('spots', $spots);
    }
}
