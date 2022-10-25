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


Route::post('/keluar', [LogoutController::class, 'keluar'])->name('keluar');

// REGISTER

Route::get('/registrasi', [RegisterController::class, 'regis']);
Route::post('/registrasi', [RegisterController::class, 'store']);

// HOMEPAGE

Route::get('/beranda', [HomeController::class, 'beranda']);

// PROFIL USER
// ---------- LIHAT ----------
Route::get('/lihatprofil', [ProfilController::class, 'lihatprofil'])->name('lihatprofil');

// ---------- EDIT ----------
Route::get('/editprofil/{id}', [ProfilController::class, 'editprofil'])->name('editprofil');
Route::patch('/editprofil/update/{id}', [ProfilController::class, 'update']);


// OPERATOR

Route::get('/tambahoperator', [OperatorController::class, 'tambahope']);
Route::get('/lihatoperator', [OperatorController::class, 'lihatope']);
Route::get('/hapusoperator', [OperatorController::class, 'hapusope']);


// SISWA
// ---------- TAMBAH SISWA ----------
Route::get('/tambahsiswa', [SiswaController::class, 'tambahsis'])->name('tambahsiswa', 'tambahnilai');
Route::post('/tambahsiswa/save', [SiswaController::class, 'save']);

// ---------- TAMBAH NILAI ----------

Route::get('/tambahnilai/{id}', [NilaiController::class, 'tambahnil'])->name('tambahnilai');
Route::post('/tambahnilai/save/{id}', [NilaiController::class, 'save']);

// ---------- LIHAT SISWA DAN DETAIL SISWA ----------

Route::get('/lihatsiswa', [SiswaController::class, 'lihatsis'])->name('lihatsiswa');
Route::get('/lihatsiswa/detailsiswa/{id}', [SiswaController::class, 'details']);
// Route::get('/lihatsiswa/detailsiswa/{id}', [NilaiController::class, 'detailn']);

// ---------- EDIT SISWA ----------

Route::get('/lihatsiswa/editsiswa/{id}', [SiswaController::class, 'editsis'])->name('editsiswa');
Route::patch('/lihatsiswa/update/{id}', [SiswaController::class, 'update'])->name('update');


// ---------- DELETE SISWA ----------

Route::delete('/lihatsiswa/deletesiswa/{id}', [SiswaController::class, 'destroy'])->name('deletesiswa');


// ---------- IMPORT DATA ----------
Route::get('/import-data', [SiswaController::class, 'import']);
Route::post('/import-data', [SiswaController::class, 'store'])->name('import-data');

Route::get('/exportdata', [SiswaController::class, 'export'])->name('exportdata');


// Route::get('/carisiswa', [SiswaController::class, 'carisis']);


// TRAINING DATA

