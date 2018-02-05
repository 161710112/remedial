<?php
use App\Dosen;
use App\Jurusan;
use App\Mahasiswa;
use App\wali;
use App\Matkul_mahasiswa;
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

//Route::get('soal1', function() {
 		//$dosen = dosen::with('Mahasiswa')->get();
 		//return View::make('soal01', compact('dosen'));
	//});
		
 Route::get('soal2', function() {
 		$wali = wali::with('Mahasiswa')->get();
 		return View::make('soal02', compact('wali'));
	});

 Route::get('soal3', function() {
 		$jurusan = jurusan::with('Mahasiswa')->get();
 		return View::make('soal03', compact('jurusan'));
	});
  Route::get('/tes', function () {
    return view('template.master');
});
  Route::get('soal001', function() {
 		$dosen = dosen::where('nama','like','%Ujang Rukmana%')->get();
 		return View::make('soal01', compact('dosen'));
	});
  Route::get('bonus', function() {
 		$mahasiswa = mahasiswa::with('Dosen', 'Wali' ,'Mahasiswa','Jurusan')->get();
 		return View::make('bonus', compact('mahasiswa'));
	});