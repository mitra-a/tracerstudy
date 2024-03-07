<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="input-select-{{ $name }}">{{ $title }}</label>
    <div class="col-sm-10">
        <select class="form-control @error($name) is-invalid @enderror" id="input-select-{{ $name }}" {{ $attributes }}>
            {{ $slot }}
        </select>

        <div class="invalid-feedback">
            @error($name)
                {{ $message }}
            @enderror
        </div>
    </div>
</div>