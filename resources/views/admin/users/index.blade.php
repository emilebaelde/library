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
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('users.edit', $user->id)}}">{{$user->first_name . ' '. $user->last_name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->nin}}</td>
                        <td>{{$user->role_id ? $user->role->name : 'User without role'}}</td>
                        <td>{{$user->address_id ? $user->address->street . ' ' .$user->address->number . ' '. $user->address->postal_code . ' ' .$user->address->city .' '.$user->address->country : 'User without Address'}}</td>

                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$users->links()}}
        </div>
    </div>
@stop
