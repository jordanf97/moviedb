<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

class ActorController extends Controller
{
    public function index($movieID) {
        return Actor::select('*')->where('movieID', $movieID)->get();
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:15|min:4',
            'movieID' => 'required|integer',
        ]);


        return Actor::create([
            'name' => $request->input('name'),
            'movieID'   => $request->input('movieID')
        ]);
    }
}
