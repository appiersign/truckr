@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Truck</div>

                    <div class="card-body">
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <div class="alert alert-danger">
                                <p>
                                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                                </p>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('trucks.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="type"
                                       class="col-md-4 col-form-label text-md-right has-feedback">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="" @if(old('type') === '') selected @endif>select vehicle type</option>
                                        <option value="van" @if(old('type') === 'van') selected @endif>Van</option>
                                        <option value="reefer" @if(old('type') === 'reefer') selected @endif>Reefer</option>
                                        <option value="flatbed" @if(old('type') === 'flatbed') selected @endif>Flat Bed</option>
                                        <option value="stepdeck" @if(old('type') === 'stepdeck') selected @endif>Step Deck</option>
                                        <option value="container truck" @if(old('type') === 'container truck') selected @endif>Container Truck</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="make"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Make') }}</label>

                                <div class="col-md-6">
                                    <input id="make" type="text"
                                           class="form-control{{ $errors->has('make') ? ' is-invalid' : '' }}"
                                           name="make" value="{{ old('make') }}" placeholder="Toyota" required>

                                    @if ($errors->has('make'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('make') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                                <div class="col-md-6">
                                    <input id="model" type="text"
                                           class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}"
                                           name="model" value="{{ old('model') }}" placeholder="Corolla" required>

                                    @if ($errors->has('model'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tracker_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Tracker ID') }}</label>

                                <div class="col-md-6">
                                    <input id="tracker_id" type="text"
                                           class="form-control{{ $errors->has('tracker_id') ? ' is-invalid' : '' }}"
                                           name="tracker_id" placeholder="Track id" value="{{ old('tracker_id') }}">

                                    @if ($errors->has('tracker_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tracker_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_plate"
                                       class="col-md-4 col-form-label text-md-right">{{ __('License Plate') }}</label>

                                <div class="col-md-6">
                                    <input id="license_plate" type="text"
                                           class="form-control{{ $errors->has('license_plate') ? ' is-invalid' : '' }}"
                                           name="license_plate" value="{{ old('license_plate') }}" placeholder="License Plate Number" required>

                                    @if ($errors->has('license_plate'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('license_plate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="capacity"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Capacity (tonnes)') }}</label>

                                <div class="col-md-6">
                                    <input id="capacity" type="text"
                                           class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}"
                                           name="capacity" value="{{ old('capacity') }}" placeholder="Truck Capacity" required>

                                    @if ($errors->has('capacity'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Add') }}
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