@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users Table</h4>
                <a href="{{route('admin.users.create')}}" class="btn btn-success float-right">New User</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> User </th>
                        <th> Name </th>
                        <th> Roles </th>
                        <th> Deadline </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="py-1">
                            <img src="{{asset('img/users')}}/{{$user->avatar}}" alt="image">

                        </td>
                        <td> {{$user->name}} </td>
                        <td>

                        </td>
                        <td>   {{$user->created_at->format('M Y')}} </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary "> Edit</a>

                            <button type="button" class="btn btn-sm btn-danger"

                                    onclick="event.preventDefault();
                                        document.getElementById('delete-user-form-{{ $user->id }}').submit(); return confirm('Confirm Deleting');">
                                Delete
                            </button>
                            <form id="delete-user-form-{{ $user->id }}" method="post" action="{{ route('admin.users.destroy', $user->id) }}" >
                                @csrf
                                @method("DELETE")
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $users->links()}}
            </div>
        </div>
    </div>
    @endsection
