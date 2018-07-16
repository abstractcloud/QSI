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
            <div class="signin clearfix" id="formContainer">
                <form id="login" action="{{ route('login') }}" method="post" class="clearfix">
                  
                   <h2 class="signin-title">Enter credentials to login or  <a href="#" id="flipToRegister" class="flipLink"> <i class="far fa-arrow-alt-circle-right"></i></a></h2>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="login-email" class="form-control qsi-input" name="email" type="email" placeholder="Enter email" value="{{ old('email') }}" required="">
                       <!-- <i class="fa fa-user"></i>-->
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="login-password" class="form-control qsi-input" name="password" type="password" placeholder="Enter password" required="">
                        <!--<i class="fa fa-lock"></i>-->
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
                <form id="register" class="clearfix" method="POST" action="{{ route('register') }}">
                      
                        <h2 class="signin-title">  <a href="#" id="flipToLogin" class="flipLink"><i class="far fa-arrow-alt-circle-left"></i></a>  Register</h2>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          
                                <input id="register-name" type="text" class="form-control qsi-input" name="name" placeholder="Enter name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="register-email" type="email" placeholder="Enter email" class="form-control qsi-input" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="register-password" type="password" class="form-control qsi-input" placeholder="Enter password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control qsi-input" placeholder="Confirm password" name="password_confirmation" required>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-block signin-btn">
                                    Register
                                </button>
                            </div>
                          {{ csrf_field() }}
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
