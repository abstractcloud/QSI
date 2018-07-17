@extends('layouts.profile')

@section('content')
    <div class="main-container">
        <div class="main-profile">
            <div class="sidebar-icons">
                <ul>
                    <li><i class="fas fa-user"></i></li>
                    <li><i class="fas fa-users"></i></li>
                    <li><i class="fas fa-camera-retro"></i></li>
                    <li><i class="fas fa-play"></i></li>
                    
                </ul>
            </div>
            <div class="sidebar-list">
            
                <div class="sidebar-content">
                   
                </div>
               

            </div>

            <div class="content-box">
                <div class="message-list friend"></div>

                <div class="message-list self"></div>
                <div class="message-list">

                </div>
                <form method="post" class="">
                    <div class="form-group message-input-wrap">
                        <input id="msg" data-user="{{ Auth::user()->name }}" class="message-box qsi-input form-control" />
                        <button id="sendmsg" type="button" class="btn message-btn">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection