<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;

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

        return Review::create([
            'content'   => $request->input('content'),
            'rating'    => $request->input('rating'),
            'movieID'   => $request->input('movieID'),
            'userID'    => Auth::guard('api')->id()
            
        ]);
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
