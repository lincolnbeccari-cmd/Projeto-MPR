<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(Request $request){
        return view('Usuario');
    }

    public function salvar_usuario(Request $request){
       
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string',
            'tipo' => 'required|string|in:admin,usuario',

        ]);

        try {

            $usuario = new Usuario();
            $usuario->nome = $request->get('nome');
            $usuario->email = $request->get('email');
            $usuario->senha = Hash::make($request->get('senha'));
            $usuario->tipo =$request->tipo;

            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso!', 'erro'=> 'n'], 200);



        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar usuário: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }

    }

    public function ver_usuario(Request $request){
        $usuarios = Usuario::find($request->id);
        if($usuarios){
            return response()->json(['usuario' => $usuarios, 'erro'=> 'n'], 200);
        }else{
            return response()->json(['message' => 'Usuário não encontrado.', 'erro'=> 's'], 200); 
        }
    
    }

    public function listar_usuarios(Request $request){
        $usuarios = Usuario::all();
        return response()->json(['usuarios' => $usuarios], 200);
    }



    public function alterar_usuario(Request $request){
       
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string',
            'tipo' => 'required|string|in:admin,usuario',

        ]);

        try {

            $usuario = Usuario::find($request->id);
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = Hash::make($request->senha);
            $usuario->tipo =$request->tipo;

            $usuario->save();

            return response()->json(['message' => 'Usuário atualizado com sucesso!', 'erro'=> 'n'], 200);



        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar usuário: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }

    }


    public function deletar_usuario(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:usuarios,id',
        ]);
         
        try{
            $usuario = Usuario::find($request->id);
            $usuario->delete();
            return response()->json(['message' => 'Usuário deletado com sucesso!', 'erro'=> 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar usuário!', 'erro' =>'s', 'msg_erro' => $th->getMessage()], 200);
        }
        
    }
}