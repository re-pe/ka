<div class="mt-3">
    <label for="{{ $id }}" class="form-label">
        {{ $label }}
    </label>
    <div id="{{ $id }}" class="btn-group w-100" role="group" aria-label="{{ ucfirst($id) }}">
        @foreach (range($rangeMin, $rangeMax) as $number)
            <input type="radio" class="btn-check" name="{{ $id }}" id="{{ $id }}{{ $number }}"
                value="{{ $number }}" autocomplete="off">
            <label class="btn btn-outline-primary" for="{{ $id }}{{ $number }}">{{ $number }}</label>
        @endforeach
    </div>
</div>
