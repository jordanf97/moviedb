<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Genre;
use App\Actor;

class MovieController extends Controller
{
    public function index() {
        return Movie::all();
    }

    public function store(Request $request) {

        $actors = explode(',', $request->input('actors'));
        $genres = explode(',', $request->input('genres'));

        foreach($actors as $actor) {
            Actor::create([
                'name'  => $actor,
                'movieID' => $movieID
            ]);
        }

        foreach($genres as $genre) {
            Genre::create([
                'genre' => $genre,
                'movieID'   => $movieID
            ]);
        }

        $movie = Movie::create([
            'title' => $request->input('title'),
            'synopsis' => $request->input('synopsis')
        ]);

        return $movie;
    }

    public function show($id) {
        return Movie::find($id);
    }
}
