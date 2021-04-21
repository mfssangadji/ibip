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
})->name('welcome');

Route::get('/registrasi', 'WelcomeController@registrasi')->name('registrasi');
Route::post('/registrasi', 'WelcomeController@pregistrasi');
Route::get('/login', 'WelcomeController@login')->name('ulogin');
Route::post('/login', 'WelcomeController@pulogin')->name('pulogin');
Route::get('/logout', 'WelcomeController@logout')->name('ulogout');
Route::get('/profil', 'WelcomeController@profil')->name('profil');
Route::post('/profil', 'WelcomeController@pprofil');
Route::get('/perizinan', 'WelcomeController@perizinan')->name('uperizinan');
Route::get('/perizinan/{id}/pengajuan-ijin', 'WelcomeController@pengajuan');
Route::post('/perizinan/{id}/pengajuan-ijin', 'WelcomeController@ppengajuan');
Route::get('/riwayat', 'WelcomeController@riwayat')->name('riwayat');
Route::get('/riwayat/{id}/delete', 'WelcomeController@driwayat');
Route::get('/riwayat/{id}/comeback', 'WelcomeController@comeback');

Route::get(config('app.root').'/login', 'AuthController@login')->name('login');
Route::post(config('app.root').'/loginpost', 'AuthController@loginpost');
Route::get(config('app.root').'/logout', 'AuthController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function(){
	Route::get(config('app.root').'/dashboard', function(){
		return view('auths.dashboard');
	})->name('dashboard');

	Route::resource(config('app.root').'/users', 'UsersController', [
		'names' => [
			'index' => 'users',
			'create' => 'users.create',
			'store' => 'users.store',
		]
	]);

	Route::resource(config('app.root').'/kepel', 'KepelController', [
		'names' => [
			'index' => 'kepel',
			'create' => 'kepel.create',
			'store' => 'kepel.store',
		]
	]);

	Route::resource(config('app.root').'/peserta', 'PesertaController', [
		'names' => [
			'index' => 'peserta',
			'create' => 'peserta.create',
			'store' => 'peserta.store',
		]
	]);

	Route::get(config('app.root').'/perizinan/{id}/status', 'PerizinanController@status');
	Route::get(config('app.root').'/perizinan/{id}/peserta', 'PerizinanController@peserta');
	Route::resource(config('app.root').'/perizinan', 'PerizinanController', [
		'names' => [
			'index' => 'perizinan',
			'create' => 'perizinan.create',
			'store' => 'perizinan.store',
		]
	]);
});
