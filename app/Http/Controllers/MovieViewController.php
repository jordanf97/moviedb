<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Auth;

class MovieViewController extends Controller
{
    public function index() {

        $movies = new MovieController();
        $movies = $movies->index();
        
        return view('movieView', ["movies" => $movies]);
    }
    
    public function view($id) {
        $movie = new MovieController();
        $movie = $movie->show($id);

        $reviews = new ReviewController();
        $reviews = $reviews->show($movie->id);

        return view('showMovie', ['movie' => $movie, 'reviews' => $reviews, 'user' => Auth::user()]);
    }

    public function addReview($id, Request $request) {
        $reviewCtl = new ReviewController();
        

        $validatedData = $request->validate([
            'content'   => 'required|max:191|min:5',
            'rating'    => 'required|integer',
            'movieID'   => 'required|integer'
        ]);

        $result = $reviewCtl->store($request, Auth::user()->id);
        return view('notification', ['message' => 'Review has been successfully added!']);
    }

    public function editReview($id) {
        $reviewCtl = new ReviewController();
        $review = $reviewCtl->find($id);

        return view('reviewEdit', ['review' => $review, 'user' => Auth::user()]);
    }
}
