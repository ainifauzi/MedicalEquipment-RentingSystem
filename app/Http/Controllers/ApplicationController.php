<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Payment;
use App\Models\ReturnModel;
use App\Models\ApplicationResponse;

use Carbon\Carbon;
use DateTime;

class ApplicationController extends Controller
{
  public function readAll()
  {
    $applications = Application::all();
    return response() -> json(array('data' => $applications), 200);
  }

  public function create(Request $request)
  {
    $equipment = Equipment::find($request -> input('equipmentId'));
    $equipmentRentPrice = $equipment -> equipmentRentPrice;

    $rentDuration = 0;
    $rentStartDate = new DateTime($request -> input('applicationStartDate'));
    $rentEndDate = new DateTime($request -> input('applicationEndDate'));
    $rentQuantity = $request -> input('applicationQuantity');

    if ($rentStartDate == $rentEndDate) {
      $rentDuration = 1;
    } else {
      $rentDuration = ($rentEndDate -> diff($rentStartDate)) -> days;
    }

    $applicationRentPrice = $rentDuration * $equipmentRentPrice * $rentQuantity;

    $applicationId = Str::uuid() -> toString();
    $createApplication = Application::create([
      'applicationId' => $applicationId,
      'applicationQuantity' => $request -> input('applicationQuantity'),
      'applicationStartDate' => $request -> input('applicationStartDate'),
      'applicationEndDate' => $request -> input('applicationEndDate'),
      'applicationRentPrice' => $applicationRentPrice,
      // 'applicationMedicLetter' => $request -> input('applicationMedicLetter'),
      'applicationStatus' => $request -> input('applicationStatus'),
      'clientId' => $request -> input('clientId'),
      'equipmentId' => $request -> input('equipmentId')
    ]);

    $createPayment = Payment::create([
      'paymentId' => Str::uuid() -> toString(),
      // 'paymentAmount' => $request -> input('paymentAmount'),
      // 'paymentReceipt' => $request -> input('paymentReceipt'),
      // 'paymentDate' => $request -> input('paymentDate'),
      'paymentStatus' => "Belum Dibayar",
      'applicationId' => $applicationId
    ]);
    
    $createReturn = ReturnModel::create([
      'returnId' => Str::uuid() -> toString(),
      // 'returnDate' => $request -> input('returnDate'),
      // 'returnCondition' => $request -> input('returnCondition'), 
      // 'returnEvidence' => $request -> input('returnEvidence'),
      'applicationId' => $applicationId
    ]);

    return response() -> json(array('data' => $createApplication), 200);
  }

  public function read(string $id)
  {
    $application = Application::find($id);
    $applicationResponse = new ApplicationResponse();

    $applicationResponse -> applicationId = $application -> applicationId;
    $applicationResponse -> applicationQuantity = $application -> applicationQuantity;
    $applicationResponse -> applicationStartDate = strtoupper(Carbon::parse($application -> applicationStartDate)->format('d M Y'));
    $applicationResponse -> applicationEndDate = strtoupper(Carbon::parse($application -> applicationEndDate)->format('d M Y'));
    $applicationResponse -> applicationRentPrice = $application -> applicationRentPrice;
    $applicationResponse -> applicationMedicLetter = $application -> applicationMedicLetter;
    $applicationResponse -> applicationStatus = $application -> applicationStatus;

    $client = Client::find($application -> clientId);
    $applicationResponse -> clientId = $application -> clientId;
    $applicationResponse -> clientName = $client -> clientName;

    $applicationResponse -> staffId = $application -> staffId;
    
    $equipment = Equipment::find($application -> equipmentId);
    $applicationResponse -> equipmentId = $application -> equipmentId;
    $applicationResponse -> equipmentName = $equipment -> equipmentName;
    
    $payment = Payment::where('applicationId', $application -> applicationId) -> first();
    $applicationResponse -> paymentId = $payment -> paymentId;
    $applicationResponse -> paymentStatus = $payment -> paymentStatus;
    $applicationResponse -> paymentDate = $payment -> paymentDate;

    return response() -> json(array('data' => $applicationResponse), 200);
  }

  public function readByClient(string $clientId)
  {
    $applications = Application::where('clientId', $clientId) -> get();
    $applicationResponses = [];

    foreach ($applications as $application) {
      $applicationResponse = new ApplicationResponse();

      $applicationResponse -> applicationId = $application -> applicationId;
      $applicationResponse -> applicationQuantity = $application -> applicationQuantity;
      $applicationResponse -> applicationStartDate = strtoupper(Carbon::parse($application -> applicationStartDate)->format('d M Y'));
      $applicationResponse -> applicationEndDate = strtoupper(Carbon::parse($application -> applicationEndDate)->format('d M Y'));
      $applicationResponse -> applicationRentPrice = $application -> applicationRentPrice;
      $applicationResponse -> applicationMedicLetter = $application -> applicationMedicLetter;

      $applicationResponse -> applicationStatus = $application -> applicationStatus;
      switch ($application -> applicationStatus) {
        case 'Dalam Proses':
          $applicationResponse -> applicationColor = 'yellow';
          break;
        case 'Berjaya':
          $applicationResponse -> applicationColor = 'green';
          break;
        case 'Gagal':
          $applicationResponse -> applicationColor = 'red';
          break;
      }

      $client = Client::find($application -> clientId);
      $applicationResponse -> clientId = $application -> clientId;
      $applicationResponse -> clientName = $client -> clientName;

      $applicationResponse -> staffId = $application -> staffId;
      
      $equipment = Equipment::find($application -> equipmentId);
      $applicationResponse -> equipmentId = $application -> equipmentId;
      $applicationResponse -> equipmentName = $equipment -> equipmentName;
    
      $payment = Payment::where('applicationId', $application -> applicationId) -> first();
      $applicationResponse -> paymentId = $payment -> paymentId;
      $applicationResponse -> paymentStatus = $payment -> paymentStatus;
      switch ($payment -> paymentStatus) {
        case 'Dalam Proses':
          $applicationResponse -> paymentColor = 'yellow';
          break;
        case 'Telah Dibayar':
          $applicationResponse -> paymentColor = 'green';
          break;
        case 'Belum Dibayar':
          $applicationResponse -> paymentColor = 'red';
          break;
      }
      $applicationResponse -> paymentDate = $payment -> paymentDate;
      
      $applicationResponses[] = $applicationResponse;
    }

    return response() -> json(array('data' => $applicationResponses), 200);
  }

  public function update(Request $request)
  {
    $application = Application::find($request -> input('applicationId'));
    $updateApplication = $application -> update($request -> all());
    return response() -> json(array('data' => $updateApplication), 200);
  }

  public function delete(string $id)
  {
    $deleteStatus = false;
    $payment = Payment::where('applicationId', $id) -> first();
    $return = ReturnModel::where('applicationId', $id) -> first();
    $application = Application::find($id);

    if ($payment) {
      $deleteStatus = $payment -> delete();
    }
    if ($return) {
      $deleteStatus = $return -> delete();
    }
    if ($application) {
      $deleteStatus = $application -> delete();
    }

    return response() -> json(array('data' => $deleteStatus), 200);
  }
}
