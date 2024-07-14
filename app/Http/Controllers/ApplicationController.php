<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Client;
use App\Models\Staff;
use App\Models\Equipment;

class ApplicationController extends Controller
{
    public function readAll()
    {
        $applications = Application::all();
        return response() -> json(array('data' => $applications), 200);
    }

    public function create(Request $request)
    {
        $createApplication = Application::create([
            'applicationId' => Str::uuid() -> toString(),
            'applicationQuantity' => $request -> input('applicationQuantity'),
            'applicationStartDate' => $request -> input('applicationStartDate'),
            'applicationEndDate' => $request -> input('applicationEndDate'),
            'applicationRentPrice' => $request -> input('applicationRentPrice'),
            'applicationMedicLetter' => $request -> input('applicationMedicLetter'),
            'applicationStatus' => $request -> input('applicationStatus')
        ]);

        return response() -> json(array('data' => $createApplication), 200);
 
    }

    public function read(string $id)
    {
        $application = Application::find($id);
        return response() -> json(array('data' => $application), 200);
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
        $application = Application::find($id);

        if (!empty($application)) {
            $deleteStatus = $application -> delete();
        }
        return response() -> json(array('data' => $deleteStatus), 200);
    }
}
