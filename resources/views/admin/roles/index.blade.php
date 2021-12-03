@extends('layouts.dashboard')

@section('content')

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Roles <small><a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-info float-right">Create new role</a></small> </h2>
                @include('partials.alerts')
                <p class="card-description"> Add, edit & delete  <code>Roles</code> that you want to use with<code> users</code> </p>
                <ul class="list-group list-group-flush">
                    @foreach($roles as $role)
                        <li class="list-group-item">{{$role->name}}
                            <a href="{{route('admin.roles.edit', $role->id)}}" class="btn btn-sm btn-primary float-right ml-1">edit</a>
                            <form method="post" action="{{route('admin.roles.destroy', $role->id)}}" class="float-right">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-sm btn-danger" Onclick="return ConfirmDelete()">Delete</button>
                            </form>
                            <script>
                                function ConfirmDelete() {
                                    return confirm("Are you sure you want to delete?");
                                }
                            </script>
{{--                            <a href="" class="btn btn-sm btn-danger float-right">delete</a>--}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
