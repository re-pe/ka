@extends('layouts.app')
@php
    $locale = config('app.locale');
    if(!is_null(old('language'))) {
        $locale = old('language');
        App::setLocale($locale);
    }
@endphp
@section('content')
    <div class="row text-center mt-4">
        <h1 class="col-6 mx-auto">@lang('sales.index.header')</h1>
    </div>
    <div class="row text-center mt-4">
        <div class="col">
            <a class="mx-auto btn btn-primary" href="{{ route('sales.create') }}">Naujas atsiliepimas</a>
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="accordion col-6 mx-auto" id="saleList">
            @foreach ($saleList as $index => $sale)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                            Sutartis Nr. {{ $sale->sutarties_nr }}, darbuotojas {{ $sale->employee->name }} {{ $sale->employee->surname }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}"
                        data-bs-parent="#saleList">
                        <div class="accordion-body text-start">
                            <p>Aptarnavimo greitis: {{ $sale->greitis}}</p>
                            <p>Aptarnavimo kokybė: {{ $sale->aptarnavimas}}</p>
                            <p>Rekomendacijų tikimybė: {{ $sale->rekomendacija}}</p>
                            <p>Sutikimas: {{ $sale->sutikimas ? __('sales.index.yes') : __('sales.index.no') }}</p>
                            @if ($sale->pastabos)
                                <p>Pastabos: {{ $sale->pastabos }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="col">
            <a class="mx-auto btn btn-primary" href="{{ route('sales.create') }}">Naujas atsiliepimas</a>
        </div>
    </div>
@endsection
