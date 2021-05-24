@extends('layouts.app')
@php
    $locale = config('app.locale');
    if(!is_null(old('language'))) {
        $locale = old('language');
        App::setLocale($locale);
    }
@endphp
@section('content')
    <div class="row text-center">
        <h1 class="col-6 mx-auto">@lang('sales.create.header')</h1>
    </div>
    <?php
        $new_errors = $errors;
    ?>

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
        <div class="mt-4">
            <label for="darbuotojas" class="form-label">Jus aptarnavęs darbuotojas:</label>
            <select class="form-select" aria-label="Pasirinkti darbuotoją" id="darbuotojas" name="darbuotojas" required>
                <option value="" selected>Pasirinkite darbuotoją...</option>
                @foreach ($employeeList as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name . ' ' . $employee->surname }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Būtina pasirinkti darbuotoją!</div>
        </div>
        <div class="mt-4">
            <label for="sutartiesNr" class="form-label">Sutarties numeris:</label>
            <input type="text" class="form-control" id="sutartiesNr" name="sutartiesNr"
                placeholder="Įveskite sutarties numerį..." required>
            <div class="invalid-feedback">Būtina įvesti sutarties numerį!</div>
        </div>
        <div class="mt-4">
            <label for="greitis" class="form-label">
                Kaip vertinate aptarnavimo greitį? Nuo 1 (labai blogai) iki 10 (labai gerai)
            </label>
            <div id="greitis" class="btn-group w-100" role="group" aria-label="Greitis">
                @foreach (range(1, 10) as $number)
                    <input type="radio" class="btn-check" name="greitis" id="greitis{{ $number }}"
                        value="{{ $number }}" autocomplete="off" onclick="(event) => { }">
                    <label class="btn btn-outline-primary" for="greitis{{ $number }}">{{ $number }}</label>
                @endforeach
            </div>
            <div class="invalid-feedback">Neįvertinote aptarnavimo greičio</div>
        </div>
        <div class="mt-4">
            <label for="aptarnavimas" class="form-label">
                Kaip vertinate aptarnavimo kokybę? Nuo 1 (labai blogai) iki 10 (labai gerai)
            </label>
            <div id="aptarnavimas" class="btn-group w-100" role="group" aria-label="Aptarnavimas">
                @foreach (range(1, 10) as $number)
                    <input type="radio" class="btn-check" name="aptarnavimas" id="aptarnavimas{{ $number }}"
                        value="{{ $number }}" autocomplete="off">
                    <label class="btn btn-outline-primary"
                        for="aptarnavimas{{ $number }}">{{ $number }}</label>
                @endforeach
            </div>
            <div class="invalid-feedback">Neįvertinote aptarnavimo kokybės</div>
        </div>
        <div class="mt-4">
            <label for="rekomendacija" class="form-label">
                Kokia tikimybė, kad rekomenduosite mus savo draugams? Nuo 1 (labai maža) iki 10 (labai didelė)
            </label>
            <div id="rekomendacija" class="btn-group w-100" role="group" aria-label="Rekomendacija">
                @foreach (range(1, 10) as $number)
                    <input type="radio" class="btn-check" name="rekomendacija" id="rekomendacija{{ $number }}"
                        value="{{ $number }}" autocomplete="off">
                    <label class="btn btn-outline-primary"
                        for="rekomendacija{{ $number }}">{{ $number }}</label>
                @endforeach
            </div>
            <div class="invalid-feedback">Nenurodėte rekomendacijos tikimybės</div>
        </div>
        <div class="mt-4">
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
