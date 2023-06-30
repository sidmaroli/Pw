<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div>

        <h1>Login!!!!!!</h1>

        @if (session('erro'))
            <div>{{ session('erro')}}</div>
        @endif

        <form action="{{ url()->current()}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Senha">
            <br><br>
            <input type="submit" value="login">
        </form>

    </div>
</body>
</html>
