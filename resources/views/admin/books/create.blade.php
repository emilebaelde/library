@extends('layouts.admin')
@section('content')
    <h1>Create Book</h1>
{!! Form::open(['method' => 'POST', 'action' => 'AdminBooksController@store', 'files'=>true]) !!}
   <div class="row">
    <div class="col-md-6">
       <div class="form-group">
           {!! Form::label('author_id', 'Author:') !!}
           {!! Form::select('author_id', [' '=>'Choose Option'] + $authors,null, ['class' => 'form-control']) !!}
       </div>
   </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#flipFlop">
            <i class="fas fa-plus text-white"></i>
        </button>
    </div>
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
    {!! Form::submit('Create Book', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

    <!-- The modal -->
    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Add Author</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['method' => 'POST', 'action' => 'AdminAuthorsController@storeModal', 'files'=>true]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Create Author', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @include('includes.form_error')
@stop
