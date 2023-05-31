@extends('includes.base')

@section('title', 'Produtos adicionar')

@section('content')
    <h2>Adicionar produtos</h2>

    <form action="{{ route('produtos.addSave') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do produto">
        <br>
        <input type="number" name="price" step="0.01" placeholder="preço" min="0">
        <br>
        <input type="text" name="quantity" placeholder="Quantidade" min="0">
        <hr width="30%" align="left">
        <input type="submit" value="Gravar">
    </form>
@endsection
