<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HourLogger</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/wow.css') }}">
        <link rel="icon" href="{{ asset('storage/logo.png') }}">
        <script src="{{ asset('js/script.js') }}" defer></script>

        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(90deg, rgba(85,91,87,1) 0%, rgba(0,0,0,1) 50%, rgba(85,91,87,1) 100%);
                font-family: 'Nunito', sans-serif;
                color:white;
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

            a {
                color:white;
                padding: 0 25px;
                font-size: 26px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .text-white{
                color:white;
            }
            .item{
                display:inline-block;
                margin-bottom:0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class=" wow fadeInUp title m-b-md" data-wow-delay="0,1s">
                    <h2 class="text-white">HourLogger</h2>
                </div>
                @if (Route::has('login'))
                    <div class="title links text-white">
                        @auth
                            <div class=" wow fadeInLeft" data-wow-delay="0.5s">
                            <a href="{{ url('/home') }}">Home</a>
                            </div>
                        @else
                            <div class="wow fadeInLeft item" data-wow-delay="0.5s">
                            <a href="{{ route('login') }}">Login</a>
                            </div>
                            <div class="wow fadeInRight item" data-wow-delay="0.5s">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                            @endif

                        @endauth
                    </div>
                @endif
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>
