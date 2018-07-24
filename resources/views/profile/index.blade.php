@extends('layouts.profile') 

@section('content')
    <div class="main-container">
        <div class="main-profile">
            @include('profile.partials.icons')
            <div class="sidebar-list">

                <div class="sidebar-content">
                    <!--friends-->
                    <div class="friends">
                        <form method="GET" class="search-block-form">
                            <i class="fas fa-search"></i>
                            <div class="form-item">
                                <input type="text" name="name" maxlength="128" placeholder="Search...">
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Поиск" class="form-submit">
                            </div>
                        </form>
                     
                        <div class="friends-content">
                            @foreach($friends as $f)
                            <div class="card text-white mb-3 friend-card">
                               <div class="card-header">  
                                   <img src="img/1.png" class="rounded-circle friend-photo">
                                    <h4 class="card-title friend-name">
                                        {{ $f->name }}
                                    </h4>
                                    <div class="btn-action__wrapp">
                                        <a href="#" class="friend-name"> <i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                   
                                    {{-- <a class="button-friend button-add" href="#" role="button">WRITE</a>
                                    <a class="button-friend button-delete" href="#" role="button">DELETE</a> --}}
    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box">
                <div id="chat" class="message-list">
                    <div class="friend"></div>  
                    <div class="self"></div>
                </div>
                <form method="post" class="">
                    <div class="form-group message-input-wrap">
                        <input id="msg" data-user="{{ Auth::user()->name }}" class="message-box qsi-input form-control" />
                        <button id="sendmsg" type="button" class="btn message-btn">SEND</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
