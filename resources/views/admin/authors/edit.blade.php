@extends('layouts.admin')
@section('content')
    <h1>Create Comic</h1>
    {!! Form::model($author,['method' => 'PATCH', 'action' =>[ 'AdminAuthorsController@update', $author->id], 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Author', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
