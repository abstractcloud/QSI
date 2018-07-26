@extends('layouts.profile')

@section('content')
   
    <div class="main-container">
        <div class="main-profile">
            @include('profile.partials.icons')
            <div class="sidebar-list">
                <div class="sidebar-content">
                    <h3 class="text-center"> {{ $user }} Gallery</h3>
                    <div class="gallery-sidebar-box ">

                       @if($auth)
                            <div class="folder-box">
                            <i data-toggle="modal" data-target="#modalFolderCreate" class="fas fa-plus"></i>
                            <p class="text-center">Add folder</p>
                            </div>
                        @endif

                        @if (!empty($galleries))
                            @foreach ($galleries as $g)
                                <div class="folder-box">
                                    <a class="folder" href="{{route ('gallery.show',$g->id )}}"><i class="far fa-images"></i></a>
                                    <p class="text-center">{{$g->name}}</p>
                                </div>
                            @endforeach
                        @endif
                     </div>
                </div>
            </div>

            <div class="content-box">
                 @if(!empty($gallery))
                    <h2 class="text-center">{{$gallery->name}} 
                       @if($auth)
                            <i  title="Edit folder" data-toggle="modal" data-target="#editFolder" class="far fa-edit"></i>
                            <i data-toggle="modal" data-target="#deleteFolder" title="Delete folder" class="far fa-trash-alt"></i>
                        @endif
                    </h2>
                 @endif
                    <div class="gallery-photos-box">
                          @if(!empty($gallery))
                             @if($auth)
                                  <div class="add-element photo-box">
                                      <i data-toggle="modal" data-target="#modalPhotoAdd" class="fas fa-plus"></i>
                                      <p class="text-center">Add new photo</p>
                                  </div>
                              @endif
                          @endif
              
                          @if(!empty($photos))
                              @foreach ($photos as $photo)
                                  <div class="photo-box">
                                      @if($auth)
                                       <div class="delete-box">
                                            <button data-toggle="modal" data-target="#deletePhoto" class="delete-btn close" data-id="{{$photo->id}}">×</button>
                                            <form data-id="{{$photo->id}}" method="post" class="delete-form" action="{{route('photos.destroy',$photo->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            </form>
                                        </div>
                                       @endif
                                        <a  href="/uploads/photos/img/{{$photo->img}}"><img class="photo" src="/uploads/photos/preview/{{$photo->img}}" alt=""></a>
                                        <p class="text-center"> {{$photo->title}}</p>
                                  </div>
                              @endforeach
                         @endif
               
                  </div>
             </div>
        </div>
    </div>
@if($auth)   
      @if(!empty($gallery))      
        <!-- Modal add new photo -->
        <div id="modalPhotoAdd" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content form-box">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header">
                        <button type="button" class="close close-form" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title signin-title">Add photo</h4>
                    </div>
                    <!-- Основное содержимое модального окна -->

                    <div class="modal-body signin">
                        <form  method="POST" action="{{route ('photos.store')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control qsi-input" type="text" name="title" placeholder="Photo title">
                                @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control qsi-input" type="file" name="img" placeholder="Photo">
                                @if ($errors->has('img'))
                                <span class="help-block"><strong>{{ $errors->first('img') }}</strong></span>
                                @endif
                            </div>
                             <input hidden type="text" name="gallery_id" value="{{$gallery->id}}">
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-block signin-btn"> Save</button>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal End -->
        
           <!-- Modal Edit Folder-->
        <div id="editFolder" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content form-box">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header">
                        <button type="button" class="close close-form" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title signin-title">Edit Folder</h4>
                    </div>
                    <!-- Основное содержимое модального окна -->
                    <div class="modal-body signin">
                      <form method="POST" action="{{route ('gallery.update',$gallery->id)}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control qsi-input" type="text" name="name" value="{{$gallery->name}}" placeholder="Enter folder name">
                                @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                              {{ method_field('PATCH') }}

                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-block signin-btn">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit Folder End-->

           <!-- Modal Delete Folder-->
        <div id="deleteFolder" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content form-box">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header">
                        <button type="button" class="close close-form" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title signin-title">Delete Folder</h4>
                    </div>
                    <!-- Основное содержимое модального окна -->
                    <div class="modal-body signin">
                        <form method="post" class="delete-form" action="{{route('gallery.destroy',$gallery->id)}}">
                           <p class="text-center">Delete folder "{{ $gallery->name}}" with all the photos ({{$count}}) ?</p>
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <div class="btn-block">
                                 <button type="submit" class="btn btn-block signin-btn del-btn">Yes</button>
                                 <button data-dismiss="modal" class="btn  btn-block signin-btn del-btn">No</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete Folder End -->
          <!-- Modal Delete Photo-->
    <div id="deletePhoto" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content form-box">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close close-form" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title signin-title">Delete Photo</h4>
                </div>
                <!-- Основное содержимое модального окна -->
                <div class="modal-body signin">
                       <p class="text-center">Delete this Photo?</p>
                       
                        <div class="btn-block">
                             <button id="delete-photo-submit" class="btn btn-block signin-btn del-btn">Yes</button>
                             <button data-dismiss="modal" class="btn  btn-block signin-btn del-btn">No</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete Folder End -->
    
    @endif
    
    <!-- Modal create new Folder -->
        <div id="modalFolderCreate" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content form-box">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header">
                        <button type="button" class="close close-form" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title signin-title">Create new folder</h4>
                    </div>
                    <!-- Основное содержимое модального окна -->
                    <div class="modal-body signin">
                        <form  method="POST" action="{{route ('gallery.store')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control qsi-input" type="text" name="name" placeholder="Enter folder name">
                                @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-block signin-btn"> Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Modal create new Folder End -->
@endif
   
@endsection