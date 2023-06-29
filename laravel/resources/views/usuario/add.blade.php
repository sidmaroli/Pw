@extends('includes.base')

@section('title', 'Usuário adicionar')

@section('content')
    <h2>Adicionar usuários</h2>

    <form action="{{ url()->current() }}" method="post">

        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{ old('name', $user->name ?? '') }}">
        <br>
        <input type="text" name="email" placeholder="Email" value="{{ old('email', $user->email ?? '')}}">
        <br>
        <input type="password" name="password" placeholder="Senha" value="{{ old('password', $user->password ?? '')}}">
        <hr width="30%" align="left">
        <input type="submit" value="Gravar">
    </form>
@endsection
