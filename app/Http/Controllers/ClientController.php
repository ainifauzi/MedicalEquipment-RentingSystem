<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\SigninResponse;

class ClientController extends Controller
{
  // signin client
  public function signin(Request $request)
  {
    $signinResponse = new SigninResponse();
    $existingClient = Client::where('clientIcNumber', '=', $request -> input('clientIcNumber')) -> first();

    if(!empty($existingClient)) {
      if (strcmp($existingClient -> clientPassword, $request -> input('clientPassword')) == 0) {
        $signinResponse -> responseId = $existingClient -> clientId;
        $signinResponse -> responseStatus = true;
      } else {
        $signinResponse -> responseStatus = false;
        $signinResponse -> responseMessage = 'Failed! Wrong password.';
      }
    } else {
      $signinResponse -> responseStatus = false;
      $signinResponse -> responseMessage = 'Failed! Not registered.';
    }

    return response() -> json(array('data' => $signinResponse), 200);
  }

  public function readAll()
  {
    $clients = Client::all();
    return response() -> json(array('data' => $clients), 200);
  }
    
  // insert client
  public function insert(Request $request)
  {
    $createClient = Client::create([
      'clientId' => Str::uuid() -> toString(),
      'clientIcNumber' => $request -> input('clientIcNumber'),
      'clientName' => $request -> input('clientName'),
      'clientEmail' => $request -> input('clientEmail'),
      'clientPhoneNo' => $request -> input('clientPhoneNo'),
      'clientAddress' => $request -> input('clientAddress'),
      'clientJob' => $request -> input('clientJob'),
      'clientCancerType' => $request -> input('clientCancerType'),
      'clientMembership' => $request -> input('clientMembership'),
      'clientPassword' => $request -> input('clientPassword')
    ]);

    return response() -> json(array('data' => $createClient), 200);
  }
}
