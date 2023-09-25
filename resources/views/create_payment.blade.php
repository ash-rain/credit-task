@extends('layout')

@section('content')
<form action="{{ route('store_payment') }}" method="POST">
    @csrf

    @if ($errors->any())
    <div class="bg-red-400 p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-4 mb-1 gap-2">
        <label for="credit_id" class="text-right">Credit</label>
        <select id="credit_id" name="credit_id" class="p-2 border border-slate-800 col-span-2">
            <option>Select</option>
            @foreach ($credits as $credit)
                <option value="{{ $credit->id }}">
                    {{ $credit->holder }}
                    -
                    {{ $credit->sum }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="grid grid-cols-4 mb-1 gap-2">
        <label for="amount" class="text-right">Amount</label>
        <input type="text" id="amount" name="amount" class="p-2 border border-slate-800 col-span-2">
    </div>
    <div class="text-center">
        <input type="submit" value="Create payment" class="p-2 bg-slate-500 text-white hover:bg-slate-400">
    </div>
</form>
@endsection