@extends('layouts.dashboard')

@section('content')

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Roles <small><a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-info float-right">Back to roles</a></small> </h2>
                @include('partials.alerts')
                <p class="card-description"> Add, edit & delete  <code>Roles</code> that you want to use with<code> users</code> </p>
                <form method="post" action="{{route('admin.roles.update', $role->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name">Role name</label>
                        <input type="text" class="form-control" name="name" value="{{$role->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>


@endsection
