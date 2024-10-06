<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
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

Route::get('/', [ItemController::class, 'index'])->name('home');
Route::prefix('admin/items')->middleware(IsAdmin::class)->group(function () {
    Route::get('', [AdminItemController::class, 'index'])->name('item.index');
    Route::get('/create', [AdminItemController::class, 'create'])->name('item.create');
    Route::post('', [AdminItemController::class, 'store'])->name('item.store');
    Route::get('data', [AdminItemController::class, 'getItemsData']);
    Route::get('{item}', [AdminItemController::class, 'showItem']);
    Route::get('{item}/edit', [AdminItemController::class, 'edit']);
    Route::patch('{item}', [AdminItemController::class, 'update'])->name('item.update');
    Route::delete('{item}', [AdminItemController::class, 'destroy'])->name('item.delete');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
