<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class MovieController extends Controller
{
    public function index() {
        return Movie::all();
    }

    public function store(Request $request) {
        return Movie::create($request->all());
    }

    public function show($id) {
        return Movie::find($id);
    }
}
