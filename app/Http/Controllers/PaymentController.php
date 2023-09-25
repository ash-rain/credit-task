<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $credits = Credit::all();
        return view('create_payment', compact('credits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $validated = $request->validated();
        $credit = Credit::find($validated['credit_id']);
        if ($credit->remaining < $validated['amount']) {
            $validated['amount'] = $credit->remaining;
            return back()->withErrors(['amount' => "Amount exceeds remaining. Pay only $credit->remaining."]);
        }
        $payment = new Payment($validated);
        $payment->save();
        return to_route('home');
    }
}
