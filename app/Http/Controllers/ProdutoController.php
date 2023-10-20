<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\Categoria;

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
                                    "categoria.nome AS cat",
                                    "marca.nome as marc")
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
        $produto = Produto::all()->toArray();
        $categoria = Categoria::all()->toArray();
        return view("Produto.formulario", ['categoria' => $categoria, 'produto' => $produto, 'marca' => $marca]);
    }

    public function salvar_novo(Request $request)
    {
        $produto = new Produto();

        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->save();

        return redirect("/produto");
    }

    public function alterar($id)
    {
        $produto = Produto::find($id)->toArray();
        $marca = Marca::all()->toArray();
        $categoria = Categoria::all()->toArray();
        return view("Produto.formulario", ['produto' => $produto, 'categoria' => $categoria, 'marca' => $marca]);
    }

    public function salvar_update(Request $request)
    {
        $id = $request->input("id");
        $produto = Produto::find($id);

        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->id_marca = $request->input("id_marca");
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
