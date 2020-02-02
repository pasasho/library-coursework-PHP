<?php
namespace App\Http\Controllers\admin;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $books = Book::all();

        return view('Books.index', compact('books'));
    }

    public function create()
    {
        return view('Books.create');
    }

    public function store(Request $request)
    {
        \App\Book::create([
            'book_name' => $request->get('book_name'),
            'author_id' => $request->get('author_id'),
            'genre_id' => $request->get('genre_id'),
            'image_id' => $request->get('image_id'),
        ]);

        return redirect('/books')->with('success', 'Book has been added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('Books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
      $book = Book::find($id);
      $book->book_name = $request->get('book_name');
      $book->author_id = $request->get('author_id');
      $book->genre_id = $request->get('genre_id');
      $book->image_id = $request->get('image_id');
        $book->save();

        return redirect('/books')->with('success', 'Book has been updated');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book has been delete Successfully');
    }
}
