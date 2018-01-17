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

        return view('showMovie', ['movie' => $movie, 'reviews' => $reviews]);
    }

    public function addReview($id, Request $request) {
        $reviewCtl = new ReviewController();
        $result = $reviewCtl->store($request, Auth::user()->id);

        return 'Doneski';
    }
}
