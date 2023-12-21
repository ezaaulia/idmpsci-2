<?php

use App\Http\Controllers\C45;
use App\Http\Controllers\DataTestingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MiningDataController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Import\ImportData as ImportController;
use App\Http\Controllers\Import\ImportTest as ImportTestController;
use App\Http\Controllers\MenuOperatorController;

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





// -------------------- LOGIN --------------------

// Route::middleware(['guest'])->group(function (){
//     Route::get('/', [LoginController::class, 'index'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);

// });

// Route::get('/home', function (){
//     return redirect('/admin');
// });

// Route::get('/', function () {
//     return redirect()->route('home');
// });


Route::get('/', function () {
    return view('h_home');
});


Auth::routes();

Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

Route::get('/operator', [OperatorController::class, 'index'])->name('operator');


// Route::get('/operatorrrr', [MenuOperatorController::class, 'index'])->name('operator');





// Route::group(['middleware' => 'adminAkses'], function (){
Route::middleware(['admin'])->group(function(){

    // -------------------- OPERATOR --------------------

    Route::get('/lihatoperator', [OperatorController::class, 'lihatope']);
    // Route::get('/hapusoperator', [OperatorController::class, 'hapusope']);
    Route::delete('/lihatoperator/deleteoperator/{id}', [OperatorController::class, 'destroy'])->name('deleteoperator');

    // -------------------- MINING DATA --------------------

    // Route::get('/hasilmining', [MiningDataController::class, 'index'])->name('hasilmining');
    // Route::get('/mining', [MiningDataController::class, 'isimining_data']);
    // Route::get('/miningdata', [MiningDataController::class, 'mining_data']);

    Route::get('/pohonkeputusan', [MiningDataController::class, 'pohon']);
    Route::get('/hasilmining', [MiningDataController::class, 'hasil']);
    Route::get('/pengujiandata', [DataTestingController::class, 'ujidata'])->name('pengujiandata');

    Route::get('/prediksiakurasi', [DataTestingController::class, 'calculateConfusionMatrix']);

    // ---------- IMPORT DATA UJI ----------

    Route::post('import_uji', [ImportTestController::class, '__invoke'])->name('import_uji');
// })
});

// -------------------- REGISTER --------------------

// Route::get('/registrasi', [RegisterController::class, 'regis']);
// Route::post('/registrasi', [RegisterController::class, 'store']);



// -------------------- PROFIL USER --------------------

// ---------- LIHAT ----------
Route::get('/lihatprofil', [ProfilController::class, 'lihatprofil'])->name('lihatprofil');

// ---------- EDIT ----------
Route::get('/editprofil/{id}', [ProfilController::class, 'editprofil'])->name('editprofil');
Route::patch('/editprofil/update/{id}', [ProfilController::class, 'update']);






// -------------------- SISWA --------------------

// ---------- TAMBAH SISWA ----------
Route::get('/tambahsiswa', [SiswaController::class, 'tambahsis'])->name('tambahsiswa');
Route::post('/tambahsiswa/save', [SiswaController::class, 'save']);

// ---------- LIHAT SISWA DAN DETAIL SISWA ----------

Route::get('/lihatsiswa', [SiswaController::class, 'lihatsis'])->name('lihatsiswa');
Route::get('/lihatsiswa/detailsiswa/{id}', [SiswaController::class, 'detail']);

// ---------- EDIT SISWA ----------

Route::get('/lihatsiswa/edit/{siswa}', [SiswaController::class, 'editsis'])->name('edit');
Route::put('/lihatsiswa/update/{id}', [SiswaController::class, 'update'])->name('update');

// ---------- DELETE SISWA ----------

Route::delete('/lihatsiswa/deletesiswa/{id}', [SiswaController::class, 'destroy'])->name('deletesiswa');

// ---------- LIHAT NILAI DAN EDIT NILAI ----------

Route::get('/lihatnilai', [NilaiController::class, 'lihatnilai'])->name('lihatnilai');
Route::get('/lihatnilai/edit/{nilai}', [NilaiController::class, 'editnil']);
Route::put('/lihatnilai/update/{id}', [NilaiController::class, 'update']);

// ---------- CARI SISWA ----------

Route::get('/carisiswa', [SiswaController::class, 'carisis'])->name('carisiswa');

// ---------- IMPORT SISWA ----------

Route::post('import', [ImportController::class, '__invoke'])->name('import');


// Route::get('/delete/{Data_Siswa.csv}', [SiswaController::class, 'delete'])->name('delete');


