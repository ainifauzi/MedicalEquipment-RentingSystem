<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\StaffController;

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

// client view routes
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
// staff view routes
Route::get('/staff_application_dashboard', function () {
  return view('staff_application_dashboard');
});
Route::get('/staff_history_dashboard', function () {
  return view('staff_history_dashboard');
});
// admin view routes
Route::get('/admin_dashboard', function () {
  return view('admin_dashboard');
});
Route::get('/admin_staff_dashboard', function () {
  return view('admin_staff_dashboard');
});
Route::get('/admin_customer_dashboard', function () {
  return view('admin_customer_dashboard');
});
Route::get('/admin_equipment_dashboard', function () {
  return view('admin_equipment_dashboard');
});
Route::get('/admin_application_dashboard', function () {
  return view('admin_application_dashboard');
});

// client routes
Route::post('/client/signin', [ ClientController::class, 'signin' ]);
Route::post('/client', [ ClientController::class, 'create' ]);
Route::put('/client', [ ClientController::class, 'update' ]);
Route::get('/clients', [ ClientController::class, 'readAll' ]);
Route::get('/client/{id}', [ ClientController::class, 'read' ]);
Route::delete('/client/{id}', [ ClientController::class, 'delete' ]);

// application routes
Route::post('/application', [ ApplicationController::class, 'create' ]);
Route::put('/application', [ ApplicationController::class, 'update' ]);
Route::get('/applications', [ ApplicationController::class, 'readAll' ]);
Route::get('/application/{id}', [ ApplicationController::class, 'read' ]);
Route::get('/applications/client/{clientId}', [ ApplicationController::class, 'readByClient' ]);
Route::delete('/application/{id}', [ ApplicationController::class, 'delete' ]);

// equipment routes
Route::post('/equipment', [ EquipmentController::class, 'create' ]);
Route::post('/equipment/update', [ EquipmentController::class, 'update' ]);
Route::get('/equipments', [ EquipmentController::class, 'readAll' ]);
Route::get('/equipment/{id}', [ EquipmentController::class, 'read' ]);
Route::get('/equipment/file/{id}', [ EquipmentController::class, 'readFile' ]);
Route::delete('/equipment/{id}', [ EquipmentController::class, 'delete' ]);

// payment routes
Route::put('/payment', [ PaymentController::class, 'update' ]);
Route::get('/payment/{id}', [ PaymentController::class, 'read' ]);

// return routes
Route::get('/returns', [ ReturnController::class, 'readAll' ]);
Route::put('/return', [ ReturnController::class, 'update' ]);
Route::get('/returns/client/{clientId}', [ ReturnController::class, 'readByClient' ]);
Route::get('/return/{id}', [ ReturnController::class, 'read' ]);

// staff routes
Route::post('/staff/signin', [ StaffController::class, 'signin' ]);
Route::post('/staff', [ StaffController::class, 'create' ]);
Route::put('/staff', [ StaffController::class, 'update' ]);
Route::get('/staffs', [ StaffController::class, 'readAll' ]);
Route::get('/staff/{id}', [ StaffController::class, 'read' ]);
Route::delete('/staff/{id}', [ StaffController::class, 'delete' ]);