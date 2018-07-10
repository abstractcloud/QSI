@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="banner-text">
                <h1 class="big-text-header">Be happy, don't worry!</h1>
                <p class="content">Use QSI messanger simply</p>
                <button class="btn btn-success">Geted Started</button>
            </div>
        </div>
        <div class="col-md-5">
            <div class="signin clearfix">
                <h2 class="signin-title">Enter credentials to login</h2>
                <form action="" method="post" class="clearfix">
                    <div class="form-group">
                        <input class="form-control qsi-input" type="text" placeholder="Enter email" required="">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group">
                        <input class="form-control qsi-input" type="password" placeholder="Enter password" required="">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-block signin-btn" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
