<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Letter_typesController;
use App\Http\Controllers\LetterController;

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
Route::middleware('IsGuest')->group(function() {
    Route::get('/', function () {
       return view('login');
   })->name('login');
   Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
   });
   
   Route::get('/errors-permission',function() {
    return view('errors.permission');
})->name('errors.permission');

Route::middleware(['IsLogin'])->group(function() {
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
});

//    Route::get('/dashboard', function(){
//     return view('dashboard');
//    })->name('dashboard');

   
Route::middleware(['IsLogin', 'IsStaff'])->group(function() {
Route::prefix('/users')->name('users.')->group(function(){
    Route::get('/staff', [UserController::class, 'indexSt'])->name('staff.home');
    Route::get('staff/create', [UserController::class, 'createSt'])->name('staff.create');
    Route::post('staff/store', [UserController::class, 'storeSt'])->name('staff.store');
    Route::patch('staff/{id}', [UserController::class, 'updateSt'])->name('staff.update');
    Route::get('staff/{id}', [UserController::class, 'editSt'])->name('staff.edit');
    Route::delete('staff/{id}', [UserController::class, 'destroySt'])->name('staff.delete');
});
    Route::get('/guru', [UserController::class, 'indexGr'])->name('guru.home');
    Route::get('guru/create', [UserController::class, 'createGr'])->name('guru.create');
    Route::post('guru/store', [UserController::class, 'storeGr'])->name('guru.store');
    Route::patch('guru/{id}', [UserController::class, 'updateGr'])->name('guru.update');
    Route::get('guru/{id}', [UserController::class, 'editGr'])->name('guru.edit');
    Route::delete('guru/{id}', [UserController::class, 'destroyGr'])->name('guru.delete');

   });


Route::prefix('/klasifikasi')->name('klasifikasi.')->group(function (){
    Route::get('/', [Letter_typesController::class, 'index'])->name('home');
    Route::get('/create', [Letter_typesController::class, 'create'])->name('create');
    Route::post('/store', [Letter_typesController::class, 'store'])->name('store');
    Route::patch('/{id}', [Letter_typesController::class, 'update'])->name('update');
    Route::get('/lihat/{id}', [Letter_typesController::class, 'lihat'])->name('lihat');
    Route::get('/{id}', [Letter_typesController::class, 'edit'])->name('edit');
    Route::delete('/{id}', [Letter_typesController::class, 'destroy'])->name('delete');
    Route::get('/download/export-excel', [Letter_typesController::class, 'exportExcel'])->name('export-excel');
});

Route::prefix('letters')->name('letters.')->group(function (){
    Route::get('/', [LetterController::class, 'index'])->name('home');
    Route::get('/{id}', [LetterController::class, 'edit'])->name('edit');
    Route::get('/create', [LetterController::class, 'create'])->name('create');
    Route::post('/store', [LetterController::class, 'store'])->name('store');
    Route::delete('/{id}', [LetterController::class, 'destroy'])->name('delete');
});

