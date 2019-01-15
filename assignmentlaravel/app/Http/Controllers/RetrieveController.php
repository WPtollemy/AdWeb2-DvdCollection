<?php

namespace App\Http\Controllers;

use App\Dvd;
use Illuminate\Http\Request;

class RetrieveController extends Controller
{
    public function home()
    {
        $dvds = Dvd::all();

        return view('home', compact('dvds'));
    }
}
