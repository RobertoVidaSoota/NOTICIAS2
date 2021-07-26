<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Models\Noticias;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    // LÓGICA DAS ROTAS
    public function __construct()
    {   
        $this->middleware("auth:sanctum")->except(["index"]);
    }
    
    // BUSCAR TODOS OS COMENTÁRIOS DE UMA NOTICIA
    public function index()
    {
        $comentario = Comentarios::with(["user", "noticia"])
        ->orderBy("fk_id_noticias")
        ->get();

        if($comentario)
        {
            return response()->json([
                "success" => true,
                "comentarios" => $comentario
            ]);

        }elseif(count($comentario))
        {
            return response()->json([
                "success" => false,
            ]);
        }

        return response()->json([
            "Erro" => "Não autorizado"
        ], 401);
    }

    // CADASTRAR UM COMENTÁRIO
    public function store(Request $request)
    {
        $val = Validator::make($request->all(), [
            "texto_comentario" => ["required"],
            "fk_id_noticias" => ["required", "numeric"]
        ]);

        if($val->fails())
        {
            $msg = $val->getMessageBag()->first();

            return response()->json([
                "success" => false,
                "error" => $msg
            ]);
        }else
        {
            $id_noticia = $request->fk_id_noticias;
            $pegar_noticia = Noticias::findOrFail($id_noticia);

            if(!$pegar_noticia)
            {
                return response()->json([
                    "success" => false,
                    "error" => "Notícia não encontrada."
                ]);
            }
            
            $comentario = Comentarios::create($request->all());

            if($comentario)
            {
                return response()->json(["success" => true]);
            }
        }

        return response()->json([
            "Error" => "Não Autorizado"
        ], 401);
    }

    // PEGAR O COMENTÁRIO COM MAIS DETALHES
    public function show($id)
    {
        $comentario = Comentarios::find($id);

        if($comentario)
        {
            return response()->json($comentario);
        }

        return response()->json([
            "Error" => "Não Autorizado"
        ], 401);
    }

    // EDITAR UM COMENTÁRIO
    public function update(Request $request, $id)
    {
        $comentario = Comentarios::findOrFail($id);
        $comentario->update($request->all());

        if($comentario)
        {
            return response()->json([
                "success" => "Alterado com sucesso"
            ]);
        }

        return response()->json([
            "Erro" => "Não Autorizado"
        ], 401);
    }

    // APAGAR UM COMENTÁRIO
    public function destroy($id)
    {
        $comentario = Comentarios::findOrFail($id);
        $comentario->delete();

        if($comentario)
        {
            return response()->json([
                "success" => "Excluido com sucesso"
            ]);
        }

        return response()->json([
            "Erro" => "Não Autorizado"
        ], 401);
    }
}
