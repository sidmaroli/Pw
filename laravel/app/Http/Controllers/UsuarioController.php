<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|unique:usuarios|min:2',
            'email' => 'required|unique:usuarios|min:2',
            'password' => 'string|required',
        ]);

        $dados['password'] = Hash::make($dados['password']);

        Usuario::create($dados);

        return redirect()->route('usuarios');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if(Auth::attempt($data)){
                return redirect()->route('home');
            }else{
                return redirect()->route('login')->with('erro', 'Deu ruim!');
            }
        }
        return view('usuario.login');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('home');
    }
}
