<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Book'], function (){
    Route::resource('book', 'PostController')->names('Book.book');
});

$groupData = [
  'namespace'   => 'Book\Admin',
  'prefix'      => 'admin/book',
];

Route::group($groupData, function (){
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('book.admin.categories');
});



//Route::resource('rest', 'RestTestController')->names('restTest');
