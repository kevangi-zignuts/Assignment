<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('tasks')->group(function(){
        Route::get('/index', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/insert', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/task/{id}', [TaskController::class, 'show'])->name('tasks.show');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/update/{id}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
    });
});

require __DIR__.'/auth.php';

