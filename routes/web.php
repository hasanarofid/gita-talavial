<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

// clear view
Route::get('/clear-view', function(){
    Artisan::call('view:clear');
    return 'View Cache cleared!';
});

// call migrate
Route::get('/migrate-fresh', 'MigrationController@migrateFresh');
Route::get('/seed', 'SeedController@seed');


Route::get('/', function(){
    return redirect('/login');
});

// route panel dashboard admin
Route::get('/', 'AdminController@index')->name('admin.index')->middleware(['auth']);
Route::get('/dashboard', 'AdminController@index')->name('admin.index')->middleware(['auth']);
// end panel dashboard admin

// route panel menu pengawas
Route::get('/pengawas', 'PegawasMController@index')->name('pengawas.index')->middleware(['auth']);
Route::get('/get-pengawas', 'PegawasMController@getdata')->name('pengawas.getdata')->middleware(['auth']);
Route::get('/add-pengawas', 'PegawasMController@add')->name('pengawas.add')->middleware(['auth']);
Route::get('/edit-pengawas/{id}', 'PegawasMController@edit')->name('pengawas.edit')->middleware(['auth']);
Route::post('/update-pengawas', 'PegawasMController@update')->name('pengawas.update')->middleware(['auth']);
Route::get('/import-pengawas', 'PegawasMController@import')->name('pengawas.import')->middleware(['auth']);
Route::post('/importfile-pengawas', 'PegawasMController@importfile')->name('pengawas.importfile')->middleware(['auth']);
Route::post('/store-pengawas', 'PegawasMController@store')->name('pengawas.store')->middleware(['auth']);
Route::get('/hapus-pengawas/{id}', 'PegawasMController@hapus')->name('pengawas.hapus')->middleware(['auth']);
Route::get('/excelcontoh-pengawas', 'PegawasMController@excelcontoh')->name('pengawas.excelcontoh')->middleware(['auth']);
// end route panel menu pengawas

// route panel menu sekolah
Route::get('/sekolah', 'SekolahMController@index')->name('sekolah.index')->middleware(['auth']);
Route::get('/get-sekolah', 'SekolahMController@getdata')->name('sekolah.getdata')->middleware(['auth']);
Route::get('/add-sekolah', 'SekolahMController@add')->name('sekolah.add')->middleware(['auth']);
Route::get('/edit-sekolah/{id}', 'SekolahMController@edit')->name('sekolah.edit')->middleware(['auth']);
Route::post('/update-sekolah', 'SekolahMController@update')->name('sekolah.update')->middleware(['auth']);
Route::get('/import-sekolah', 'SekolahMController@import')->name('sekolah.import')->middleware(['auth']);
Route::post('/importfile-sekolah', 'SekolahMController@importfile')->name('sekolah.importfile')->middleware(['auth']);
Route::post('/store-sekolah', 'SekolahMController@store')->name('sekolah.store')->middleware(['auth']);
Route::get('/hapus-sekolah/{id}', 'SekolahMController@hapus')->name('sekolah.hapus')->middleware(['auth']);
Route::get('/excelcontoh-sekolah', 'SekolahMController@excelcontoh')->name('sekolah.excelcontoh')->middleware(['auth']);
// end route panel menu sekolah

// route panel menu guru
Route::get('/guru', 'GuruMController@index')->name('guru.index')->middleware(['auth']);
Route::get('/get-guru', 'GuruMController@getdata')->name('guru.getdata')->middleware(['auth']);
Route::get('/add-guru', 'GuruMController@add')->name('guru.add')->middleware(['auth']);
Route::get('/edit-guru/{id}', 'GuruMController@edit')->name('guru.edit')->middleware(['auth']);
Route::post('/update-guru', 'GuruMController@update')->name('guru.update')->middleware(['auth']);
Route::get('/import-guru', 'GuruMController@import')->name('guru.import')->middleware(['auth']);
Route::post('/importfile-guru', 'GuruMController@importfile')->name('guru.importfile')->middleware(['auth']);
Route::post('/store-guru', 'GuruMController@store')->name('guru.store')->middleware(['auth']);
Route::get('/hapus-guru/{id}', 'GuruMController@hapus')->name('guru.hapus')->middleware(['auth']);
Route::get('/excelcontoh-guru', 'GuruMController@excelcontoh')->name('guru.excelcontoh')->middleware(['auth']);
// end route panel menu guru

// end
Auth::routes();
Route::get('fotopengawas/{filename?}', function ($filename) {
    $path = storage_path('app/public/pengawas/' . $filename);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('fotopengawas');

Route::get('favicon/{filename?}', function ($filename) {
    $path = storage_path('app/public/favicon/' . $filename);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('favicon');
