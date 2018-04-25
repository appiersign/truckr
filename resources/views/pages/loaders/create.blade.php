@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Loader Details</div>

                    <div class="card-body">
                        <div class="row">
                            <form method="POST" action="{{ route('loaders.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="business_name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="business_name" type="text"
                                               class="form-control{{ $errors->has('business_name') ? 'is-invalid' : '' }}"
                                               name="business_name" value="{{ old('business_name') }}" required
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
                                            <option value="individual">individual</option>
                                            <option value="freight forwarder">freight forwarder</option>
                                            <option value="manufacturing company">manufacturing company</option>
                                            <option value="logistics company">logistics company</option>
                                            <option value="other">other</option>
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
                                               name="position" value="{{ old('position') }}" required>

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
                                               name="address" value="{{ old('address') }}" required>

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
                                            {{ __('Register') }}
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