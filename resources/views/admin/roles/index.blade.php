@extends('layouts.admin')
@section('content')
    <h1>All Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">nin</th>
            <th scope="col">Role</th>
            <th scope="col">Address</th>
            <th scope="col">Active</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
            @if($roles)
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
@stop
