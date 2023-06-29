@extends('includes.base')

@section('title', 'Usuários')

@section('content')
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
    </tr>

    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ ($user->email) }}</td>
        <td>{{ $user->password }}</td>
    </tr>
    @endforeach

</table>
<a href="{{ route('usuarios.add') }}">Adicionar usuarios</a>
@endsection
