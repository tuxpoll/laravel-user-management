@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <div class="row" style="padding-bottom: 20px">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="pull-left">Roles</h4>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
            <br><br>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{  $role->permissions()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <a href="{{ URL::to('roles/create') }}">
        <button class="btn btn-success btn-custom waves-effect w-md waves-light m-b-5 pull-left"> <i class="fa fa-plus"> </i> Add Role</button>
    </a>


</div>

@endsection