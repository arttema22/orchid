<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reception/ticket', [TicketController::class, 'index'])->name('reception.ticket');
Route::post('/reception/ticket', [TicketController::class, 'send'])->name('reception.send');
Route::get('/reception/status', [TicketController::class, 'status'])->name('reception.status');
Route::post('/reception/status', [TicketController::class, 'result'])->name('reception.result');

Route::get('/service/ticket', [OrderController::class, 'index'])->name('service.ticket');
Route::post('/service/ticket', [OrderController::class, 'send'])->name('service.send');
