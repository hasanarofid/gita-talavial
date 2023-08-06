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

// route halaman awal
Route::get('/', function(){
    return redirect('/login');
});


// route panel dashboard admin
Route::get('/', 'AdminController@index')->name('admin.index')->middleware(['auth']);
Route::get('/dashboard', 'AdminController@index')->name('admin.index')->middleware(['auth']);
Route::get('/pengawas', 'PegawasMController@index')->name('pengawas.index')->middleware(['auth']);
Route::get('/get-pengawas', 'PegawasMController@getdata')->name('pengawas.getdata')->middleware(['auth']);
Route::get('/sekolah', 'SekolahMController@index')->name('sekolah.index')->middleware(['auth']);
Route::get('/get-sekolah', 'SekolahMController@getdata')->name('sekolah.getdata')->middleware(['auth']);
Route::get('/guru', 'GuruMController@index')->name('guru.index')->middleware(['auth']);
Route::get('/get-guru', 'GuruMController@getdata')->name('guru.getdata')->middleware(['auth']);



// end

Auth::routes();

Route::get('logo/{filename?}', function ($filename) {
    $path = storage_path('app/public/profile/' . $filename);

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('logo');

Route::get('favicon/{filename?}', function ($filename) {
    $path = storage_path('app/public/favicon/' . $filename);

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('favicon');
