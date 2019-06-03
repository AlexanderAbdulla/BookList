<?php
use Illuminate\Http\Request;

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
    $books = \App\Book::all();
    return view('welcome', ['books' => $books]);
});

Route::get('/books/{id}', function($id){
    $book = \App\Book::find($id);
    return 'welcome' . $book->title;
});

Route::get('/test/{id}', function($id) {
    return 'test ' . $id;
});

Route::get('/submit', function () {
    return view('submit');
});

Route::get('/update/{id}', function ($id){
    return view('update')->with('id', $id);
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'description' => 'required|max:255',
    ]);

    $book = tap(new App\Book($data))->save();

    return redirect('/');
});

Route::post('/update', function (Request $request) {
    $book = \App\Book::find($request['id']);
    $book->title = $request['title'];
    $book->author = $request['author'];
    $book->description = $request['description'];
    $book->save();
    return redirect('/');
});

Route::get('delete/{id}', function ($id) {
    $result = \App\Book::find($id)->delete();
    return redirect('/');
});
/*
Route::get('update/{id}', function ($id){
    $data = array('one', 'two', 'three');
    //$book = new App\Book($data);
    $book = \App\Book::find($id);
    //$book->author = 'testChange';
    $book->save();
    return redirect('/');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
