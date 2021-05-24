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
        <h1 class="col-6 mx-auto">@lang('sales.create.header')</h1>
    </div>
    @if ($errors->any())
        <div class="row">
            <div class="col-6 mx-auto alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>@lang($error)</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <form class="col-6 mx-auto needs-validation" method="POST" action="{{ route('sales.store') }}" novalidate>
        @csrf
        <div class="mt-3">
            <label for="darbuotojas" class="form-label">Jus aptarnavęs darbuotojas:</label>
            <select class="form-select" aria-label="Pasirinkti darbuotoją" id="darbuotojas" name="darbuotojas" required>
                <option value="" selected>Pasirinkite darbuotoją...</option>
                @foreach ($employeeList as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name . ' ' . $employee->surname }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Būtina pasirinkti darbuotoją!</div>
        </div>
        <div class="mt-3">
            <label for="sutartiesNr" class="form-label">
                Sutarties numeris:
            </label>
            <input type="text" class="form-control" id="sutartiesNr" name="sutartiesNr"
                placeholder="Įveskite sutarties numerį..." required>
            <div class="invalid-feedback">Būtina įvesti sutarties numerį!</div>
        </div>
        <x-rating-field
            id="greitis"
            label="Kaip vertinate aptarnavimo greitį? Nuo 1 (labai blogai) iki 10 (labai gerai)"
            range-min="1"
            range-max="10"
        />
        <x-rating-field
            id="aptarnavimas"
            label="Kaip vertinate aptarnavimo kokybę? Nuo 1 (labai blogai) iki 10 (labai gerai)"
            range-min="1"
            range-max="10"
        />
        <x-rating-field
            id="rekomendacija"
            label="Kokia tikimybė, kad rekomenduosite mus savo draugams? Nuo 1 (labai maža) iki 10 (labai didelė)"
            range-min="1"
            range-max="10"
        />
        <div class="mt-3">
            <label for="pastabos" class="form-label">
                Gal galite pakomentuoti kodėl pateikėte tokius vertinimus?
            </label>
            <textarea class="form-control" id="pastabos" name="pastabos" rows="5"></textarea>
        </div>
        <div class="mt-4">
            <label for="pastabos" class="form-label">
                Ar galėsime šį Jūsų vertinimą panaudoti savo svetainėje ar socialiniuose puslapiuose?
            </label>
            @foreach (['Taip', 'Ne'] as $index => $label)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sutikimas" id="sutikimas{{ $index + 1 }}"
                        value="{{ $index < 1 ? 1 : 0 }}" {{ $index < 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="sutikimas{{ $index + 1 }}">{{ $label }}</label>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Siųsti</button>
        </div>
    </form>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

    </script>
@endsection
