<?php

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

Route::get('/', function () {
    return redirect()->route('dashboard.welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::group(['prefix' => LaravelLocalization::setLocale()],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

         Route::get('/', 'Dashboard\WelcomeController@index')->name('welcome');

           Route::resource('categories', 'Dashboard\CategoryController')->except(['show']);
           Route::resource('tags', 'Dashboard\TagController')->except(['show']);
           Route::resource('products', 'Dashboard\ProductController')->except(['show']);
           Route::resource('users', 'Dashboard\UserController')->except(['show']);

        });//end of dashboard routes
    });
