<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\LogoutController;


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


// LOGIN

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::post('/keluar', [LogoutController::class, 'keluar']);

// REGISTER

Route::get('/registrasi', [RegisterController::class, 'regis']);
Route::post('/registrasi', [RegisterController::class, 'store']);


Route::get('/beranda', [HomeController::class, 'beranda']);

// PROFIL

Route::get('/lihatprofil', [ProfilController::class, 'lihatprofil']);
Route::get('/editprofil', [ProfilController::class, 'editprofil'])->name('editprofil');
Route::post('/editprofil/update/{id}', [ProfilController::class, 'update']);


// OPERATOR

Route::get('/tambahoperator', [OperatorController::class, 'tambahope']);
Route::get('/lihatoperator', [OperatorController::class, 'lihatope']);
Route::get('/hapusoperator', [OperatorController::class, 'hapusope']);


// SISWA

Route::get('/tambahsiswa', [SiswaController::class, 'tambahsis'])->name('tambahsiswa', 'tambahnilai');
Route::post('/tambahsiswa/save', [SiswaController::class, 'save']);
// Route::post('/save', [SiswaController::class, 'save']);


Route::get('/tambahnilai', [NilaiController::class, 'tambahnil'])->name('tambahnilai');
Route::post('/tambahnilai/save', [NilaiController::class, 'save']);


// Route::get('/editsiswa', [SiswaController::class, 'editsis']);
Route::get('/lihatsiswa/editsiswa/{id}', [SiswaController::class, 'editsis']);
Route::post('/lihatsiswa/update/{id}', [SiswaController::class, 'update']);

Route::delete('/lihatsiswa/deletesiswa/{id}', [SiswaController::class, 'destroy']);
// Route::post('/lihatsiswa/deletesiswa/{id}', [SiswaController::class, 'destroy']);

Route::get('/lihatsiswa', [SiswaController::class, 'lihatsis'])->name('lihatsiswa');
Route::get('/lihatsiswa/detailsiswa/{id}', [SiswaController::class, 'details']);
// Route::get('/lihatsiswa/detailsiswa/{id}', [NilaiController::class, 'detailn'])


// Route::get('/importsiswa', [SiswaController::class, 'import']);


// Route::get('/carisiswa', [SiswaController::class, 'carisis']);


// TRAINING DATA

