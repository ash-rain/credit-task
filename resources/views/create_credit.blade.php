@extends('layout')

@section('content')
<form action="{{ route('store_credit') }}" method="POST">
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
        <label for="holder" class="text-right">Holder Name</label>
        <input type="text" id="holder" name="holder" class="p-2 border border-slate-800 col-span-2">
    </div>
    <div class="grid grid-cols-4 mb-1 gap-2">
        <label for="sum" class="text-right">Credit Sum</label>
        <input type="text" id="sum" name="sum" class="p-2 border border-slate-800 col-span-2">
    </div>
    <div class="grid grid-cols-4 mb-1 gap-2">
        <label for="period" class="text-right">Period (months)</label>
        <input type="number" id="period" name="period" class="p-2 border border-slate-800 col-span-2">
    </div>
    <div class="text-center">
        <input type="submit" value="Create credit" class="p-2 bg-slate-500 text-white hover:bg-slate-400">
    </div>
</form>
@endsection