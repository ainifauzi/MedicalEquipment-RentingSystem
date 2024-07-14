<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReturnController;

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

// application routes
Route::post('/application', [ ApplicationController::class, 'create' ]);
Route::get('/application/{id}', [ ApplicationController::class, 'read' ]);
Route::get('/applications/client/{clientId}', [ ApplicationController::class, 'readByClient' ]);
Route::delete('/application/{id}', [ ApplicationController::class, 'delete' ]);

// equipment routes
Route::get('/equipments', [ EquipmentController::class, 'readAll' ]);

// payment routes
Route::put('/payment', [ PaymentController::class, 'update' ]);
Route::get('/payment/{id}', [ PaymentController::class, 'read' ]);

// return routes
Route::get('/returns/client/{clientId}', [ ReturnController::class, 'readByClient' ]);