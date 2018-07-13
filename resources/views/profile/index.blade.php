@extends('layouts.profile')

@section('content')
    <div class="main-container">
        <div class="main-profile">
            <div class="sidebar-icons">

            </div>
            <div class="sidebar-list">

            </div>

                <div class="content-box">
                    <div class="message-list friend">

                    </div>
                    <div class="message-list self">

                    </div>
                </div>
                <form method="post" class="message-input-wrap">
                    <div class="form-group">
                        <textarea id="msg" class="message-box qsi-input form-control"></textarea>
                        <button id="sendmsg" type="button" class="btn message-btn">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection