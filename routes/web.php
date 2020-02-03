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


