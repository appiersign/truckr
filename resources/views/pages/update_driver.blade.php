@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Account Details') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('drivers.update', $driver) }}">
                        <<input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ $driver->user->first_name ?? old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ $driver->user->last_name ?? old('last_name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text"
                                           class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                           name="telephone" value="{{ $driver->user->telephone ?? old('telephone') }}" required>

                                    @if ($errors->has('telephone'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $driver->user->email ?? old('email') }}" readonly>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_type"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>

                                <div class="col-md-6">
                                    <select name="account_type" id="account_type" class="form-control" readonly>
                                        <option value="">select account type</option>
                                        <option value="driver" {{ ($driver->user->account_type === 'driver')? 'selected' : '' }}>Driver</option>
                                        <option value="loader" {{ ($driver->user->account_type === 'loader')? 'selected' : '' }}>Load Owner</option>
                                        <option value="owner" {{ ($driver->user->account_type === 'owner')? 'selected' : '' }}>Truck Owner</option>
                                    </select>

                                    @if ($errors->has('account_type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_pin"
                                       class="col-md-4 col-form-label text-md-right">{{ __('License PIN') }}</label>

                                <div class="col-md-6">
                                    <input id="license_pin" type="text"
                                           class="form-control{{ $errors->has('license_pin') ? ' is-invalid' : '' }}"
                                           name="license_pin" value="{{ $driver->license_pin ?? old('license_pin') }}" required>

                                    @if ($errors->has('license_pin'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('license_pin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_date_issued"
                                       class="col-md-4 col-form-label text-md-right">{{ __('License Date Iss') }}</label>

                                <div class="col-md-6">
                                    <input id="license_date_issued" type="text"
                                           class="form-control{{ $errors->has('license_date_issued') ? ' is-invalid' : '' }}"
                                           name="license_date_issue" value="{{ $driver->license_date_issued ?? old('license_date_issued') }}" required>

                                    @if ($errors->has('license_date_issued'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('license_date_issued') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_date_expired"
                                       class="col-md-4 col-form-label text-md-right">{{ __('License Date Exp') }}</label>

                                <div class="col-md-6">
                                    <input id="license_date_expired" type="text"
                                           class="form-control{{ $errors->has('license_date_expired') ? ' is-invalid' : '' }}"
                                           name="license_date_expired" value="{{ $driver->license_date_expired ?? old('license_date_expired') }}" required>

                                    @if ($errors->has('license_date_expired'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('license_date_expired') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
