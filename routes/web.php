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

Route::get('/', function () {
    return to_route('journal.index');
});
Route::get('/journal', [JournalController::class, 'index'])->name('journal.index');

Route::post('/journal', [JournalController::class, 'store'])->name('journal.store');

Route::put('/journal/{score}', [JournalController::class, 'update'])->name('journal.update');
