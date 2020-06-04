<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Book'], function (){
    Route::resource('book', 'PostController')->names('Book.book');
});

//Админка
$groupData = [
  'namespace'   => 'Book\Admin',
  'prefix'      => 'admin/book',
  'middleware' => ['is_admin','auth'],
];

Route::group($groupData, function (){
    $methods = ['index', 'edit', 'update', 'create', 'store', 'restored'];
//    BookCategory
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('book.admin.categories');

//    BookPost
    Route::get('posts/{post}/restore', 'PostController@restore')->name('book.admin.posts.restore');
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('book.admin.posts');
});



//Route::resource('rest', 'RestTestController')->names('restTest');
