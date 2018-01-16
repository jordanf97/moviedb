<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;
use App\Movie;

class ReviewController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $review = Review::create([
            'content'   => $request->input('content'),
            'rating'    => $request->input('rating'),
            'movieID'   => $request->input('movieID'),
            'userID'    => Auth::guard('api')->id()
            
        ]);


        $reviews = Review::select('rating')->where('movieID', $request->input('movieID'))->get();
        $total = 0;
        $rating = 0;
        foreach($reviews as $curr_review) {
            $total += (int) $curr_review->rating;
        }

        if($total > 0) {
            $rating = $total / count($reviews);
        }
        Movie::where('id',$request->input('movieID'))->update(['rating'=> $rating]);
        return $review;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Review::select('*')->where('movieID', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $review = Review::select('*')->where('id', $request->input('id'))->where('userID', Auth::guard('api')->id())->first();
        $review->update([
            'content'   => $request->input('content'),
            'rating'    => $request->input('rating'),
        ]);

        return $review;
    }

}
