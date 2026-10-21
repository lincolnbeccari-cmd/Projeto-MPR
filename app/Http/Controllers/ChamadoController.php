<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;

class ChamadoController extends Controller
{


    public function salvar_chamado(Request $request){
       
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'status' => 'required|string|in:aberto,em_andamento,cancelado,cerrado',
            'usuario_id' => 'required|exists:usuarios,id',
            'categoria_id' => 'required|exists:categorias,id',

        ]);

        try {

            $chamado = new Chamado();
            $chamado->titulo = $request->get('titulo');
            $chamado->descricao = $request->get('descricao');
            $chamado->usuario_id = $request->get('usuario_id');
            $chamado->status = $request->get('status');
            $chamado->categoria_id = $request->get('categoria_id'); 
            $chamado->save();

            return response()->json(['message' => 'Chamado cadastrado com sucesso!', 'erro'=> 'n'], 200);



        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar chamado: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }

    }

    public function ver_chamado(Request $request){
        $chamados = Chamado::find($request->id);
        if($chamados){
            return response()->json(['chamado' => $chamados, 'erro'=> 'n'], 200);
        }else{
            return response()->json(['message' => 'Chamado não encontrado.', 'erro'=> 's'], 200); 
        }
    
    }

    public function listar_chamados(Request $request){
        $chamados = Chamado::all();
        return response()->json(['chamados' => $chamados], 200);
    }



    public function alterar_chamado(Request $request){
       
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'status' => 'required|string|in:aberto,em_andamento,cancelado,cerrado',
            'usuario_id' => 'required|exists:usuarios,id',
            'categoria_id' => 'required|exists:categorias,id'

        ]);

        try {

            $chamado = Chamado::find($request->id);
            $chamado->titulo = $request->titulo;
            $chamado->descricao = $request->descricao;
            $chamado->status = $request->status;
            $chamado->usuario_id = $request->usuario_id;
            $chamado->categoria_id = $request->categoria_id;

            $chamado->save();

            return response()->json(['message' => 'Chamado atualizado com sucesso!', 'erro'=> 'n'], 200);



        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar chamado: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }

    }

    public function deletar_chamado(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:chamados,id',
        ]);
         
        try{
            $chamado = Chamado::find($request->id);
            $chamado->delete();
            return response()->json(['message' => 'Chamado deletado com sucesso!', 'erro'=> 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar chamado!', 'erro' =>'s', 'msg_erro' => $th->getMessage()], 200);
        }
        
    }
}
