@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $header }}'s Home Page</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p></p>
                        @if($user->account_type === 'driver')
                            @include('pages.drivers.index')
                        @elseif($user->account_type === 'owner')
                            @include('pages.owners.index')
                        @else
                            @include('pages.loaders.index')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
