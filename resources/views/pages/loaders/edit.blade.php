@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Updating {{ $loader->user->first_name }}</div>

                    <div class="card-body">
                        <div class="row">
                            <form method="POST" action="{{ route('loaders.update', $loader) }}">
                                @csrf

                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group row">
                                    <label for="business_name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="business_name" type="text"
                                               class="form-control{{ $errors->has('business_name') ? 'is-invalid' : '' }}"
                                               name="business_name" value="{{ old('business_name') ?? $loader->business_name }}" required
                                               autofocus>

                                        @if ($errors->has('business_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('business_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="category"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                    <div class="col-md-6">
                                        <select name="category" id="category"
                                                class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"
                                                required>
                                            <option value="">select business category</option>
                                            <option value="individual" @if ($loader->category === 'individual') selected @endif>individual</option>
                                            <option value="freight forwarder" @if ($loader->category === 'freight forwarder') selected @endif>freight forwarder</option>
                                            <option value="manufacturing company" @if ($loader->category === 'manufacturing company') selected @endif>manufacturing company</option>
                                            <option value="logistics company" @if ($loader->category === 'logistics company') selected @endif>logistics company</option>
                                            <option value="other" @if ($loader->category === 'other') selected @endif>other</option>
                                        </select>

                                        @if ($errors->has('category'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="position"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                                    <div class="col-md-6">
                                        <input id="position" type="text"
                                               class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
                                               name="position" value="{{ old('position') ?? $loader->position }}" required>

                                        @if ($errors->has('position'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('position') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" value="{{ old('address') ?? $loader->address }}" required>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-outline-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection