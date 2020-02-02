<?php
use Illuminate\Support\Facades\Input;
use App\Book;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::resource('/books', 'admin\BooksController');
Route::resource('/authors', 'admin\AuthorsController');
Route::resource('/genres', 'admin\GenresController');
Route::resource('/images', 'admin\ImagesController');
Route::resource('/booksusers', 'BookUserController');

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $book = Book::where('book_name','LIKE','%'.$q.'%')->get();
    if(count($book) > 0)

        return view('welcome')->withDetails($book)->withQuery ( $q );

    else return view ('welcome')->withMessage('No Details found. Try to search again!');
});
