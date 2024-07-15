<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\ReturnModel;
use App\Models\ReturnResponse;

use Carbon\Carbon;

class ReturnController extends Controller
{
  public function readAll()
  {
    $returnList = ReturnModel:: whereNotNull('returnDate') -> get();
    $returnResponses = [];
    
    foreach ($returnList as $return) {
      $returnResponse = new ReturnResponse();
      
      if ($return -> returnDate) {
        $returnResponse -> returnDate = strtoupper(Carbon::parse($return -> returnDate)->format('d M Y'));
      }

      $returnResponse -> returnCondition = $return -> returnCondition;
      switch ($return -> returnCondition) {
        case 'Baik':
          $returnResponse -> returnColor = 'green';
          break;
        case 'Rosak':
          $returnResponse -> returnColor = 'red';
          break;
      }

      $application = Application::find($return -> applicationId);
      $client = Client::find($application -> clientId);
      $returnResponse -> clientIcNumber = $client -> clientIcNumber;
      $returnResponse -> clientName = $client -> clientName;
      
      $equipment = Equipment::find($application -> equipmentId);
      $returnResponse -> equipmentName = $equipment -> equipmentName;

      $returnResponses[] = $returnResponse;
    }

    return response() -> json(array('data' => $returnResponses), 200);
  }

  public function read(string $id)
  {
    $return = ReturnModel::find($id);
    return response() -> json(array('data' => $return), 200);
  }

  public function readByClient(string $clientId)
  {
    $applications = Application::where('clientId', $clientId) -> get();
    $returnResponses = [];

    foreach ($applications as $application) {
      $returnResponse = new ReturnResponse();
      
      $return = ReturnModel::where('applicationId', $application -> applicationId) -> whereNotNull('returnDate') -> first();

      if ($return) {
        $returnResponse -> returnDate = strtoupper(Carbon::parse($return -> returnDate)->format('d M Y'));
        $returnResponse -> returnCondition = $return -> returnCondition;
        switch ($return -> returnCondition) {
          case 'Baik':
            $returnResponse -> returnColor = 'green';
            break;
          case 'Rosak':
            $returnResponse -> returnColor = 'red';
            break;
        }

        $client = Client::find($application -> clientId);
        $returnResponse -> clientIcNumber = $client -> clientIcNumber;
        $returnResponse -> clientName = $client -> clientName;
        
        $equipment = Equipment::find($application -> equipmentId);
        $returnResponse -> equipmentName = $equipment -> equipmentName;

        $returnResponses[] = $returnResponse;
      }
    }

    return response() -> json(array('data' => $returnResponses), 200);
  }

  public function create(Request $request)
  {
    $createReturn = ReturnModel::create([
      'returnId' => Str::uuid() -> toString(),
      'returnDate' => $request -> input('returnDate'),
      'returnCondition' => $request -> input('returnCondition'), 
      'returnEvidence' => $request -> input('returnEvidence')  
    ]);

    return response() -> json(array('data' => $createReturn), 200);
  }

  public function update(Request $request)
  {
    $return = ReturnModel::find($request -> input('returnId'));
    $updateReturn = $return -> update($request -> all());
    return response() -> json(array('data' => $updateReturn), 200);
  }

  public function delete(string $id)
  {
    $deleteStatus = false;
    $return = ReturnModel::find($id);

    if (!empty($return)) {
        $deleteStatus = $return -> delete();
    }

    return response() -> json(array('data' => $deleteStatus), 200);
  }
}
