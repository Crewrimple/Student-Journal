<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
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

Route::get('/journal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/journal/create', [JournalController::class, 'create'])->name('journal.create');
Route::post('/journal', [JournalController::class, 'store'])->name('journal.store');
Route::get('/journal/{id}/edit', [JournalController::class, 'edit'])->name('journal.edit');
Route::put('/journal/{id}', [JournalController::class, 'update'])->name('journal.update');
Route::put('/journal/{id}', [JournalController::class, 'update'])->name('journal.update');
Route::get('/edit/{scoreId}', [JournalController::class, 'edit'])->name('journal.edit');
