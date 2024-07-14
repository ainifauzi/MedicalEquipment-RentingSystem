<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ReturnItem;
use App\Models\Application;

class ReturnController extends Controller
{
    public function readAll()
    {
        $returnItems = ReturnItem::all();
        return response() -> json(array('data' => $returnItems), 200);
    }

    public function create(Request $request)
    {
        $createReturnItem = ReturnItem::create([
            'returnId' => Str::uuid() -> toString(),
            'returnDate' => $request -> input('returnDate'),
            'returnCondition' => $request -> input('returnCondition'), 
            'returnEvidence' => $request -> input('returnEvidence')  
        ]);

        return response() -> json(array('data' => $createReturnItem), 200);
    } 

    public function read(string $id)
    {
        $returnItem = ReturnItem::find($id);
        return response() -> json(array('data' => $returnItem), 200);
    }

    public function update(Request $request)
    {
        $returnItem = ReturnItem::find($request -> input('returnId'));
        $updateReturnItem = $returnItem -> update($request -> all());
        return response() -> json(array('data' => $updateReturnItem), 200);
    }

    public function delete(string $id)
    {
        $deleteStatus = false;
        $returnItem = ReturnItem::find($id);

        if (!empty($returnItem)) {
            $deleteStatus = $returnItem -> delete();
        }
        return response() -> json(array('data' => $deleteStatus), 200);
    }
}
