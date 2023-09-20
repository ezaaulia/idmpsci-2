<?php

use App\Http\Controllers\C45;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MiningDataController;
use App\Http\Controllers\MiningSiswaController;
use App\Http\Controllers\ProsesController;

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


// Mengalihkan ke halaman login saat mengakses root
Route::get('/', function () {
    return redirect()->route('login');
});
// LOGIN

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Route::get('/index', [C45::class, 'index'])->name('index');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

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

// Route::get('/tambahnilai/{id}', [NilaiController::class, 'tambahnil'])->name('tambahnilai');
// Route::post('/tambahnilai/save/{id}', [NilaiController::class, 'save']);

// Route::get('/tambahnilai', [NilaiController::class, 'tambahnil'])->name('tambahnilai');
// Route::post('/tambahnilai/save', [NilaiController::class, 'save']);

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
// Route::get('/import-data', [SiswaController::class, 'import'])->name('import-data');
Route::post('/upload', [SiswaController::class, 'upload'])->name('upload');

// Route::get('/exportdata', [SiswaController::class, 'export'])->name('exportdata');
Route::get('/downloadpdf', [SiswaController::class, 'exportPDF'])->name('downloadpdf');

Route::get('/carisiswa', [SiswaController::class, 'carisis'])->name('carisiswa');


// ---------- MINING DATA ----------
// Route::get('/pengujiandata', [MiningDataController::class, 'ujidata']);
Route::get('/miningdata', [SiswaController::class, 'index']);
Route::get('/hasilmining',[MiningDataController::class,'mining'])->name('hasilmining');
// Route::get('/isiresult',[MiningSiswaController::class,'result']);
// Route::get('/mining',[NilaiController::class,'save']);
// Route::get('/result',[ProsesController::class,'result']);


// Rute untuk menampilkan daftar status kelas siswa HALAMAN MINING SISWA
// Route::get('status-kelas', 'KelasController@index')->name('status.index');