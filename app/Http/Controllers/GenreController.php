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

        $validatedData = $request->validate([
            'genre' => 'required|max:15|min:4',
            'movieID' => 'required|integer',
        ]);


        $genre = Genre::create([
            'genre' => $request->input('genre'),
            'movieID'   => $request->input('movieID')
        ]);

        return response()->json($genre);
    }
}
