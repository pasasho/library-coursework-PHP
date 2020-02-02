<?php
namespace App\Http\Controllers\admin;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenresController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $genres = Genre::all();

        return view('Genres.index', compact('genres'));
    }

    public function create()
    {
        return view('Genres.create');
    }

    public function store(Request $request)
    {
        \App\Genre::create([
            'genre' => $request->get('genre'),

        ]);

        return redirect('/genres')->with('success', 'Genre has been added');
    }

    public function show(Genre $genre)
    {
        //
    }

    public function edit($id)
    {
        $genre = Genre::find($id);

        return view('Genres.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'genre'=>'required',
        ]);

        $genre = Genre::find($id);
        $genre->genre = $request->get('genre');

        $genre->save();

        return redirect('/genres')->with('success', 'Genre has been updated');
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return redirect('/genres')->with('success', 'Genre has been delete Successfully');
    }
}
