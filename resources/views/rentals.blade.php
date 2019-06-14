@extends('layouts.layout')
@section('content')
    <div class="content">

        <h1>All Rentals</h1>
        <a href="rentals/history">Full History</a>

        @if(!$rentals->isEmpty())
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Book</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Back</th>

                </tr>
                </thead>
                <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{$rental->id}}</td>
                        <td>{{$rental->user->first_name. ' '. $rental->user->last_name}}</td>
                        <td>{{$rental->stock->book->title}}</td>
                        <td>{{$rental->rental_start}}</td>
                        <td>{{$rental->rental_end}}</td>
                        <td>{{$rental->rental_back}}</td>
                        <td>
                            @if ($rental->stock->available == 0)
                                <input type="hidden" name="available" value="1">
                                {!! Form::open(['method'=>'PATCH', 'action'=>['FrontendController@returnBook', $rental->stock->id]]) !!}
                                {!! Form::submit('Bring Back',['class'=>'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach


                <td><a href="{{action('FrontendController@downloadPDF')}}">PDF</a></td>
                </tbody>
            </table>
        @endif
        @if ($rentals->isEmpty())
            <h2>You didnt rent any books</h2>
        @endif
        <div class="row">
            <div class="col-12">
                {{$rentals->links()}}
            </div>
        </div>
@stop
