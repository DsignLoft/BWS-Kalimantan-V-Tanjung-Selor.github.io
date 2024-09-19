<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EditorOnlineController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\TrackingOrderController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\OrderTanpaLoginController;
use App\Http\Controllers\PrintERP\QueueOnlineController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('history', [HomeController::class, 'history'])->name('home.history');
Route::get('visi-misi', [HomeController::class, 'visiMisi'])->name('home.visimisi');
Route::get('strucktur-organisasi', [HomeController::class, 'structurOrganisasi'])->name('home.structurorganisasi');
Route::get('tracking', [HomeController::class, 'tracking'])->name('home.tracking');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('layanan-hidrologi-sih3-ws-berau-kelai', [HomeController::class, 'layananHidrologiSih3BerauKelai'])->name('layanan.hidrologi.sih3.berau.kelai');
Route::get('layanan-hidrologi-sih3-ws-sesayap', [HomeController::class, 'layananHidrologiSih3Sesayap'])->name('layanan.hidrologi.sih3.sesayap');
Route::get('perencanaan-rpsda', [HomeController::class, 'perencanaanRpsda'])->name('planning.rpsda');
Route::get('perencanaan-lakip', [HomeController::class, 'infrastukturPantai'])->name('planning.lakip');
Route::get('infrastruktur-bendung', [HomeController::class, 'infrastukturBendung'])->name('infrastruktur.bendung');
Route::get('infrastruktur-bendungan', [HomeController::class, 'infrastukturBendungan'])->name('infrastruktur.bendungan');
Route::get('infrastruktur-embung', [HomeController::class, 'infrastukturEmbung'])->name('infrastruktur.embung');
Route::get('infrastruktur-irigrasi', [HomeController::class, 'infrastukturIrigrasi'])->name('infrastruktur.irigrasi');
Route::get('infrastruktur-pantai', [HomeController::class, 'infrastukturPantai'])->name('infrastruktur.pantai');

Route::get('layanan-rekomtek', [HomeController::class, 'layananRekomtek'])->name('layanan.rekomtek');
Route::get('rekomtek/{id}', [HomeController::class, 'detailRekomtek'])->name('detail.rekomtek');
Route::get('layanan-klimatologi', [HomeController::class, 'layananKlimatologi'])->name('layanan.klimatologi');
Route::get('berita', [HomeController::class, 'news'])->name('berita');
Route::get('berita/{id}', [HomeController::class, 'detailNews'])->name('detail.berita');
Route::get('pengumuman', [HomeController::class, 'information'])->name('pengumuman');
Route::get('perencanaan-renstra', [HomeController::class, 'planningRenstra'])->name('planning.renstra');
Route::get('maklumat-pelayanan', [HomeController::class, 'standartMaklumatPelayanan'])->name('maklumat.pelayanan');
Route::get('layanan-sid-terap', [HomeController::class, 'standartLayananSidTerap'])->name('layanan.sidterap');

Route::get('permohonan-informasi', [HomeController::class, 'layananHidrologiForm'])->name('permohonan.informasi');
Route::get('laporan-bencana-banjir', [HomeController::class, 'laporanBanjirForm'])->name('laporan.bencana.banjir');
Route::get('pengaduan-aspirasi', [HomeController::class, 'pengaduanAspirasiForm'])->name('pengaduan.aspirasi');
Route::get('layanan-survei', [HomeController::class, 'layananSurveiForm'])->name('layanan.survei');
Route::get('layanan-pengaduan', [HomeController::class, 'layananPengaduanForm'])->name('layanan.pengaduan');

Route::get('daily-visit', function () {
    for ($i = 0; $i < 100; $i++) {
        visitorToday();
    }
    return "DONE";
});

Route::get('pengunjung-kemarin', function () {
    for ($i = 0; $i < 100; $i++) {
        visitorTomorrow();
    }
    return "DONE";
});

Route::get('clear-cache', function () {
    Artisan::call('cache:clear');
    return back();
})->name('clear.cache');
Route::get('optimize', function () {
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    return Artisan::call('view:cache');
});
