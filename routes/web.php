<?php

use App\Http\Controllers\C45;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Rute otentikasi
// Auth::routes();
// // Rute halaman beranda setelah login
// Route::get('/home', [HomeController::class, 'index'])->name('home');


// -------------------- LOGIN --------------------

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);


 // -------------------- HOMEPAGE --------------------

Route::get('/beranda', [HomeController::class, 'index'])->middleware('auth');


// -------------------- REGISTER --------------------

Route::get('/registrasi', [RegisterController::class, 'regis']);
Route::post('/registrasi', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// -------------------- PROFIL USER --------------------

// ---------- LIHAT ----------
Route::get('/lihatprofil', [ProfilController::class, 'lihatprofil'])->name('lihatprofil');

// ---------- EDIT ----------
Route::get('/editprofil/{id}', [ProfilController::class, 'editprofil'])->name('editprofil');
Route::patch('/editprofil/update/{id}', [ProfilController::class, 'update']);


// -------------------- OPERATOR --------------------

Route::get('/tambahoperator', [OperatorController::class, 'tambahope']);
Route::get('/lihatoperator', [OperatorController::class, 'lihatope']);
Route::get('/hapusoperator', [OperatorController::class, 'hapusope']);


// -------------------- SISWA --------------------

// ---------- TAMBAH SISWA ----------
Route::get('/tambahsiswa', [SiswaController::class, 'tambahsis'])->name('tambahsiswa');
Route::post('/tambahsiswa/save', [SiswaController::class, 'save']);

Route::post('/upload', [SiswaController::class, 'upload'])->name('upload');

// Route::get('/tambahnilai/{id}', [NilaiController::class, 'tambahnil'])->name('tambahnilai');
// Route::post('/tambahnilai/save/{id}', [NilaiController::class, 'save']);

// Route::get('/tambahnilai', [NilaiController::class, 'tambahnil'])->name('tambahnilai');
// Route::post('/tambahnilai/save', [NilaiController::class, 'save']);

// Route::get('/datanilai', [NilaiController::class, 'index'])->name('datanilai');

// ---------- LIHAT SISWA DAN DETAIL SISWA ----------

Route::get('/lihatsiswa', [SiswaController::class, 'lihatsis'])->name('lihatsiswa');
Route::get('/lihatsiswa/detailsiswa/{id}', [SiswaController::class, 'detail']);
// Route::get('/lihatsiswa/detailsiswa/{id}', [NilaiController::class, 'detailn']);

// ---------- EDIT SISWA ----------

Route::get('/lihatsiswa/edit/{siswa}', [SiswaController::class, 'editsis'])->name('edit');
Route::put('/lihatsiswa/update/{id}', [SiswaController::class, 'update'])->name('update');

// ---------- DELETE SISWA ----------

Route::delete('/lihatsiswa/deletesiswa/{id}', [SiswaController::class, 'destroy'])->name('deletesiswa');

// ---------- EDIT NILAI ----------

Route::get('/lihatnilai', [NilaiController::class, 'lihatnilai'])->name('lihatnilai');
Route::get('/lihatnilai/edit/{data}', [NilaiController::class, 'editnil'])->name('edit');
Route::put('/lihatnilai/update/{id}', [NilaiController::class, 'update'])->name('update');

// Route::get('/lihatnilai/editnilai/{id}', [NilaiController::class, 'editnil'])->name('editnilai');
// Route::patch('/lihatnilai/editnilai/{id}', [NilaiController::class, 'update'])->name('update');



Route::get('/carisiswa', [SiswaController::class, 'carisis'])->name('carisiswa');


// -------------------- MINING DATA --------------------

// Route::get('/hasilmining', [MiningDataController::class, 'index'])->name('hasilmining');
// Route::get('/mining', [MiningDataController::class, 'isimining_data'])->name('mining');
// Route::get('/miningdata', [MiningDataController::class, 'mining_data'])->name('miningdata');

Route::get('/pohonkeputusan', [MiningDataController::class, 'pohon']);
Route::get('/hasilmining', [MiningDataController::class, 'hasil']);
Route::get('/pengujiandata', [MiningDataController::class, 'ujidata']);
Route::post('/upload', [MiningDataController::class, 'upload'])->name('upload');
// Route::get('/lihatmining', [MiningSiswaController::class, 'mining'])->name('lihatmining');
// Route::get('/pohonkeputusan', [MiningSiswaController::class, 'index']);
// Route::get('/lihatsiswa', [SiswaController::class, 'lihatsis'])->name('lihatsiswa');
// Route::get('/hasilmining',[MiningDataController::class,'index'])->name('hasilmining');
// Route::get('/isiresult',[MiningSiswaController::class,'proses']);
// Route::get('/mining',[NilaiController::class,'save']);
// Route::get('/result',[ProsesController::class,'result']);

// routes/web.php

// Route::get('/miningdata', [MiningSiswaController::class, 'prosesmining']);
// Route::get('/hi', [MiningSiswaController::class, 'process']);

// Route::get('/mining-siswa',[MiningSiswaController::class,'index']);
// Route::get('/index', [C45::class, 'index'])->name('index');
// Route::get('/upload', [MiningDataController::class, 'upload'])->name('upload');
// Route::get('/process-data', [MiningDataController::class, 'processData'])->name('processData');
// Route::post('/process-data', 'MiningDataController@processData')->name('processData');

// Rute untuk mengimpor data siswa dari file CSV
// Route::namespace('Import')->group(function () {
//     Route::post('import', 'ImportData')->name('import');
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


