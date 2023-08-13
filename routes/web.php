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

// route penel dashboard for superadmin
Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
    // route menu admin 
    Route::prefix('admin')->group(function () {
        Route::get('/data', 'AdminController@data')->name('admin.data');
        Route::get('/get-admin', 'AdminController@getdata')->name('admin.list');
        Route::get('/add-admin', 'AdminController@add')->name('admin.add');
        Route::post('/store-admin', 'AdminController@store')->name('admin.store');
        Route::get('/edit-admin/{id}', 'AdminController@edit')->name('admin.edit');
        Route::post('/update-admin/{id}', 'AdminController@update')->name('admin.update');
        Route::get('/hapus-admin{id}', 'AdminController@hapus')->name('admin.hapus');
    });
    // end route menu admin 
});    
// end route penel dashboard for superadmin

// route penel dashboard for admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // route menu pengawas 
    Route::prefix('pengawas')->group(function () {
        // route panel menu pengawas
        Route::get('/', 'PegawasMController@index')->name('pengawas.index');
        Route::get('/get-pengawas', 'PegawasMController@getdata')->name('pengawas.getdata');
        Route::get('/add-pengawas', 'PegawasMController@add')->name('pengawas.add');
        Route::get('/edit-pengawas/{id}', 'PegawasMController@edit')->name('pengawas.edit');
        Route::post('/update-pengawas', 'PegawasMController@update')->name('pengawas.update');
        Route::get('/import-pengawas', 'PegawasMController@import')->name('pengawas.import');
        Route::post('/importfile-pengawas', 'PegawasMController@importfile')->name('pengawas.importfile');
        Route::post('/store-pengawas', 'PegawasMController@store')->name('pengawas.store');
        Route::get('/hapus-pengawas/{id}', 'PegawasMController@hapus')->name('pengawas.hapus');
        Route::get('/excelcontoh-pengawas', 'PegawasMController@excelcontoh')->name('pengawas.excelcontoh');
        // end route panel menu pengawas
    });

    // route menu pengawas 
    Route::prefix('sekolah')->group(function () {
    // route panel menu sekolah
        Route::get('/', 'SekolahMController@index')->name('sekolah.index');
        Route::get('/get-sekolah', 'SekolahMController@getdata')->name('sekolah.getdata');
        Route::get('/add-sekolah', 'SekolahMController@add')->name('sekolah.add');
        Route::get('/edit-sekolah/{id}', 'SekolahMController@edit')->name('sekolah.edit');
        Route::post('/update-sekolah', 'SekolahMController@update')->name('sekolah.update');
        Route::get('/import-sekolah', 'SekolahMController@import')->name('sekolah.import');
        Route::post('/importfile-sekolah', 'SekolahMController@importfile')->name('sekolah.importfile');
        Route::post('/store-sekolah', 'SekolahMController@store')->name('sekolah.store');
        Route::get('/hapus-sekolah/{id}', 'SekolahMController@hapus')->name('sekolah.hapus');
        Route::get('/excelcontoh-sekolah', 'SekolahMController@excelcontoh')->name('sekolah.excelcontoh');
    // end route panel menu sekolah
    });

    // route panel menu guru
      Route::prefix('guru')->group(function () {
        Route::get('/', 'GuruMController@index')->name('guru.index');
        Route::get('/get-guru', 'GuruMController@getdata')->name('guru.getdata');
        Route::get('/add-guru', 'GuruMController@add')->name('guru.add');
        Route::get('/edit-guru/{id}', 'GuruMController@edit')->name('guru.edit');
        Route::post('/update-guru', 'GuruMController@update')->name('guru.update');
        Route::get('/import-guru', 'GuruMController@import')->name('guru.import');
        Route::post('/importfile-guru', 'GuruMController@importfile')->name('guru.importfile');
        Route::post('/store-guru', 'GuruMController@store')->name('guru.store');
        Route::get('/hapus-guru/{id}', 'GuruMController@hapus')->name('guru.hapus');
        Route::get('/excelcontoh-guru', 'GuruMController@excelcontoh')->name('guru.excelcontoh');
    });
    // end route panel menu guru

    // route panel menu stakeholder
      Route::prefix('stakeholder')->group(function () {
        Route::get('/', 'StakeholderController@index')->name('stakeholder.index');
        Route::get('/get-stakeholder', 'StakeholderController@getdata')->name('stakeholder.getdata');
        Route::get('/add-stakeholder', 'StakeholderController@add')->name('stakeholder.add');
        Route::get('/edit-stakeholder/{id}', 'StakeholderController@edit')->name('stakeholder.edit');
        Route::post('/update-stakeholder', 'StakeholderController@update')->name('stakeholder.update');
        Route::get('/import-stakeholder', 'StakeholderController@import')->name('stakeholder.import');
        Route::post('/importfile-stakeholder', 'StakeholderController@importfile')->name('stakeholder.importfile');
        Route::post('/store-stakeholder', 'StakeholderController@store')->name('stakeholder.store');
        Route::get('/hapus-stakeholder/{id}', 'StakeholderController@hapus')->name('stakeholder.hapus');
        Route::get('/excelcontoh-stakeholder', 'StakeholderController@excelcontoh')->name('stakeholder.excelcontoh');
    });
    // end route panel menu stakeholder
});   
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
