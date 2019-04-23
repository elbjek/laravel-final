<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" style="padding:0px">
            <nav class="guest-nav navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="#">Logo</a>


                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    @if (Route::has('login'))
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                            @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="href="{{ route('register') }}">Register</a>
                        </li>
                            @endif
                        @endauth
                    </ul>
                    @endif
                </div>
            </nav>
            <div class="content">
                <h1>Welcome to Groomer</h1>
            </div>
        </div>
    </body>
</html>
