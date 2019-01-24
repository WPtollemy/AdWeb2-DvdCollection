<?php

namespace App\Http\Controllers;

use App\Dvd;
use Illuminate\Http\Request;

class RetrieveController extends Controller
{
    public function home()
    {
        $dvds = Dvd::all();

        return view('dvds.dvds', compact('dvds'));
    }

    public function search()
    {
        $dvds = new Dvd();
        $searchKey = request('searchTitle');

        if ($searchKey == '') {
            return redirect('/');
        }

        $dvds = $dvds->where('title', $searchKey)->get(); 

        return view('dvds.dvds', compact('dvds'));
    }
}
