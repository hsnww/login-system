@extends('layouts.dashboard')
@section('content')


    <div class="card">
        <div class="card-body">
            <img src="{{asset('img/users')}}/{{$user->avatar}}" alt="{{$user->name}}" width="100">

            <h4 class="card-title">Edit user: {{$user->name}}</h4>
            <form method="post" action="{{route('admin.users.update', $user->id)}}">
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error ('name') is-invalid @enderror " id="name"  name="name" id="name" value="{{$user->name}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control @error ('email') is-invalid @enderror " name="email"  id="email" value="{{$user->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control @error ('password') is-invalid @enderror " name="password"  id="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    @foreach($roles as $role)
                        <div class="form-check form-check-flat">
                            <label class="form-check-label" for="{{$role->name}}">
                                <input  class="form-check-input" name="roles[]" type="checkbox" value="{{$role->id}}" id="{{$role->name}}"
                            @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>

                            {{$role->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>

            </form>
        </div>
    </div>

    @endsection
