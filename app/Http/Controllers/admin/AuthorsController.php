<?php
namespace App\Http\Controllers\admin;
use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $authors = Author::all();

        return view('Authors.index', compact('authors'));
    }

    public function create()
    {
        return view('Authors.create');
    }

    public function store(Request $request)
    {
        \App\Author::create([
            'author_name' => $request->get('author_name'),

        ]);

        return redirect('/authors')->with('success', 'Author has been added');
    }

    public function show(Genre $genre)
    {
        //
    }

    public function edit($id)
    {
        $author = Author::find($id);

        return view('Authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author_name'=>'required',
        ]);

        $author = Author::find($id);
        $author->author_name = $request->get('author_name');

        $author->save();

        return redirect('/authors')->with('success', 'Author has been updated');
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

        return redirect('/authors')->with('success', 'Author has been delete Successfully');
    }
}
