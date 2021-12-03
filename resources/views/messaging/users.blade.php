@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        @include('partials.alerts')
        <div class="row">
            @include('partials.dashboard._emailSidebar')

            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> <i class="fa fa-users fa-2x mr-2"></i> Contact</h4>
                        <p class="card-description"> Users in our team you can message </p>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th scope="col">User</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                            <tr>
                                <td><img src="{{asset('img/users')}}/{{$user->avatar}}" alt="" width="80"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>

                                    @foreach($user->roles as $role)
                                        {{$role->name}}
                                    @endforeach
                                </td>
                                <td><a href="{{route('user.email', $user->id)}}" alt="Send email"><i class="fa fa-envelope"></i></a> </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $users->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
