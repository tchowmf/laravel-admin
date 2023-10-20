<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;

class CorController extends Controller
{
    public function index(){
        $dados = Cor::all()->toArray();

        return View("Cor.index",
        [
            'cores' => $dados
        ]);
    }

    public function inserir(){
        return View("Cor.formulario");
    }

    public function salvar_novo(Request $request)
    {
        $cor = new Cor;
        $cor->nome = $request->input("cor");
        $cor->situacao = $request->input("situacao");
        $cor->save();
        return redirect("/cor");
        exit;
    }

    public function excluir($id)
    {
        $cor = Cor::find($id);
        $cor->delete();
        return redirect("/cor");
    }

    public function alterar($id)
    {
        $cor = Cor::find($id)->toArray();
        return view("Cor.formulario",['cor'=>$cor]);
    }

    public function salvar_update(Request $request)
    {
        $id = $request->input("id");
        $cor = Cor::find($id);

        $cor->nome = $request->input("nome");
        $cor->situacao = $request->input("situacao");
        $cor->save();

        return redirect("/cor");
    }
}
