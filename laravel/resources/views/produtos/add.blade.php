@extends('includes.base')

@section('title', 'Produtos adicionar')

@section('content')
    <h2>Adicionar produtos</h2>

    @if ($errors)
        @foreach ($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    @endif

    <form action="{{ route('produtos.addSave') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do produto" value="{{ old('name')}}">
        <br>
        <input type="number" name="price" step="0.01" placeholder="preço" min="0" value="{{ old('price')}}">
        <br>
        <input type="text" name="quantity" placeholder="Quantidade" min="0" value="{{ old('quantify')}}">
        <hr width="30%" align="left">
        <input type="submit" value="Gravar">
    </form>
@endsection
