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
use App\Http\Controllers\AdminSuper\PengaturanWebController;
use App\Http\Controllers\Auth\PengumumanController;
use App\Http\Controllers\Auth\VerifikasiController;
use App\Http\Controllers\BerkasSeleksiControl;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UserBerkasController;


//route untuk view pengaturan 
Route::get('/', [PengaturanWebController::class, 'showDatahome']);
Route::get('/pondok', [PengaturanWebController::class, 'showDatapondok']);
Route::get('/madin', [PengaturanWebController::class, 'showDatamadin']);
Route::get('/tpq', [PengaturanWebController::class, 'showDatatpq']);
Route::get('/tk', [PengaturanWebController::class, 'showDatatk']);
Route::get('/sd', [PengaturanWebController::class, 'showDatasd']);
Route::get('/smp', [PengaturanWebController::class, 'showDatasmp']);
Route::get('/sma', [PengaturanWebController::class, 'showDatasma']);

Route::get('/biaya', function () {
    return view('frontpage.biaya', ['title' => 'Biaya Page']);
});
Route::get('/kontak', function () {
    return view('frontPage.kontak', ['title' => 'Kontak Page']);
});


Route::get('/tagihan', function () {
    return view('frontPage.tagihan', ['title' => 'Tagihan Biaya']);
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
    Route::post('/pembagiankelas/{id}/update', [KelasController::class, 'update'])->name('pembagiankelas.update');
    Route::get('/pembagiankelas/search', [KelasController::class, 'search'])->name('pembagiankelas.search');
    Route::get('/pembagiankelas/filter', [KelasController::class, 'filter'])->name('pembagiankelas.filter');

    Route::get('/seleksiSiswa', [SeleksiAdminController::class, 'showData'])->name('seleksi.index');
    Route::get('/admin/seleksi/edit/{id}', [SeleksiAdminController::class, 'editData'])->name('seleksi.edit');
    Route::put('/admin/seleksi/update/{id}', [SeleksiAdminController::class, 'update'])->name('seleksi.update');
    Route::get('/seleksi/search', [SeleksiAdminController::class, 'search'])->name('seleksi.search');
    Route::get('/seleksi/filter', [SeleksiAdminController::class, 'filter'])->name('seleksi.filter');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('index');
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/{id}/detail', [SiswaController::class, 'show'])->name('edit-user');

    Route::get('/seleksiSiswa', [SeleksiAdminController::class, 'showData'])->name('seleksi.index');
    Route::get('/admin/seleksi/edit/{id}', [SeleksiAdminController::class, 'editData'])->name('seleksi.edit');
    Route::put('/admin/seleksi/update/{id}', [SeleksiAdminController::class, 'update'])->name('seleksi.update');
    Route::get('/seleksi/search', [SeleksiAdminController::class, 'search'])->name('seleksi.search');
    Route::get('/seleksi/filter', [SeleksiAdminController::class, 'filter'])->name('seleksi.filter');


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


    Route::get('/pengaturan-website', function () {
        return view('superAdmin.pengaturanweb', ['title' => 'Page Pengaturan']);
    });
    Route::get('/tahun-ajaran-pengaturan', [TahunAjaranController::class, 'showData'])->name('tahun-ajaran');
    // Route::get('/tahun-ajaran-pengaturan/edit', [TahunAjaranController::class, 'editId'])->name('tahun-edit');
    Route::post('/tahun-ajaran-pengaturan/edit/update/{id}', [TahunAjaranController::class, 'edit'])->name('tahun-update');
    // Route pengaturan home dan setiap infoemasi jenjang
    Route::get('/pengaturan-website', [PengaturanWebController::class, 'showpage'])->name('pengaturanpage');

    Route::get('/pengaturan-website/edit/home', [PengaturanWebController::class, 'edithome'])->name('pengaturanhome-edit');
    Route::post('/pengaturan-website/update/home', [PengaturanWebController::class, 'updatehome'])->name('pengaturanhome-update');

    Route::get('/pengaturan-website/edit/tk', [PengaturanWebController::class, 'edittk'])->name('pengaturantk-edit');
    Route::post('/pengaturan-website/update/tk', [PengaturanWebController::class, 'updatetk'])->name('pengaturantk-update');

    Route::get('/pengaturan-website/edit/sd', [PengaturanWebController::class, 'editsd'])->name('pengaturansd-edit');
    Route::post('/pengaturan-website/update/sd', [PengaturanWebController::class, 'updatesd'])->name('pengaturansd-update');

    Route::get('/pengaturan-website/edit/smp', [PengaturanWebController::class, 'editsmp'])->name('pengaturansmp-edit');
    Route::post('/pengaturan-website/update/smp', [PengaturanWebController::class, 'updatesmp'])->name('pengaturansmp-update');

    Route::get('/pengaturan-website/edit/sma', [PengaturanWebController::class, 'editsma'])->name('pengaturansma-edit');
    Route::post('/pengaturan-website/update/sma', [PengaturanWebController::class, 'updatesma'])->name('pengaturansma-update');

    Route::get('/pengaturan-website/edit/tpq', [PengaturanWebController::class, 'edittpq'])->name('pengaturantpq-edit');
    Route::post('/pengaturan-website/update/tpq', [PengaturanWebController::class, 'updatetpq'])->name('pengaturantpq-update');

    Route::get('/pengaturan-website/edit/madin', [PengaturanWebController::class, 'editmadin'])->name('pengaturanmadin-edit');
    Route::post('/pengaturan-website/update/madin', [PengaturanWebController::class, 'updatemadin'])->name('pengaturanmadin-update');

    Route::get('/pengaturan-website/edit/pondok', [PengaturanWebController::class, 'editpondok'])->name('pengaturanpondok-edit');
    Route::post('/pengaturan-website/update/pondok', [PengaturanWebController::class, 'updatepondok'])->name('pengaturanpondok-update');

    Route::post('/logoutz', [LoginController::class, 'destroy'])
        ->name('admin.logoutz');
});
