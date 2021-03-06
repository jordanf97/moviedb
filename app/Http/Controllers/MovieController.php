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
        
        $validatedData = $request->validate([
            'title'     => 'required|max:30',
            'synopsis'   => 'required|max:255',
            'actors'    => 'required|min:5',
            'genres'    => 'required|min:5'
        ]);



        $movie = Movie::create([
            'title' => $request->input('title'),
            'synopsis' => $request->input('synopsis')
        ]);

        $actors = explode(',', $request->input('actors'));
        $genres = explode(',', $request->input('genres'));

        foreach($actors as $actor) {
            Actor::create([
                'name'  => $actor,
                'movieID' => $movie->id
            ]);
        }

        foreach($genres as $genre) {
            Genre::create([
                'genre' => $genre,
                'movieID'   => $movie->id
            ]);
        }

        return $movie;
    }

    public function show($id) {
        return Movie::find($id);
    }
}
