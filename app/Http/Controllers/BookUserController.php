<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
                 $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('genres', 'books.genre_id', '=', 'genres.id')
            ->select('books.*', 'authors.author_name', 'genres.genre')
            ->get();
         

        return view('BooksUsers.index',  compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $details = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('genres', 'books.genre_id', '=', 'genres.id')
            ->select('books.book_name', 'authors.author_name', 'genres.genre')
            ->get();

        return view('BooksUsers.show',  compact('details'));
    }

   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
               }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        }
}
