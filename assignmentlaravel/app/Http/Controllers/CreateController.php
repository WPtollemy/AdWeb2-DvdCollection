<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dvd;

class CreateController extends Controller
{
    //
    public function create()
    {
        //Stub
        $dvd = new Dvd();
        $dvd->title = request('title');
        $dvd->description = request('description');
        $dvd->save();

        return redirect('/');;
    }
}
