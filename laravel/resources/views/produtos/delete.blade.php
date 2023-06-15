@extends('includes.base')

@section('title', 'Produtos')

@section('content')
<h2>Apagar produtos</h2>
<p>Você Está prestes a apagar {{ $prod->name }}.</p>
<p>Tem certeza de que quer fazer isso</p>

<form action="{{ route('produtos.deleteForReal', $prod->id)}}" method="post">

    @csrf
    @method('delete')

    <input type="submit" value="Pó apagá!">
</form>
@endsection
