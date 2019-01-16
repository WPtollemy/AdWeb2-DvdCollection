<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dvd;

class DvdsController extends Controller
{
    //
    public function update($id)
    {
        $dvd = Dvd::find($id);

        $dvd->title = request('title');
        $dvd->description = request('description');

        $dvd->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $dvd = Dvd::find($id);

        return view('dvds.edit', compact('dvd'));
    }

    public function destroy($id)
    {
        Dvd::find($id)->delete();

        return redirect('/');
    }
}
