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

        if(Auth::user()->id == $review->userID) {
            return view('reviewEdit', ['review' => $review, 'user' => Auth::user()]);
        } else {
            return view('notification', ['message' => 'This does not seem to be your review']);
        }
    }

    public function editReviewSubmit($id, Request $request) {
        $validatedData = $request->validate([
            'content'   => 'required|max:191|min:5',
            'rating'    => 'required|integer',
        ]);

        $reviewCtl = new ReviewController();
        $updatedReview = $reviewCtl->edit($request, Auth::user()->id);

        return view('notification', ['message' => 'Review has been successfully updated!']);
    }

    public function addMovie() {
        if(Auth::check()) {
            return view('addMovie', ['user' => Auth::user()]);
        } else {
            return view('notification', ['message' => 'You must be logged in to access this area!']);
        }
    }

    public function addMovieSubmit(Request $request) {
        $validatedData = $request->validate([
            'title'     => 'required|max:30',
            'synopsis'   => 'required|max:255',
            'actors'    => 'required|min:5',
            'genres'    => 'required|min:5'
        ]);

        $movieCtl = new MovieController();
        $movieCtl->store($request);

        return view('notification', ['message' => 'The movie has been successfully added!']);
    }
}
