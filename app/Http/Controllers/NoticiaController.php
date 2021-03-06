<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticiaController extends Controller
{
    // LÓGICA DAS ROTAS
    public function __construct()
    {   
        $this->middleware("auth:sanctum", ["except" => ["index", "show"]]);
    }
    
    // PEGAR TODAS AS NOTICIAS E MANDAR-LAS PRO INICIO
    public function index()
    {
        $noticia = Noticias::all();

        if($noticia)
        {
            return response()->json([
                "success" => true,
                $noticia
            ]);
        }

        return response()->json([
            "success" => false,
            "error" => "Não Autorizado"
        ], 401);
    }

    // CADASTRAR NOTICIA NA ÁREA DE EDITOR
    public function store(Request $request)
    {
        $val = Validator::make($request->all(), [
            "titulo" => ["required", "string"],
            "link_imagem" => ["required", "url"],
            "conteudo_total" => ["required", "string"]
        ]);

        if($val->fails())
        {
            $msg = $val->getMessageBag()->first();

            return response()->json([
                "success" => false,
                "error" => $msg
            ]);
        }
        else
        {
            $noticia = Noticias::create($request->all());
            if($noticia)
            {
                return response()->json(["success" => true]);
            }
        }

        return response()->json([
            "error" => "Não Autorizado"
        ], 401);
    }

    // MOSTRA TODOS OS DETALHES DA NOTICIA
    public function show($id)
    {
        $noticia = Noticias::findOrFail($id);

        if($noticia)
        {
            return response()->json([
                "success" => true,
                $noticia
                ]   
            );
        }

        return response()->json([
            "error" => "Não Autorizado"
        ], 401);
    }

    // ATUALIZAR AS INFORMAÇÕES DA NOTICIA
    public function update(Request $request, $id)
    {
        $noticia = Noticias::findOrFail($id);
        $noticia->update($request->all());

        if($noticia)
        {
            return response()->json($noticia);
        }

        return response()->json([
            "error" => "Não Autorizado"
        ], 401);
    }

    // APAGAR UMA NOTICIA
    public function destroy($id)
    {
         $noticia = Noticias::findOrFail($id);
         $noticia->delete();

         if($noticia)
         {
            return response()->json($noticia);
         }

         return response()->json([
            "error" => "Não Autorizado"
         ], 401);
    }
}
