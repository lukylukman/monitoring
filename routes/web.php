<?php

use App\Http\Controllers\dataorderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BuatLaporanController;
use App\Http\Controllers\DetailLaporanController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanfilterController;
use App\Imports\dataorderIMPRT;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return view('admin');
    } elseif (auth()->user()->role === 'user') {
        return view('user');
    } elseif (auth()->user()->role === 'supervisor') {
        return view('supervisor');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('monitor', [MonitorController::class, 'index'])->name('monitor');

// AKSES UNTUK USER

Route::middleware(['auth', 'checkRole:user'])->group(function () {

    Route::get('/user', [HomeController::class, 'user'])->name('user');
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');

    Route::get('/buatlaporan', [BuatLaporanController::class, 'index'])->middleware('auth');
    Route::post('/buatlaporan', [BuatLaporanController::class, 'store']);
    // rout isi laporan
    Route::get('/isilaporan/{id}', [DetailLaporanController::class, 'show']);
    Route::post('/isilaporan', [DetailLaporanController::class, 'insert']);
    Route::put('/isilaporan/{nopo}', [DetailLaporanController::class, 'update']);
    Route::delete('/isilaporan/{nopo}', [DetailLaporanController::class, 'delete']);

    Route::get('/print/{id}', [PrintController::class, 'index']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'checkRole:admin'])->group(function () {

    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::get('usersAdmin', [UserController::class, 'index'])->name('usersAdmin.index');
    Route::get('lihatLaporanAdmin', [LaporanController::class, 'index'])->name('lihatLaporanAdmin');
    Route::get('/isilapAdmin/{id}', [DetailLaporanController::class, 'show'])->name('isilapAdmin');
    Route::get('/printAdmin/{id}', [PrintController::class, 'index'])->name('printAdmin');
});

/*------------------------------------------
--------------------------------------------
All supervisor Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'checkRole:supervisor'])->group(function () {

    Route::get('/supervisor', [HomeController::class, 'supervisor'])->name('supervisor');
    Route::get('lihatLaporan', [LaporanController::class, 'index'])->name('lihatLaporan');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/laporan/{id}', [LaporanController::class, 'drop']);
    Route::get('/isilapSupervisor/{id}', [DetailLaporanController::class, 'show'])->name('isilapSupervisor');
    Route::get('/printSupervisor/{id}', [PrintController::class, 'index'])->name('printSupervisor');
    Route::post('/lihatLaporan/{id}', [LaporanController::class, 'approval'])->name('approval');

    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
});



Route::middleware('auth')->group(function () {
    Route::get('about', [dataorderController::class, 'index'])->name('about');

    Route::view('Menu', 'Menu')->name('Menu');

    // Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('checkRole:admin');
    //route update data order
    Route::get('/dataorder', 'dataorderController@index');
    Route::post('/dataorder/import_excel', 'dataorderController@import_excel');


    Route::post('data_import', [dataorderController::class, 'import']);
    //route buat laporan

    Route::get('laporan_w&m', [LaporanfilterController::class, 'index'])->name('laporan_w&m');
    Route::get('/laporan/minggu/{tanggal}', [LaporanFilterController::class, 'laporanMinggu'])->name('laporan.minggu');
    Route::get('/laporan/bulan/{bulan}', [LaporanFilterController::class, 'laporanBulan'])->name('laporan.bulan');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
