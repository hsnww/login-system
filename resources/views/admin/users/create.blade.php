@extends('layouts.dashboard')
@section('content')


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create user</h4>
            <p class="card-description"> Create new user </p>
            <form method="post" action="{{route('admin.users.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error ('name') is-invalid @enderror " id="name"  name="name" id="name" placeholder="Name" value="{{old('name')}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control @error ('email') is-invalid @enderror " name="email"  id="email" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error ('password') is-invalid @enderror " name="password"  id="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror " name="password_confirmation"  id="password" placeholder="Confirm password">
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
                            <input type="checkbox" name="roles[]" class="form-check-input"  value="{{$role->id}}" id="{{$role->name}}">
                            {{$role->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>

    @endsection
