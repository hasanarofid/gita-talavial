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
// route halaman depan tanpa login
Route::get('/blog', 'HomeController@blog')->name('home.blog');
Route::get('/aboutus', 'HomeController@aboutus')->name('home.aboutus');
// route halaman awal
Route::get('/', function(){
    return redirect('/login');
});


// route panel dashboard
Route::get('/', 'AdminController@index')->name('admin.index')->middleware(['auth']);
Route::get('/dashboard', 'AdminController@index')->name('admin.index')->middleware(['auth']);
// end

// route penel dashboard for marketing
Route::get('/produk', 'ProdukController@index')->name('produk.index')->middleware(['auth']);
Route::get('/penjualan', 'PenjualanController@index')->name('penjualan.index')->middleware(['auth']);
Route::get('/pelanggan', 'PelangganController@index')->name('pelanggan.index')->middleware(['auth']);
Route::get('/laporan', 'LaporanController@index')->name('laporan.marketing')->middleware(['auth']);
// end this route






Route::patch('/dashboard', 'AdminController@updatereminder')->name('admin.reminder')->middleware(['auth']);

Route::get('/order', 'AdminController@order')->name('admin.order')->middleware(['auth']);
Route::get('/order/{id}', 'AdminController@show_order')->name('admin.showorder')->middleware(['auth']);

Route::get('/user', 'AdminController@user')->name('admin.user')->middleware(['auth']);

Route::get('/admin-product', 'ProductController@list')->name('admin.product')->middleware(['auth']);
//improve setting profile market
Route::get('/admin-profile', 'ProfilemarketController@index')->name('admin.profile')->middleware(['auth']);
Route::get('/admin-profileedit', 'ProfilemarketController@edit')->name('admin.profileedit')->middleware(['auth']);
Route::post('/admin-profileupdate', 'ProfilemarketController@update')->name('admin.profileupdate')->middleware(['auth']);
//end

//improve rekening
Route::get('/admin-rekening', 'RekeningController@index')->name('admin.rekening')->middleware(['auth']);
Route::get('/admin-rekeningtambah', 'RekeningController@tambah')->name('admin.rekeningtambah')->middleware(['auth']);
Route::get('/admin-rekening/edit/{id}', 'RekeningController@edit')->name('admin.rekeningedit')->middleware(['auth']);
Route::get('/admin-rekening/disable/{id}', 'RekeningController@disable')->name('admin.disableedit')->middleware(['auth']);
Route::get('/admin-rekening/hapus/{id}', 'RekeningController@hapus')->name('admin.rekeninghapus')->middleware(['auth']);
Route::post('/admin-rekeningupdate', 'RekeningController@update')->name('admin.rekeningupdate')->middleware(['auth']);
Route::post('/admin-rekeningsave', 'RekeningController@save')->name('admin.rekeningsave')->middleware(['auth']);

//end

Route::get('/admin-product/add', 'ProductController@form')->name('admin.addform')->middleware(['auth']);
Route::post('/admin-product/add', 'ProductController@create')->name('product.create')->middleware(['auth']);
Route::get('/admin-product/edit/{id}', 'ProductController@editform')->name('product.editform')->middleware(['auth']);
Route::patch('/admin-product/edit/{id}', 'ProductController@edit')->name('product.edit')->middleware(['auth']);
Route::get('/admin-product/remove/{id}', 'ProductController@remove')->name('product.remove')->middleware(['auth']);

Route::get('/admin-stock', 'StockController@index')->name('admin.stock')->middleware(['auth']);
Route::get('/admin-stock/show', 'StockController@show')->name('admin.stockshow')->middleware(['auth']);
Route::get('/admin-stock/remove/{id}', 'StockController@remove')->name('admin.removestock')->middleware(['auth']);
Route::get('/admin-stock/edit/{id}', 'StockController@editform')->name('admin.editform')->middleware(['auth']);
Route::patch('/admin-stock/edit/{id}', 'StockController@editstock')->name('admin.editstock')->middleware(['auth']);

Route::get('/admin-stock/add', 'StockController@addform')->name('admin.addstockform')->middleware(['auth']);
Route::post('/admin-stock/add', 'StockController@addstock')->name('admin.addstock')->middleware(['auth']);


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
