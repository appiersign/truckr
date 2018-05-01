@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-6 float-left">
                            Trucks
                        </div>

                        <div class="col-md-6 float-right text-right">
                            <a href="{{ route('trucks.create') }}" class="btn btn-outline-primary">Add Truck</a>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert alert-success">
                                <p class="text-center">
                                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                                </p>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>License Plate</th>
                                <th>Capacity</th>
                                <th>Type</th>
                                <th>Color</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($trucks))
                                @foreach($trucks as $truck)
                                    <tr>
                                        <td>{{ $truck->make }}</td>
                                        <td>{{ $truck->model }}</td>
                                        <td>{{ $truck->year_of_make }}</td>
                                        <td>{{ $truck->license_plate }}</td>
                                        <td>{{ $truck->capacity }}</td>
                                        <td>{{ $truck->type }}</td>
                                        <td>{{ $truck->color }}</td>
                                        <td>{{ $truck->id }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">No trucks found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection