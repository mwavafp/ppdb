<?php


use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\DaftarUlangController;
use App\Http\Controllers\Admin\Auth\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\KelasController;
use App\Http\Controllers\Admin\Auth\LoginController;

use App\Http\Controllers\Admin\Auth\SeleksiAdminController;
use App\Http\Controllers\Admin\Auth\SiswaController;
use App\Http\Controllers\Admin\Auth\TagihanAdmin;
use App\Http\Controllers\AdminSuper\AdminSuperDashboardController;
use App\Http\Controllers\Auth\PengumumanController;
use App\Http\Controllers\Auth\VerifikasiController;
use App\Http\Controllers\BerkasSeleksiControl;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\UserBerkasController;

Route::get('/', function () {
    return view('frontPage.home', ['title' => 'Home Page']); //penggunaan nilai title
});
Route::get('/pondok', function () {
    return view('frontPage.pondok', ['title' => 'Pondok Information Page']);
});
Route::get('/madin', function () {
    return view('frontPage.madin', ['title' => 'Madin Information Page']);
});
Route::get('/tpq', function () {
    return view('frontPage.tpq', ['title' => 'TPQ Information Page']);
});
Route::get('/tk', function () {
    return view('frontPage.tk', ['title' => 'TK Information Page']);
});
Route::get('/sd', function () {
    return view('frontPage.sd', ['title' => 'SD Information Page']);
});
Route::get('/smp', function () {
    return view('frontPage.smp', ['title' => 'SMP Information Page']);
});
Route::get('/sma', function () {
    return view('frontPage.sma', ['title' => 'SMA Information Page']);
});
Route::get('/biaya', function () {
    return view('frontpage.biaya', ['title' => 'Biaya Page']);
});
Route::get('/kontak', function () {
    return view('frontPage.kontak', ['title' => 'Kontak Page']);
});


Route::get('/tagihan', function () {
    return view('frontPage.tagihan', ['title' => 'Tagihan Biaya']);
});
Route::get('/sd', function () {
    return view('frontPage.sd', ['title' => 'Informasi Pembayaran']);
});


Route::get('/form', function (Request $request) {
    $unitPendidikan = $request->query('unit_pendidikan', ''); // Nilai default kosong jika tidak ada parameter
    return view('frontPage.formRegister', ['title' => 'test'], compact('unitPendidikan'));
});

Route::get('/pengumumansma', [PengumumanController::class, 'showDatasma'])->name('pengumumansma');
Route::get('/pengumumansma/search', [PengumumanController::class, 'searchsma'])->name('pengumumansma.search');

Route::get('/pengumumansmp', [PengumumanController::class, 'showDatasmp'])->name('pengumumansmp');
Route::get('/pengumumansmp/search', [PengumumanController::class, 'searchsmp'])->name('pengumumansmp.search');

Route::get('/pengumumantk', [PengumumanController::class, 'showDatatk'])->name('pengumumantk');
Route::get('/pengumumantk/search', [PengumumanController::class, 'searchtk'])->name('pengumumantk.search');

Route::get('/pengumumansd', [PengumumanController::class, 'showDatasd'])->name('pengumumansd');
Route::get('/pengumumansd/search', [PengumumanController::class, 'searchsd'])->name('pengumumansd.search');

Route::get('/pengumumantpq', [PengumumanController::class, 'showDatatpq'])->name('pengumumantpq');
Route::get('/pengumumantpq/search', [PengumumanController::class, 'searchtpq'])->name('pengumumantpq.search');

Route::get('/pengumumanmadin', [PengumumanController::class, 'showDatamadin'])->name('pengumumanmadin');
Route::get('/pengumumanmadin/search', [PengumumanController::class, 'searchmadin'])->name('pengumumanmadin.search');

Route::get('/pengumumanpondok', [PengumumanController::class, 'showDatapondok'])->name('pengumumanpondok');
Route::get('/pengumumanpondok/search', [PengumumanController::class, 'searchpondok'])->name('pengumumanpondok.search');



Route::get('/pengumumansmp', function () {
    return view('frontPage.pengumumansmp', ['title' => 'halaman informasi smp']);
})->name('pengumuman-smp');

Route::get('/pengumumantk', function () {
    return view('frontPage.pengumumansmp', ['title' => 'halaman informasi tk']);
})->name('pengumuman-tk');


