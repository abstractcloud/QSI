@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row content-center">
        <div class="col-md-7">
            <div class="banner-text">
                <h1 class="big-text-header">Be happy, dont worry!</h1>
                <p class="content">Use QSI messanger simply</p>
                <button class="btn btn-success">Geted Started</button>
            </div>
        </div>
        <div class="col-md-5">
            <div class="signin clearfix">
                <h2 class="signin-title">Enter credentials to login</h2>
                <form action="{{ route('login') }}" method="post" class="clearfix">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" class="form-control qsi-input" name="email" type="email" placeholder="Enter email" value="{{ old('email') }}" required="">
                        <i class="fa fa-user"></i>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" class="form-control qsi-input" name="password" type="password" placeholder="Enter password" required="">
                        <i class="fa fa-lock"></i>
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-block signin-btn" type="submit">Login</button>
                    </div>
                     {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
