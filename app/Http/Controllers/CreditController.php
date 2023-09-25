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
        $credits = Credit::all();
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
        $credit = new Credit($validated);
        $credit->save();
        return to_route('home');
    }
}
