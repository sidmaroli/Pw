<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/style.css")}}">
</head>
<body>

    <h1>Site Lindão</h1>
    <div>
        @if (Auth::user())
            Olá {{Auth::user()->name}}.
            <br>
            <a href="{{ route('logout') }}">sair</a>
        @else
            <a href="{{ route('login') }}">Fazer login</a>
        @endif
    </div>
    <div>
        <ul>
            <li><a href="{{ route('home')}}">Home</a></li>
            <li><a href="{{ route('produtos')}}">produtos</a></li>
            <li><a href="{{ route('usuarios')}}">Usuários</a></li>
        </ul>
    </div>
    @yield('content')

</body>
</html>
