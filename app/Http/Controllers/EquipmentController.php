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
}
