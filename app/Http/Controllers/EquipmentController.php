<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function readAll()
    {
        $equipments = Equipment::all();
        return response() -> json(array('data' => $equipments), 200);
    }

    public function create(Request $request)
    {
        $createEquipment = Equipment::create([
            'equipmentId' => Str::uuid() -> toString(),
            'equipmentName' => $request -> input('equipmentName'),
            'equipmentBuyDate' => $request -> input('equipmentBuyDate'),
            'equipmentBuyPrice' => $request -> input('equipmentBuyPrice'),
            'equipmentRentPrice' => $request -> input('equipmentRentPrice'),
            'equipmentQuantity' => $request -> input('equipmentQuantity'),
            'equipmentSponsor' => $request -> input('equipmentSponsor'),
            'equipmentImage' => $request -> input('equipmentImage'),
        ]);

        return response() -> json(array('data' => $createEquipment), 200);
 
    }

    public function read(string $id)
    {
        $equipment = Equipment::find($id);
        return response() -> json(array('data' => $equipment), 200);
    }

    public function update(Request $request)
    {
        $equipment = Equipment::find($request -> input('equipmentId'));
        $updateEquipment = $equipment -> update($request -> all());
        return response() -> json(array('data' => $updateEquipment), 200);
    }

    public function delete(string $id)
    {
        $deleteStatus = false;
        $equipment = Equipment::find($id);

        if (!empty($equipment)) {
            $deleteStatus = $equipment -> delete();
        }
        return response() -> json(array('data' => $deleteStatus), 200);
    }
}
