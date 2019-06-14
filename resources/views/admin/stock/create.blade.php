@extends('layouts.admin')
@section('content')
    <h1>Create Comic</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminStockController@store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('book_id', 'Book:') !!}
        {!! Form::select('book_id', [' '=>'Choose Option'] + $books,null, ['class' => 'form-control'],  ['required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create barcodes', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
