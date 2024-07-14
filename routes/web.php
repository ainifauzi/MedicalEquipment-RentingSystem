<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

// views routes
Route::get('/', function () {
    return view('index');
});
Route::get('/client_admin_dashboard', function () {
    return view('client_admin_dashboard');
});
Route::get('/client_application_dashboard', function () {
    return view('client_application_dashboard');
});
Route::get('/client_history_dashboard', function () {
    return view('client_history_dashboard');
});

// client routes
Route::post('/client/signin', [ ClientController::class, 'signin' ]);
Route::post('/client', [ ClientController::class, 'create' ]);
Route::put('/client', [ ClientController::class, 'update' ]);
Route::get('/clients', [ ClientController::class, 'readAll' ]);
Route::get('/client/{id}', [ ClientController::class, 'read' ]);