Route::get('/verifikasi-data', function () {
    $pemberkasanLengkap = false; // Ganti sesuai status aktual
    $pembayaranLunas = true; // Ganti sesuai status aktual

    return view('calonMurid.verifikasi', ['title' => 'Verifikasi Data', 'pemberkasanLengkap' => $pemberkasanLengkap, 'pembayaranLunas' => $pembayaranLunas,]);
});


Route::get('/pengumuman', function () {
    return view('frontPage.pengumuman', ['title' => 'About Page']);
});



//////////////////////////////////Route Auth/////////////////////////////////////
Route::middleware('guest:web')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:web')->group(function () {
    // Route::get('/biodata', function () {
    //     return view('calonMurid.biodata', ['title' => 'User Page']);
    // })->name('biodata');

    Route::get('/biodata', [BiodataController::class, 'showData'])->name('biodata');

    Route::get('/seleksi', [BerkasSeleksiControl::class, 'showData'])->name('seleksi');

    Route::get('/berkas', [UserBerkasController::class, 'showData'])->name('berkas');


    // Route::get('/verifikasi-data', function () {
    //     return view('calonMurid.verifikasi', ['title' => 'User Page']);
    // });

    Route::get('/pembayaran', [DaftarUlangController::class, 'showData'])->name('pembayaran');

    Route::get('/aya', function () {
        return view('calonMurid.b', ['title' => 'Informasi Pembayaran']);
    });     

    Route::get('/verifikasi', [VerifikasiController::class, 'showData']);

    Route::get('/pembayaran', [DaftarUlangController::class, 'showData'])->name('pembayaran');

    Route::post('logouts', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logouts');
});
///////////////////////////////////Admin Auth///////////////////////////////////////////
//prefix digunakan untuk penambahan awal sebelum view contoh 
//prefix(admin) pada view dashboard. maka nanti akan menjadi /admin/dashboard
//guest digunakan khusus pengguna yang belum login sebagai admin
//auth memerikasa pengguna sudah login
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard',['title'=>'User Page']);
    // })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware(['auth:admin', 'checkrole:admin'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('admin.page.dashboard', ['title' => 'tes']);
    // })->name('admin.dashboard');
    Route::get('/dashboard-admin', [AdminDashboardController::class, 'showUser'])->name('admin.dashboard-admin');

    Route::get('/pembagiankelas', [KelasController::class, 'showData'])->name('pembagiankelas');
    Route::get('/pembagiankelas/{id}/edit', [KelasController::class, 'edit'])->name('pembagiankelas.edit');
    Route::put('/pembagiankelas/{id}/update', [KelasController::class, 'update'])->name('pembagiankelas.update');
    Route::get('/pembagiankelas/search', [KelasController::class, 'search'])->name('pembagiankelas.search');
    Route::get('/pembagiankelas/filter', [KelasController::class, 'filter'])->name('pembagiankelas.filter');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('index');
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/{id}/detail', [SiswaController::class, 'show'])->name('edit-user');

    Route::get('tagihan/export/', [TagihanAdmin::class, 'export'])->name('tagihan.export');
    Route::get('/tagihan-admin', [TagihanAdmin::class, 'showData'])->name('tagihan-admin');
    Route::get('/edit-tagihan/{id}', [TagihanAdmin::class, 'editData'])->name('edit-tagihan');
    Route::post('update-tagihan/{id}', [TagihanAdmin::class, 'updateData'])->name('update-tagihan');
    Route::get('/search', [TagihanAdmin::class, 'search'])->name('search');
    Route::get('/filter', [TagihanAdmin::class, 'filter'])->name('filter');
    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});

Route::middleware(['auth:admin', 'checkrole:superAdmin'])->group(function () {

    Route::get('/dashboard-super-admin', [AdminDashboardController::class, 'showUserSuperAdmin'])->name('admin.dashboardSuperAdmin');
    Route::get('/data-admin', [AdminSuperDashboardController::class, 'showData'])->name('admin.dataAdminPage');
    Route::post('/tambah-admin', [AdminSuperDashboardController::class, 'createData'])->name('admin.tambah-admin');
    Route::delete('/delete-admin/{id}', [AdminSuperDashboardController::class, 'deleteData'])->name('admin.hapus-admin');
    Route::post('/logoutz', [LoginController::class, 'destroy'])
        ->name('admin.logoutz');
});
