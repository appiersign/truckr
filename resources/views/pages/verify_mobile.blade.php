@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Telephone Verification</div>

                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('code.send') }}" class="form-horizontal col-lg-12" method="post">

                                @csrf

                                <div class="row form-group">
                                    <div class="col-md-4 col-offset-md-2 text-right">
                                        <label for="telephone">Telephone</label>
                                    </div>

                                    <div class="col-md-8">
                                        <input type="tel" name="telephone" placeholder="233240000000"
                                               class="form-control text-center" id="telephone"
                                               value="{{ old('telephone') }}" required>


                                        @if ($errors->has('telephone'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('telephone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6 text-right">
                                        <input type="submit" class="btn btn-outline-primary" value="send">
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
