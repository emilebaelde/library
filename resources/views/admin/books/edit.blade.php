@extends('layouts.admin')
@section('content')
    <h1>Edit Book</h1>
    <div class="col-md-3">
        <img class="img-responsive" src="{{$book->photo ? asset($book->photo->file) : 'http://place-hold.it/400x400'}}"
             alt="">
    </div>
    {!! Form::model($book,['method' => 'PATCH', 'action' =>[ 'AdminBooksController@update', $book->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('author_id', 'Author:') !!}
        {!! Form::select('author_id', [''=>'Choose options'] + $authors,null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('isbn', 'ISBN:') !!}
        {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('year', 'Year:') !!}
        {!! Form::text('year', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('edition', 'Edition:') !!}
        {!! Form::select('edition',['1st'=>'1st','2nd'=>'2nd', '3rd'=>'3rd','4th'=>'4th','5th'=>'5th'] , null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description',null, ['class' => 'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Book', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')
@stop
