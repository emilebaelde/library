<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/rentals') }}">My Rentals</a>
                        @if (Auth::user()->isAdmin())
                            <a href="{{ url('/admin') }}">Admin dashboard</a>
                            @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            @include('includes.search',['url'=>''])

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
                        <th scope="col">Barcode</th>
                        <th scope="col">Available</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($stocks)

                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{$stock->id}}</td>
                                <td>{{$stock->title}}</td>
                                <td> {{$stock->name}}</td>
                                <td>{{$stock->isbn}}</td>
                                <td>{{$stock->year}}</td>
                                <td>{{$stock->edition}}</td>
                                <td>{{$stock->description}}</td>
                                <td>{{$stock->photo_id}}</td>
                                <td>{{$stock->barcode}}</td>
                                <td>{{$stock->available}}</td>

                                @auth

                                    <td>
                                        @if ($stock->available == 1)
                                            <input type="hidden" name="available" value="0">
                                            {!! Form::open(['method'=>'PATCH', 'action'=>['FrontendController@update', $stock->id]]) !!}
                                            {!! Form::submit('Rent',['class'=>'btn btn-primary btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @else
                                            <input type="hidden" name="available" value="1">
                                            {!! Form::open(['method'=>'PATCH', 'action'=>['FrontendController@update', $stock->id]]) !!}
                                            {!! Form::submit('Bring Back',['class'=>'btn btn-info btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    @endauth



                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
                <div class="col-12 text-center">
                    {{$stocks->render()}}
                </div>
            </div>
        </div>
    </body>
</html>
