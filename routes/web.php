<?php

use App\Http\Controllers\DataTestingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\MiningDataController;
use App\Http\Controllers\Import\ImportData as ImportController;
use App\Http\Controllers\Import\ImportLatih as ImportLatihController;


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
    return view('h_home');
});


Auth::routes();


Route::middleware(['checkrole:admin,operator'])->group(function () {

    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

    // ********************** SISWA **********************

    // ---------- TAMBAH SISWA ----------

    Route::get('/tambahsiswa', [SiswaController::class, 'tambahsis'])->name('tambahsiswa');
    Route::post('/tambahsiswa/save', [SiswaController::class, 'save']);

    // ---------- IMPORT SISWA ----------

    Route::post('/import', [ImportController::class, '__invoke'])->name('import'); // untuk upload data siswa
    Route::post('/import_latih', [ImportLatihController::class, '__invoke'])->name('import_latih');
    Route::get('/downloadtemplate', [MiningDataController::class, 'downloadtemplate'])->name('downloadtemplate');

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


    // ********************** OPERATOR **********************

    Route::get('/lihatoperator', [OperatorController::class, 'lihatope'])->name('admin.lihatope');
    Route::delete('/lihatoperator/deleteoperator/{id}', [OperatorController::class, 'destroy'])->name('deleteoperator');


    // ********************** MINING DATA **********************
    
    Route::get('/datalatih', [MiningDataController::class, 'datalatih'])->name('datalatih');
    Route::get('/pohonkeputusan', [MiningDataController::class, 'pohon'])->name('admin.pohon');
    Route::get('/pengujiandata', [DataTestingController::class, 'ujidata'])->name('admin.pengujian');
    Route::get('/download', [DataTestingController::class, 'download'])->name('download');
    
    
    // ********************** PROFIL USER **********************
    
    // ---------- LIHAT ----------
    Route::get('/lihatprofil', [ProfilController::class, 'lihatprofil'])->name('lihatprofil');

    // ---------- EDIT ----------
    Route::get('/editprofil/{id}', [ProfilController::class, 'editprofil'])->name('editprofil');
    Route::patch('/editprofil/update/{id}', [ProfilController::class, 'update']);

});