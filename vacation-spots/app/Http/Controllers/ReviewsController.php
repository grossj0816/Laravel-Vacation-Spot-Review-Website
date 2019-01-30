<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\VacationSpot;

class ReviewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $spot = VacationSpot::find($id);
        return view('reviews.create')->with('spot', $spot);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $spot_id)
    {
        $review = new Review();
        $review->name = $request->input('name');
        $review->comment = $request->input('comment');
        $review->user_id = auth()->user()->id;
        $review->spot_id = $spot_id;
        $review->save();

        return redirect('../vacation_spots/' . $spot_id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($spot_id, $id)
    {
        $spot = VacationSpot::find($spot_id);
        $review = Review::find($id);

        $list = array(
            'spot' => $spot,
            'review' => $review
        );

        return view('reviews.edit')->with($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $spot_id, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required'
        ]);

        $review = Review::find($id);
        $review->name = $request->input('name');
        $review->comment = $request->input('comment');
        $review->user_id = auth()->user()->id;
        $review->spot_id = $spot_id;
        $review->save();

        return redirect('../vacation_spots/' . $spot_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($spot_id, $id)
    {
        $review = Review::find($id);

        $review->delete();

        return redirect('../vacation_spots/' . $spot_id);

    }
}
