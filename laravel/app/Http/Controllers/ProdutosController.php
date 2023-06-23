<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdutosController extends Controller
{
    public function index(Request $request){
        if ($request->isMethod('POST')) {
            $busca = $request->busca;
            // Ordenação dos resultados (asc e desc)
            $ord = $request->ord == 'asc' ? 'asc' : 'desc';

            $prods = Produto::where('name', 'LIKE', "%{$busca}%")
                ->orderBy('name', $ord)
                ->paginate();
        } else {
            $prods = Produto::paginate();
        }

        #$prods = Produto::withTrashed()->get();
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

        return redirect()->route('produtos')->with('sucesso', 'Produtos inserido com sucesso');
    }

    public function edit(Produto $produto){
        return view('produtos.add', [
            'prod' => $produto,
        ]);
    }

    public function view(Produto $produto){
        return view('produtos.view', [
            'prod' => $produto,
        ]);
    }


    public function editSave(Request $form, Produto $produto){
        $dados = $form->validate([
            'name' => [
                'required',
                Rule::unique('produtos')->ignore($produto->id),
                'min:3',
            ],
            'price' => 'required|numeric|gte:0',
            'quantity' => 'required|integer|gte:0',
        ]);

        $produto->fill($dados)->save();

        return redirect()->route('produtos')->with('sucesso', 'Produto alterado com sucesso');

    }


    public function delete(Produto $produto){
        return view('produtos.delete', [
            'prod' => $produto,
        ]);
    }


    public function deleteForReal(Produto $produto){
        $produto->delete();
        return redirect()->route('produtos')->with('sucesso', 'Produtos apagado com sucesso!');
    }
}
