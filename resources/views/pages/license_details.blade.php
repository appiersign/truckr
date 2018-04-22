<form method="POST" action="{{ route('drivers.store') }}">
    @csrf

    <div class="form-group row">
        <label for="license_pin"
               class="col-md-4 col-form-label text-md-right">{{ __('License PIN') }}</label>

        <div class="col-md-6">
            <input id="license_pin" type="text"
                   class="form-control{{ $errors->has('license_pin') ? ' is-invalid' : '' }}"
                   name="license_pin" value="{{ old('license_pin') }}" required autofocus>

            @if ($errors->has('license_pin'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('license_pin') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="class_type"
               class="col-md-4 col-form-label text-md-right">{{ __('Class Type') }}</label>

        <div class="col-md-6">
            <input id="class_type" type="text"
                   class="form-control{{ $errors->has('class_type') ? ' is-invalid' : '' }}"
                   name="class_type" value="{{ old('class_type') }}" required>

            @if ($errors->has('class_type'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('class_type') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="date_issued"
               class="col-md-4 col-form-label text-md-right">{{ __('Date Issued') }}</label>

        <div class="col-md-6">
            <input id="date_issued" type="text"
                   class="form-control{{ $errors->has('date_issued') ? ' is-invalid' : '' }}"
                   name="date_issued"
                   value="{{ old('date_issued') }}" required>

            @if ($errors->has('date_issued'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date_issued') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="date_expired"
               class="col-md-4 col-form-label text-md-right">{{ __('Date Expired') }}</label>

        <div class="col-md-6">
            <input id="date_expired" type="text"
                   class="form-control{{ $errors->has('date_expired') ? ' is-invalid' : '' }}"
                   name="date_expired" value="{{ old('date_expired') }}" required>

            @if ($errors->has('date_expired'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date_expired') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-outline-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>