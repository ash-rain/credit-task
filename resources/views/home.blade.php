@extends('layout')

@section('content')
<table class="table-auto border-separate border-spacing-2 border border-slate-400" style="width: 100%;">
    <thead>
        <tr>
            <th class="border border-slate-300">Holder</th>
            <th class="border border-slate-300">Sum</th>
            <th class="border border-slate-300">Period</th>
        </tr>
    </thead>

    @foreach ($credits as $credit)
    <tr>
        <td class="border border-slate-300">{{ $credit->holder }}</td>
        <td class="border border-slate-300">{{ $credit->sum }}</td>
        <td class="border border-slate-300">{{ $credit->period }} months</td>
    </tr>
    @endforeach
</table>
@endsection