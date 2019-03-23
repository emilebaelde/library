@extends('layouts.admin')
@section('content')
    <h1>All stock</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">ISBN</th>
            <th scope="col">Year</th>
            <th scope="col">edition</th>
            <th scope="col">Description</th>
            <th scope="col">Cover</th>
            <th scope="col">Buttons</th>
        </tr>
        </thead>
        <tbody>
            @if($books)
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td><a href="{{route('books.edit', $book->id)}}">{{$book->title}}</a></td>
                        <td>{{$book->author_id ? $book->author->name : 'book without author'}}</td>

                        <td>{{$book->isbn}}</td>
                        <td>{{$book->year}}</td>
                        <td>{{$book->edition}}</td>
                        <td>{{$book->description}}</td>
                        <td>{{$book->photo_id}}</td>
                        <td>

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBooksController@destroy', $book->id]]) !!}
                            {!! Form::submit('delete',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    <div class="col-12 text-center">
        {{$books->render()}}
    </div>
@stop
