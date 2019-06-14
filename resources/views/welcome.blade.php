@extends('layouts.layout')

@section('content')
    <div class="content mb-5">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('includes.search',['url'=>''])
                    @if($stocks)
                        @foreach($stocks as $stock)

                            <div
                                class="row pb-2 w-75 bg-light rounded border-dark border d-flex align-items-center my-3 ">
                                <div class="col-4 ">
                                    <img class="responsive" width="200" height="200"
                                         src="{{isset($stock->book->photo->file) ? asset($stock->book->photo->file) : 'http://place-hold.it/150x150'}}">
                                </div>
                                <div class="col-5">
                                    <h4 class="text-center">{{$stock->title}}</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$stock->name}}</h6>
                                    <p class="text-center">
                                        {{$stock->year}}</p>
                                    <p class="text-left">
                                        {{$stock->description}}</p>

                                    @auth
                                        @if ($stock->available == 1)
                                            <input type="hidden" name="available" value="0">
                                            {!! Form::open(['method'=>'PATCH', 'action'=>['FrontendController@update', $stock->id]]) !!}
                                            {!! Form::submit('Rent',['class'=>'btn btn-primary btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    @endauth
                                </div>
                                <div class="col-3">
                                    <div
                                        class="rounded-circle ml-5 {{$stock->available == 1 ? 'bg-success' : 'bg-danger'}}"
                                        style="width: 50px; height: 50px">

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            {{$stocks->render()}}
        </div>
    </div>
@endsection
