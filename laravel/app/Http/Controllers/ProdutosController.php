<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        $prods = Produto::all();
        return view('produtos.index', [
            'prods' => $prods,
        ]);
    }

    public function add(){
        return view('produtos.add');

    }

    public function addSave(Request $form) {
        $dados = $form->validate([
            'name' => 'required|unique:produtos|min:3',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        Produto::create($dados);

        return redirect()->route('produtos');
    }

    public function view(){

    }
}