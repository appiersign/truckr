@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Driver Details') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right">Full Name:</td>
                                <td class="text-left">{{ $driver->user->first_name }} {{$driver->user->last_name }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Telephone:</td>
                                <td class="text-left">{{ $driver->user->telephone }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Email:</td>
                                <td class="text-left">{{ $driver->user->email }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">License Type:</td>
                                <td class="text-left">{{ $driver->class_type }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">License PIN:</td>
                                <td class="text-left">{{ $driver->license_pin }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">License Issued:</td>
                                <td class="text-left">{{ $driver->license_date_issued }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">License Expires:</td>
                                <td class="text-left">{{ $driver->license_date_expired }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Member Since:</td>
                                <td class="text-left">{{ $driver->created_at }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">back home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
