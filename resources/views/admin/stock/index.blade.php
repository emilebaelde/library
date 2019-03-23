@extends('layouts.admin')
@section('content')
    <h1>Stock</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Barcode</th>
            <th scope="col">available</th>
            <th scope="col">Buttons</th>

        </tr>
        </thead>
        <tbody>
        @if($stocks)
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->book->title}}</td>
                    <td><a href="{{route('stock.edit', $stock->id)}}">{{$stock->barcode}}</a></td>
                    <td>{{$stock->available == true ?'Available' : 'Not Available' }}</td>
                    <td>
                        @if ($stock->available == 1)
                            <input type="hidden" name="available" value="0">
                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminStockController@update', $stock->id]]) !!}
                            {!! Form::submit('Rent',['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::close() !!}
                        @else
                            <input type="hidden" name="available" value="1">
                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminStockController@update', $stock->id]]) !!}
                            {!! Form::submit('Bring Back',['class'=>'btn btn-info btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminStockController@destroy', $stock->id]]) !!}
                        <input type="hidden" name="available" value="0">
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
            {{$stocks->links()}}
        </div>
    </div>
@stop
