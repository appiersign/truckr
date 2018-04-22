@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">One last step...</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Please fill in your drivers' license details

                        <p></p>
                    @include('pages.license_details')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
