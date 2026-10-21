<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriaController extends Controller
{
    public function salvar_categoria(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        try {
            $categoria = new Categorias();
            $categoria->nome = $request->get('nome');
            $categoria->descricao = $request->get('descricao');
            $categoria->save();

            return response()->json(['message' => 'Categoria cadastrada com sucesso!', 'erro'=> 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar categoria: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }
    }

    public function ver_categoria(Request $request){
        $categoria = \App\Models\Categorias::find($request->id);
        if($categoria){
            return response()->json(['categoria' => $categoria, 'erro'=> 'n'], 200);
        }else{
            return response()->json(['message' => 'Categoria não encontrada.', 'erro'=> 's'], 200); 
        }
    }

    public function listar_categorias(Request $request){
        $categorias = \App\Models\Categorias::all();
        return response()->json(['categorias' => $categorias], 200);
    }

    public function alterar_categoria(Request $request){

        $request->validate([
            'id' => 'required|integer|exists:categorias,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        try {
            $categoria = new Categorias();
            $categoria->nome = $request->get('nome');
            $categoria->descricao = $request->get('descricao');
            $categoria->save();

            return response()->json(['message' => 'Categoria alterada com sucesso!', 'erro'=> 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar categoria: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }
    }

    public function deletar_categoria(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:categorias,id',
        ]);
         
        try{
            $categoria = Categorias::find($request->id);
            $categoria->delete();
            return response()->json(['message' => 'Categoria deletada com sucesso!', 'erro'=> 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar categoria!', 'erro' =>'s', 'msg_erro' => $th->getMessage()], 200);
        }
        
    }
}
