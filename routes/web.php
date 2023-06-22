<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
   // return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/accounts',[AccountController::class,'index'])->name('accounts');
    Route::get('/create_account',[AccountController::class,'create'])->name('create_account');
    Route::post('/store_account',[AccountController::class,'store'])->name('store_account');
    Route::get('/accounts/{account}',[AccountController::class,'show'])->name('account_show');

    //opportunities
    Route::get('/opportunities',[OpportunityController::class,'index'])->name('opportunities');
    Route::get('/create_opportunity',[OpportunityController::class,'create'])->name('create_opportunity');
    Route::post('/store_opportunity',[OpportunityController::class,'store'])->name('store_opportunity');
    Route::get('/opportunities/{opportunity}/edit',[OpportunityController::class,'edit'])->name('edit_opportunity');
    Route::put('/opportunities/{opportunity}/update',[OpportunityController::class,'update'])->name('update_opportunity');
    Route::delete('/opportunities/{opportunity}',[OpportunityController::class,'destroy'])->name('delete_opportunity');

    Route::get('/steps',[DashboardController::class,'displaySteps'])->name('steps');

});

require __DIR__.'/auth.php';
