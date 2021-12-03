@extends('layouts.dashboard')
@section('content')
    <div class=" align-items-center auth theme-one">
        <div class="row w-100">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-center mb-4">Profile update</h2>
                <div class="auto-form-wrapper">
                    <form action="{{route('user.profile.update', Auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="center"><img src="{{asset('img/users/')}}/{{Auth()->user()->avatar}}" width="100" alt="" class="img img-thumbnail"></div>


                                <hr>
                                <input type="file" name="avatar" class="form-control-file @error('avatar') is-invalid @enderror">
                            @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('avatar') }}</strong>
              </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{Auth()->user()->name}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                                </div>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" value="{{Auth()->user()->email}}">
                                <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary submit-btn btn-block">Update profile</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
