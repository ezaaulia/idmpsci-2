<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);


Route::post('/keluar', [LoginController::class, 'keluar']);


Route::get('/registrasi', [RegisterController::class, 'regis']);
Route::post('/registrasi', [RegisterController::class, 'store']);


Route::get('/beranda', [HomeController::class, 'beranda']);

//PROFIL

Route::get('/lihatprofil', [ProfilController::class, 'lihatprofil']);
Route::get('/editprofil', [ProfilController::class, 'editprofil']);


// OPERATOR

Route::get('/kelolaoperator/tambahoperator', [OperatorController::class, 'tambahope']);
Route::get('/kelolaoperator/lihatoperator', [OperatorController::class, 'lihatope']);
Route::get('/kelolaoperator/hapusoperator', [OperatorController::class, 'hapusope']);


// SISWA

Route::get('/inputsiswa/tambahsiswa', [SiswaController::class, 'tambahsis'])->name('/inputsiswa/tambahsiswa');;
Route::post('/insertsiswa', [SiswaController::class, 'store'])->name('/insertsiswa');


Route::get('/inputsiswa/editsiswa', [SiswaController::class, 'editsis']);
Route::get('/inputsiswa/lihatsiswa', [SiswaController::class, 'lihatsis'])->name('inputsiswa/lihatsiswa');
Route::get('/inputsiswa/lihatsiswa/detailsiswa/{id}', [SiswaController::class, 'lihat_s']);

Route::get('/inputsiswa/importsiswa', [SiswaController::class, 'import']);
Route::get('/inputsiswa/carisiswa', [SiswaController::class, 'carisis']);

// Route::resource('/inputsiswa/tambahsiswa', SiswaController::class)->middleware('auth');
// Route::resource('/inputsiswa/tambahsiswa', [SiswaController::class, 'tambahsis'])->middleware('auth');

// TRAINING DATA

