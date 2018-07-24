@extends('layouts.profile')

@section('content')
    <div class="main-container">
        <div class="main-profile">
            <div class="sidebar-icons">

            </div>
            <div class="sidebar-list">

            </div>

            <div class="content-box">
                <div class="message-list"></div>
                <form method="post" class="">
                    <div class="form-group message-input-wrap">
                        <input id="msg" class="message-box qsi-input form-control" />
                        <button id="sendmsg" type="button" class="btn message-btn">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection