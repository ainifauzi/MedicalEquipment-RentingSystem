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
}
