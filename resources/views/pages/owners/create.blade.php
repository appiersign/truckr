@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('owners.store') }}">
    @csrf

    <div class="form-group row">
        <label for="business_name"
               class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

        <div class="col-md-6">
            <input id="business_name" type="text"
                   class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}"
                   name="business_name" value="{{ old('business_name') }}" required autofocus>

            @if ($errors->has('business_name'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('business_name') }}</strong>
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
    @endsection