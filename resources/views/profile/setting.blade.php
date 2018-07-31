@extends('layouts.settings') 

@section('content')
    <div class="main-container">
        <div class="main-profile">
            @include('profile.partials.icons')
            <!-- AVATAR AND NAME -->
            <div class="sidebar-list">      
                <div class="bordered">
                    <div class="profile-userpic">
                        <img src="/img/{{$user->profile->photo}}" class="photo" alt="avatar"> 
                    </div>
                    <h3 class="username">{{ $user->name }}</h3>
                    <hr>
                    <ul class="self-info">
                        <li>Email: {{ $user->email }}</li>
                        <li>Phone: {{ $user->profile->phone }}</li>
                        <li>Birthday: {{ $user->profile->birthday }}</li>
                        <li>Age: {{ $user->profile->age }}</li>
                        <li>Gender: {{ $user->profile->gender }}</li>
                    </ul>
                </div>
            </div>
            <!-- MAIN CONTENT -->
            <div class="content-box">
                <div class="table-info">      
                    <h3>Update info</h3>
                    <div class="portlet-body">
                        <div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-panel active" id="home">
                                    <form method="post" enctype="multipart/form-data" action="{{ route('users.store', $user) }}">
                                    {{ method_field('patch') }}
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ $user->name }}" name="name">
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label for="inputLastName">Last Name</label>
                                            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}" name="email">
                                        </div>
                                    
                                        <!--<div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                        </div>-->
                                
                                        <div class="form-group">
                                            <label for="inputPhone">Phone</label>
                                            <input type="text" class="form-control" id="inputPhone" placeholder="Phone" value="{{ $user->profile->phone }}" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputBirthday">Birthday</label>
                                            <input type="date" class="form-control" id="inputBirthday" placeholder="Birthday" value="{{ $user->profile->birthday }}" name="birthday">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAge">Age</label>
                                            <input type="number" class="form-control" id="inputAge" placeholder="Full age" name="age" value="{{ $user->profile->age }}">
                                        </div> <br>
                                        <div class="custom-control custom-checkbox">
                                            <label for="inputGender">Gender</label> <br>
                                            <input type="radio" class="custom-control-input" id="inputGender" name="gender" value="male" checked>
                                            <label class="custom-control-label" for="inputGender">Male</label> <br>
                                            <input type="radio" class="custom-control-input" id="inputGender" name="gender" value="female">
                                            <label class="custom-control-label" for="inputGender">Female</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFile">Upload photo</label>
                                            <input type="file" id="inputFile" class="form-control" name="photo">
                                        </div>
                                        <br>
                                        <button type="submit" class="bttn">UPDATE</button>
                                    {{ csrf_field() }}
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
@endsection
