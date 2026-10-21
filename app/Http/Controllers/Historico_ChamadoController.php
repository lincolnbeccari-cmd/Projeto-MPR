<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Historico_Chamado;

class Historico_ChamadoController extends Controller

{
   


    public function salvar_Historico_Chamado(Request $request){
       
        $request->validate([
            'chamado_id' => 'required|string|',
            'usuario_id' => 'required|email|unique:usuarios,email',
            'status_anterior' => 'required|string',
            'status_novo' => 'required|string|',
            'observacao' => 'required|string|',

        ]);

        try {

            $historico = new Historico_Chamado();
            $historico->chamado_id = $request->get('chamado_id');
            $historico->usuario_id = $request->get('usuario_id');
            $historico->status_anterior = $request->get('status_anterior');
            $historico->status_novo = $request->get('status_novo');
            $historico->observacao = $request->get('observacao');

            $historico->save();

            return response()->json(['message' => 'Chamado salvo com sucesso!', 'erro'=> 'n'], 200);



        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao salvar chamado: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }

    }

    public function ver_historico_chamado(Request $request){
        $historicos = Historico_Chamado::find($request->id);
        if($historicos){
            return response()->json(['historico' => $historicos, 'erro'=> 'n'], 200);
        }else{
            return response()->json(['message' => 'Histórico do chamado não encontrado.', 'erro'=> 's'], 200); 
        }
    
    }

    public function listar_historicos_chamados(Request $request){
        $historicos = Historico_Chamado::all();
        return response()->json(['historicos' => $historicos], 200);
    }



    public function alterar_historico_chamado(Request $request){
       
        $request->validate([
            'chamado_id' => 'required|string',
            'usuario_id' => 'required|email|unique:usuarios,email',
            'status_anterior' => 'required|string',
            'status_novo' => 'required|string',
            'observacao' => 'required|string',
            'tipo' => 'required|string|in:admin,usuario',

        ]);

        try {

            $historico = Historico_Chamado::find($request->id);
            $historico->chamado_id = $request->chamado_id;
            $historico->usuario_id = $request->usuario_id;
            $historico->status_anterior = $request->status_anterior;
            $historico->status_novo = $request->status_novo;
            $historico->observacao = $request->observacao;

            $historico->save();

            return response()->json(['message' => 'Histórico do chamado atualizado com sucesso!', 'erro'=> 'n'], 200);



        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar histórico do chamado: ' . $th->getMessage(), 'erro'=> 's'], 200);
        }
    }

    public function deletar_historico_chamado(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:historicos_chamados,id',
        ]);
         
        try{
            $historico = Historico_Chamado::find($request->id);
            $historico->delete();
            return response()->json(['message' => 'Histórico do chamado deletado com sucesso!', 'erro'=> 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar histórico do chamado!', 'erro' =>'s', 'msg_erro' => $th->getMessage()], 200);
        }
        
    }

}

