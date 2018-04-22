@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify Number</div>

                    <div class="card-body">

                        @if(count($errors->all()))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="text-center">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="row">
                            <form action="{{ route('drivers.verify') }}" class="form-horizontal col-lg-12"
                                  method="post">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <label for="code">Verification Code</label>
                                    <input type="tel" name="code" placeholder="enter verification code"
                                           class="form-control text-center" id="code" value="{{ old('telephone') }}"
                                           required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6 text-right">
                                        <input type="submit" class="btn btn-outline-primary" value="verify">
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
