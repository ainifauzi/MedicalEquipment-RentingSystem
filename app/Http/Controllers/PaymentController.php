<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Application;


class PaymentController extends Controller
{
    public function readAll()
    {
        $payments = Payment::all();
        return response() -> json(array('data' => $payments), 200);
    }

    public function create(Request $request)
    {
        $createPayment = Payment::create([
            'paymentId' => Str::uuid() -> toString(),
            'paymentAmount' => $request -> input('paymentAmount'),
            'paymentReceipt' => $request -> input('paymentReceipt')   
        ]);

        return response() -> json(array('data' => $createPayment), 200);
    }
}
