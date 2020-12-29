<?php

use Illuminate\Support\Facades\Route;

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


Route::get('category/categor/{id}', function ($id) {
    $theme = App\Models\Category::find($id);
    return View::make('admin.pages.categorypages')->with('theme', $theme);
});
Route::get('category/categor/{id}/defl', function ($id) {
    $theme = App\Models\Category::find($id);
    return View::make('admin.pages.categorypages')->with('theme', $theme);
});
Route::get('category/categor/{id}/sorted', function ($id) {
    $theme = App\Models\Category::find($id);
    return View::make('admin.pages.categorypages')->with('theme', $theme);
});

Route::resource('category', '\App\Http\Controllers\CategoryController');



Route::get('admin/pages/defl', function () {
    return view('admin.pages.index');
});
Route::get('admin/pages/sorted', function () {
    return view('admin.pages.index');
});
Route::get('admin/pages/created', function () {
    return view('admin.pages.index');
});
Route::get('admin/pages/updated', function () {
    return view('admin.pages.index');
});



Auth::routes();

Route::namespace('\App\Http\Controllers')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('pages', 'PagesController', ['except' => ['show, create, store']]);
});

Route::get('/{url}', [
    'as'   => 'page::read',
    'uses' => '\App\Http\Controllers\PagesController@show'
])->where('url', '[^\s]+');


