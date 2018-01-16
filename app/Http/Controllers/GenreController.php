<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function index($movieID) {
        return Genre::select('*')->where('movieID', $movieID)->get();
    }

    public function store(Request $request) {
        return Actor::create([
            'genre' => $request->input('genre'),
            'movieID'   => $request->input('movieID')
        ]);
    }
}
