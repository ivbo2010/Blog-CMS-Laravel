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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

         Route::get('/', 'Dashboard\WelcomeController@index')->name('welcome');

            //category routes
           Route::resource('categories', 'Dashboard\CategoryController')->except(['show']);


            //product routes
            Route::resource('products', 'Dashboard\ProductController')->except(['show']);


            //user routes
           Route::resource('users', 'Dashboard\UserController')->except(['show']);

        });//end of dashboard routes
    });
