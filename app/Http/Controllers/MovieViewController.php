<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieViewController extends Controller
{
    public function index() {
        return view('movieView');
    }
}
