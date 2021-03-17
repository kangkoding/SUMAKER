<?php

Route::get('/', 'loginController@index')->middleware('guest');
Auth::routes();
Route::get('/login', 'loginController@index')->middleware('guest')->name('login');


//ROUTE LOGIN CONTROLLER
Route::post('/masuk', 'loginController@mlebu');
Route::get('/keluar', 'loginController@metu');


//ROUTE ADMIN
Route::get('/admin', 'adminController@index')->middleware('auth:admin');
Route::get('/admin/{id}/ubahprofil', 'adminController@ubahprofil')->middleware('auth:admin');
Route::post('/admin/{id}/ubahprofilgo', 'adminController@ubahprofilGo')->middleware('auth:admin');


//ROUTE LOKET
Route::get('/loket', 'loketController@index')->middleware('auth:loket');
Route::get('/loket/{id}/ubahprofil', 'loketController@ubahprofil')->middleware('auth:loket');
Route::post('/loket/{id}/ubahprofilgo', 'loketController@ubahprofilGo')->middleware('auth:loket');

//ROUTE SEKSI
Route::get('/seksi', 'seksiController@index')->middleware('auth:seksi');
Route::get('/seksi/{id}/ubahprofil', 'seksiController@ubahprofil')->middleware('auth:seksi');
Route::post('/seksi/{id}/ubahprofilgo', 'seksiController@ubahprofilGo')->middleware('auth:seksi');

//ROUTE SURAT MASUK
Route::get('/suratmasuk/buat', 'srtMasukController@index');
Route::post('/suratmasuk/buat/go', 'srtMasukController@create');
Route::get('/suratmasuk/buat/go/getcount/{id}', 'srtMasukController@ambilCounter');
Route::get('/suratmasuk/rekap', 'srtMasukController@show');
Route::get('/suratmasuk/lampiran', 'srtMasukController@lampiran');
Route::get('/suratmasuk/lampiran/{id}/download', 'srtMasukController@lampiranDownload');
Route::get('/suratmasuk/hapus/{id}', 'srtMasukController@delete');
Route::get('/suratmasuk/ubah/{id}', 'srtMasukController@update');
Route::post('/suratmasuk/ubah/{id}/go', 'srtMasukController@updateGo');
Route::get('/suratmasuk/ubah/tindaklanjut/{id}', 'srtMasukController@updateTindakLanjut');
Route::post('/suratmasuk/ubah/tindaklanjut/{id}/go', 'srtMasukController@updateTindakLanjutGo');
Route::get('/suratmasuk/disp/{id}', 'srtMasukController@disp');
Route::post('/suratmasuk/disp/{id}/go', 'srtMasukController@dispGo');
Route::get('/suratmasuk/disp/buat/{id}', 'srtMasukController@dispBuat');
Route::post('/suratmasuk/disp/buat/{id}/go', 'srtMasukController@dispBuatGo');
Route::get('/suratmasuk/disp/ubah/{id}', 'srtMasukController@dispUbah');
Route::post('/suratmasuk/disp/ubah/{id}/go', 'srtMasukController@dispUbahGo');
Route::get('/suratmasuk/disp/hapus/{id}', 'srtMasukController@dispHapus');
Route::get('/suratmasuk/disp/cetak/{id}', 'srtMasukController@dispCetak');


//ROUTE SURAT KELUAR
Route::get('/suratkeluar/buat', 'srtKeluarController@index');
Route::post('/suratkeluar/buat/go', 'srtKeluarController@create');
Route::get('/suratkeluar/buat/go/getcount/{id}', 'srtKeluarController@ambilCounter');
Route::get('/suratkeluar/rekap', 'srtKeluarController@show');
Route::get('/suratkeluar/lampiran', 'srtKeluarController@lampiran');
Route::get('/suratkeluar/lampiran/{id}/download', 'srtKeluarController@lampiranDownload');
Route::get('/suratkeluar/hapus/{id}', 'srtKeluarController@delete');
Route::get('/suratkeluar/ubah/{id}', 'srtKeluarController@update');
Route::post('/suratkeluar/ubah/{id}/go', 'srtKeluarController@updateGo');
Route::get('/suratkeluar/kirim/{id}', 'srtKeluarController@kirim');

//ROUTE KANTOR
Route::get('/kantor', 'adminController@kantor');
Route::post('/kantorgo', 'adminController@kantorInputGo');

//ROUTE COUNTER
Route::get('/counter', 'counterController@index');
Route::get('/counter/reset/{id}', 'counterController@reset');
Route::post('/counter/reset/{id}/go', 'counterController@resetGo');
Route::get('/counter/edit/{id}', 'counterController@update');
Route::post('/counter/edit/{id}/go', 'counterController@updateGo');
Route::get('/counter/tambah', 'counterController@create');
Route::post('/counter/tambah/go', 'counterController@createGo');
Route::get('/counter/hapus/{id}', 'counterController@delete');
