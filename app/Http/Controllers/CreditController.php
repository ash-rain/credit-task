<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditRequest;
use App\Models\Credit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $credits = Credit::latest()->get();
        return view('home', compact('credits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create_credit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Check if same person has exceeded the limit
        $creditsSum = Credit::where('holder', $validated['holder'])->sum('sum');
        if ($creditsSum + $validated['sum'] > 80000) {
            return back()->withErrors(['holder' => 'Holder has exceeded the limit']);
        }

        $credit = new Credit($validated);
        $credit->save();
        return to_route('home');
    }
}
