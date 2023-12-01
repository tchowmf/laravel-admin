<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Vendas;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = vendas::select("vendas.id",
                                "vendas.email",
                                "produto.nome",
                                "vendas.quantidade")
                                ->join("produto","produto.id", "=", "vendas.codigo_produto")
                                ->orderBy("id", "DESC")
                                ->get();


        return view("Compras.index",["compras"=>$compras]);
    }
}
