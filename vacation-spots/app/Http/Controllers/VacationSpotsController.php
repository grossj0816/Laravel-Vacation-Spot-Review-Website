<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacationSpot;
use App\Review;

class VacationSpotsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spots = VacationSpot::all();

        return view('vacation_spots.index')->with('spots', $spots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacation_spots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'vacation_spot' => 'required'
        ]);

        $spot = new VacationSpot();
        $spot->location = $request->input('vacation_spot');
        $spot->user_id = auth()->user()->id;
        $spot->save();
        
        return redirect('/vacation_spots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spot = VacationSpot::find($id);
        $reviews = Review::all();

        $list = array(
            'spot' => $spot,
            'reviews' => $reviews
        );

        return view('vacation_spots.show')->with($list);
    }

}
