@extends('layouts.profile') @section('content')
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
                <!--               friends-->
                <div class="friends">
                    <form method="get" class="search-block-form">
                        {{ csrf_field() }}
                        <i class="fas fa-search"></i>
                        <div class="form-item">
                            <input type="text" name="name" maxlength="128" placeholder="Search...">
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="op" value="Поиск" class="form-submit">
                        </div>
                    </form>
                 
                    <div class="friends-content">
                        @foreach($friends as $f)
                        <div class="card text-white mb-3 friend-card">
                           <div class="card-header">  <img src="img/1.png" class="rounded-circle friend-photo">
                                <h4 class="card-title friend-name ">{{ $f->name }}</h4></div>
                            <div class="card-body">
                               
                                <a class="button-friend button-add" href="#" role="button">WRITE</a>
                                <a class="button-friend button-delete" href="#" role="button">DELETE</a>

                            </div>
                            





                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>








        <div class="content-box">
            <div class="message-list friend"></div>

            <div class="message-list self"></div>
            <div class="message-list">

            </div>
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
