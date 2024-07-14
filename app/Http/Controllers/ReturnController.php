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
    $returnList = ReturnModel::all();
    return response() -> json(array('data' => $returnList), 200);
  }

  public function readByClient(string $clientId)
  {
    // $returnList = ReturnModel::all();
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
}
