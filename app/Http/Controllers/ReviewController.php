<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;
use App\Movie;

class ReviewController extends Controller
{
    public function find($id) {
        return Review::find($id);
    }

    public function store(Request $request, $userID = null)
    {

        if($userID === null) $userID = Auth::gaurd('api')->id();

        $validatedData = $request->validate([
            'content'   => 'required|max:191',
            'rating'    => 'required|integer',
            'movieID'   => 'required|integer'
        ]);


        $review = Review::create([
            'content'   => $request->input('content'),
            'rating'    => $request->input('rating'),
            'movieID'   => $request->input('movieID'),
            'userID'    => $userID
            
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

    public function show($id)
    {
        return Review::select('*')->where('movieID', $id)->get();
    }

    public function edit(Request $request, $userID = null)
    {   
        if($userID === null) $userID =  Auth::guard('api')->id();
        $review = Review::select('*')->where('id', $request->input('id'))->where('userID', $userID)->first();

        $validatedData = $request->validate([
            'content'   => 'required|max:191',
            'rating'    => 'required|integer'
        ]);

        $review->update([
            'content'   => $request->input('content'),
            'rating'    => $request->input('rating'),
        ]);

        $reviews = Review::select('rating')->where('movieID', $review->movieID)->get();
        $total = 0;
        $rating = 0;
        foreach($reviews as $curr_review) {
            $total += (int) $curr_review->rating;
        }

        if($total > 0) {
            $rating = $total / count($reviews);
        }

        Movie::where('id', $review->movieID)->update(['rating'=> $rating]);

        return $review;
    }

}
