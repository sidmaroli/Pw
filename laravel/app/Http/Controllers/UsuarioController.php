<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('usuario.index', [
            'users' => $usuarios,
        ]);
    }

    public function add(){
        return view('usuario.add');

    }

    public function addSave(Request $form) {
        $dados = $form->validate([
            'name' => 'required|unique:usuario|min:2',
            'email' => 'required|unique:usuario|min:2',
            'password' => 'required|integer|min:5',
        ]);

        Usuario::create($dados);

        return redirect()->route('usuarios');
    }
}
