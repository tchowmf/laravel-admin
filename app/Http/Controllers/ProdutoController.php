<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Cor;

class ProdutoController extends Controller
{
    public function index()
    {
        //$produtos = Produto::all()->toArray();

        /*$sql = "SELECT
                    P.id,
                    P.nome,
                    P.preco,
                    C.nome nome_categoria,
                    P.quantidade,
                FROM produto P
                INNER JOIN categoria C
                    ON C.id = P.id_categoria";*/
        $produto = Produto::select("produto.id",
                                    "produto.nome",
                                    "produto.quantidade",
                                    "produto.preco",
                                    "produto.descricao",
                                    "categoria.nome AS cat",
                                    "marca.nome as marc",
                                    "cor.nome as cor")
                                    ->join("cor",
                                    "cor.id",
                                    "=",
                                    "produto.id_cor")
                                    ->join("marca",
                                    "marca.id",
                                    "=",
                                    "produto.id_marca")
                                    ->join("categoria",
                                    "categoria.id",
                                    "=",
                                    "produto.id_categoria")->get();

        return view("Produto.index", ["produto" => $produto]);

    }

    public function inserir()
    {
        $marca = Marca::all()->toArray();
        $cor = Cor::all()->toArray();
        $categoria = Categoria::all()->toArray();
        return view("Produto.formulario", ['categoria' => $categoria, 'marca' => $marca, 'cor' => $cor]);
    }

    public function salvar_novo(Request $request)
    {
        $produto = new Produto();

        $produto->nome = $request->input("nome");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->descricao = $request->input("descricao");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->id_cor = $request->input("id_cor");
        $produto->save();

        return redirect("/produto");
    }

    public function alterar($id)
    {
        $produto = Produto::find($id)->toArray();
        $marca = Marca::all()->toArray();
        $cor = Cor::all()->toArray();
        $categoria = Categoria::all()->toArray();
        return view("Produto.formulario", ['produto' => $produto, 'categoria' => $categoria, 'marca' => $marca, 'cor' => $cor]);
    }

    public function salvar_update(Request $request)
    {
        $id = $request->input("id");
        $produto = Produto::find($id);

        $produto->nome = $request->input("nome");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->descricao = $request->input("descricao");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->id_cor = $request->input("id_cor");
        $produto->save();

        return redirect("/produto");
    }

    public function excluir($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect("/produto");
    }
}
