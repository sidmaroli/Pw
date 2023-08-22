<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ApiProdutosController extends Controller
{
    public function list(){
        $dados = Produto::paginate();

        return response()->json($dados, 200);
    }
}
