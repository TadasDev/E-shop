<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <title>E-Shop</title>
</head>
<body class="container mx-auto">
<nav class="flex p-6 justify-between bg-blue-100">
    <ul class="flex items-center">
        @auth
            <li class="p-4">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
        @endauth
    </ul>
    <ul class="flex items-center">
        @auth
            <li class="p-4">
                <a href="{{route('posts')}}"> My posts</a>
            </li>
            <li class="p-4">
                <a>Hello,{{auth()->user()->name}} !!! </a>
            </li>
            <li class="p-4">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            <li class="p-4">
                <a href="{{route('profile.edit')}}">My profile</a>
            </li>
        @endauth
        @guest
            <li class="p-4">
                <a href="{{ route('register') }}">Register</a>
            </li>
            <li class="p-4">
                <a href="{{ route('login') }}">Login</a>
            </li>
        @endguest
    </ul>
</nav>
<div class="container">@yield('page')</div>
</body>
</html>

