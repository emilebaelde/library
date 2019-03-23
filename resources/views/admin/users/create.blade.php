@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>
{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files'=>true]) !!}	

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
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number', 'Number:') !!}
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bus_number', 'Bus number:') !!}
        {!! Form::text('bus_number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postal_code', 'Postal Code:') !!}
        {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Country:') !!}
        {!! Form::text('country', null, ['class' => 'form-control']) !!}
    </div>
<div class="form-group">
    {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
    @include('includes.form_error')
@stop
