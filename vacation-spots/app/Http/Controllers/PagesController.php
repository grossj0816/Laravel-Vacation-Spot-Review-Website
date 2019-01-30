<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacationSpot;

class PagesController extends Controller
{
    public function index()
    {
        $spots = VacationSpot::all();
        return view('pages.index')->with('spots', $spots);
    }
}
