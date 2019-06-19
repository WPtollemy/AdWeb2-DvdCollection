<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dvd;
use Khill\Lavacharts\Lavacharts;

class DvdsController extends Controller
{

    public function create()
    {
        request()->validate([
            'title'=> 'required',
            'description' => ['required', 'min:4'],
            'genre'=> 'required'
        ]);

        $dvd = new Dvd();
        $dvd->title = request('title');
        $dvd->description = request('description');
        $dvd->genre = request('genre');
        $dvd->ownerId = auth()->id();

        $dvd->save();

        return redirect('/');;
    }

    public function update($id)
    {
        request()->validate([
            'title'=> 'required',
            'description' => ['required', 'min:4']
        ]);

        $dvd = Dvd::find($id);

        $dvd->title = request('title');
        $dvd->description = request('description');
        $dvd->genre = request('genre');

        $dvd->save();

        return redirect('/');
    }

    //Gets the edit form to update films
    public function edit($id)
    {
        $dvd = Dvd::find($id);

        $this->authorize('update', $dvd);

        return view('dvds.edit', compact('dvd'));
    }

    public function destroy($id)
    {
        Dvd::find($id)->delete();

        return redirect('/');
    }

    //Home page gets all DVDs
    public function home()
    {
        $dvds = Dvd::where('ownerId', auth()->id())->paginate(9);
        $userDvds = Dvd::where('ownerId', auth()->id())->get();

        $genres = array();
        foreach ($userDvds as $dvd) {
            if (!array_key_exists($dvd->genre, $genres))
                $genres[$dvd->genre] = 1;
            else
                $genres[$dvd->genre] += 1;
        }

        $genreCount = \Lava::DataTable();
        $genreCount->addStringColumn('Genre')
            ->addNumberColumn('Amount of Films');

        foreach ($genres as $genre => $count) {
            $genreCount->addRow([$genre, $count]);
        }

        \Lava::DonutChart('Films', $genreCount, [
            'title' => 'Number of Films per Genre'
        ]);

        return view('dvds.dvds', compact('dvds'));
    }

    //Search is a search by title method
    public function search()
    {
        $dvds = new Dvd();
        $searchKey = request('searchTitle');

        //If search term is nothing just display all DVDs
        if ($searchKey == '') {
            return redirect('/');
        }

        //Search for similar values not exact
        $dvds = $dvds->where('ownerId', auth()->id())->where('title', 'LIKE', '%'.$searchKey.'%')->paginate(9); 

        $genres = array();
        foreach ($dvds as $dvd) {
            if (!array_key_exists($dvd->genre, $genres))
                $genres[$dvd->genre] = 1;
            else
                $genres[$dvd->genre] += 1;
        }

        $genreCount = \Lava::DataTable();
        $genreCount->addStringColumn('Genre')
            ->addNumberColumn('Amount of Films');

        foreach ($genres as $genre => $count) {
            $genreCount->addRow([$genre, $count]);
        }

        \Lava::DonutChart('Films', $genreCount, [
            'title' => 'Number of Films per Genre'
        ]);

        return view('dvds.dvds', compact('dvds'));
    }
}
