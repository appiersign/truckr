@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Loader Details') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right">Full Name:</td>
                                <td class="text-left">{{ $loader->user->first_name }} {{$loader->user->last_name }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Telephone:</td>
                                <td class="text-left">{{ $loader->user->telephone }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Email:</td>
                                <td class="text-left">{{ $loader->user->email }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Business Name:</td>
                                <td class="text-left">{{ $loader->business_name }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Category:</td>
                                <td class="text-left">{{ $loader->category }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Position:</td>
                                <td class="text-left">{{ $loader->position }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Address:</td>
                                <td class="text-left">{{ $loader->address }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Member Since:</td>
                                <td class="text-left">{{ $loader->created_at }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">back home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
