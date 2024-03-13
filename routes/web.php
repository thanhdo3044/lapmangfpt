<?php

use App\Http\Controllers\admin\khuvucfptController;
use App\Http\Controllers\admin\thanhphoController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route Menu
Route::get('/', [PageController::class, 'trangchu'])->name('trangchu');
Route::get('/trang-chu', [PageController::class, 'trangchu'])->name('trangchu');
Route::get('/lap-mang-fpt', [PageController::class, 'internetfpt'])->name('internetfpt');
Route::get('/lap-dat-camera-fpt', [PageController::class, 'camerafpt'])->name('camerafpt');
Route::get('/lap-dat-truyen-hinh-fpt', [PageController::class, 'truyenhinh'])->name('truyenhinhfpt');
Route::get('/fpt-play-box', [PageController::class, 'fptplaybox'])->name('fptplaybox');
Route::get('/ho-tro-fpt', [PageController::class, 'hotro'])->name('hotro');
Route::get('/goi-cuoc-co-ban-truyen-hinh-fpt', [PageController::class, 'goicuoccoban'])->name('goicuoccoban');
Route::get('/goi-cuoc-mo-rong-truyen-hinh-fpt', [PageController::class, 'goimorong'])->name('goimorong');
Route::get('/chi-tiet-cac-danh-sach-kenh-truyen-hinh-fpt', [PageController::class, 'danhsachkenh'])->name('danhsachkenh');
Route::get('/ho-tro-ky-thuat-internet-fpt', [PageController::class, 'spkithuat'])->name('spkithuat');
Route::get('/chinh-sach-va-thu-tuc-fpt-telecom', [PageController::class, 'thutucchinhsach'])->name('thutucchinhsach');
//Route Khu vực hà nội




// ADMIN
Route::get('/dashboarsh', function ()  {
    return view('template.admin'); 
 });

 Route::get('/khu-vuc', [khuvucfptController::class, 'index'])->name('regions.index');
 Route::get('/add-khu-vuc', [khuvucfptController::class, 'create'])->name('regions.create');
 Route::post('/add-khu-vuc', [khuvucfptController::class, 'store'])->name('regions.store');
 Route::get('/xoa-khu-vuc/{id}', [khuvucfptController::class, 'destroy'])->name('regions.delete');
 Route::get('/sua-khu-vuc/{id}', [khuvucfptController::class, 'show'])->name('regions.edit');
 Route::post('/sua-khu-vuc/{id}', [khuvucfptController::class, 'update'])->name('regions.update');

 Route::resource('city', thanhphoController::class);

Route::get('/fpt-quan-ba-dinh', [PageController::class, 'hotro'])->name('hotro');

//Router nhan tin voi chu shop
Route::get('/nhan-tin-voi-chu-shop', [PageController::class, 'nhantinvoishop'])->name('nhantinvoishop');
