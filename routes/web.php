<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/flights', [FlightController::class, 'index'])->name('flights/index');

Route::get('/flights/tickets/{id}', [FlightController::class, 'show'])->name('flights/view');   
Route::get('/flights/book/{id}', [FlightController::class, 'create'])->name('flights/book');  
 
Route::post('/ticket/submit', [TicketController::class, 'store'])->name('ticket.store');
Route::put('/ticket/boarding/{id}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/ticket/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.destroy');