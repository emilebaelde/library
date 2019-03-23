@extends('layouts.admin')
@section('content')
    <h1>All Rentals</h1>
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
            @if($rentals)
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{$rental->id}}</td>
                        <td>{{$rental->user->first_name. ' '. $rental->user->last_name}}</td>
                        <td>{{$rental->stock->book->title}}</td>
                        <td>{{$rental->rental_start}}</td>
                        <td>{{$rental->rental_end}}</td>
                        <td>{{$rental->rental_back}}</td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$rentals->links()}}
        </div>
    </div>
@stop
