<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=archivo-black:400" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
        {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
    </head>
    <body class="antialiased">
        <div class="toptitle">
            <div class="toptitle-box">
                    <p class="toptitle-text">To Buy List</p>
                @if (Route::has('login'))
                    <div class="top-login">
                            @auth
                                <a href="{{ url('/home') }}" class="top-login-text">・Home</a><br>
                                @else
                                <a href="{{ route('login') }}" class="top-login-text">・Log in</a><br>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="top-login-text">・Register</a><br>
                                @endif
                            @endauth
                    </div>
                @endif
            </div> 
            <img src="{{ asset('/img/food-cart.png') }}" alt="買い物かご" class="shopping-cart">
        </div>
        <div class="wave-ground">
            <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#CE9461" fill-opacity="1" d="M0,96L120,85.3C240,75,480,53,720,53.3C960,53,1200,75,1320,85.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
        </div>
    </body>
</html>
