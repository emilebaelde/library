@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
    {!! Form::model($user,['method' => 'PATCH', 'action' =>[ 'AdminUsersController@update', $user->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', 'Last Name:') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nin', 'National Insurrance Number:') !!}
        {!! Form::text('nin', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [' '=>'Choose Option'] + $roles,null, ['class' => 'form-control']) !!}
    </div>
    <h2>Address</h2>
    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street', $address->street, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', $address->city, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number', 'Number:') !!}
        {!! Form::text('number', $address->number, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bus_number', 'Bus number:') !!}
        {!! Form::text('bus_number',$address->bus_number, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postal_code', 'Postal Code:') !!}
        {!! Form::text('postal_code',$address->postal_code, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Country:') !!}
        {!! Form::text('country', $address->country, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
    </div>
        {!! Form::close() !!}
    </div>



</div>

    @include('includes.form_error')
@stop
