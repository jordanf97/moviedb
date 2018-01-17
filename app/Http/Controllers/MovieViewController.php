<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;


class MovieViewController extends Controller
{
    public function index() {

        $movies = new MovieController();
        $movies = $movies->index();
        
        return view('movieView', ["movies" => $movies]);
    }
    
}
