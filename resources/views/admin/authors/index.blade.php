@extends('layouts.admin')
@section('content')
    <h1>All Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Number of books</th>
            <th scope="col">Buttons</th>

        </tr>
        </thead>
        <tbody>
        @if($authors)
            @foreach($authors as $author)
                <tr>
                    <?php

                    $number_of_books=$books->where('author_id','=',$author->id)->count(); ?>
                    <td>{{$author->id}}</td>
                        <td><a href="{{route('authors.edit', $author->id)}}">{{$author->name}}</a></td>
                    <td>{{$number_of_books}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminAuthorsController@destroy', $author->id]]) !!}
                        {!! Form::submit('delete',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$authors->links()}}
        </div>
    </div>
@stop
