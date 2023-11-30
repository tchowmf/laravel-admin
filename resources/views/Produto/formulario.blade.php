@extends('TemplateAdmin.index')
@section('contents')

@php

    $titulo = "Inclusão de um novo Produto";
    $endpoint = "/produto/novo";
    $input_id = "";
    $input_nome = "";
    $input_preco = "";
    $input_quantidade = "";
    $input_id_categoria = "";
    $input_id_marca = "";
    $input_id_cor = "";
    $input_descricao = "";

    if(isset($produto)) {
        $titulo = "Alteração do Produto";
        $endpoint = "/produto/update";
        $input_id = $produto["id"];
        $input_nome = $produto["nome"];
        $input_preco = $produto["preco"];
        $input_quantidade = $produto["quantidade"];
        $input_id_categoria = $produto["id_categoria"];
        $input_id_cor = $produto["id_cor"];
        $input_id_marca = $produto["id_marca"];
        $input_descricao = $produto["descricao"];
    }

@endphp


<h1 class="h3 mb-4 text-gray-800">{{ $titulo }}</h1>
<div class="card">
    <div class="card-header">
        Criar novo Produto
    </div>
        <div class="card-body">
            <form method="post" action="{{ $endpoint }}">
                @CSRF
                <input type="hidden" name="id" value="{{ $input_id }}"/>

                <label class="form-label">Nome do Produto</label>
                <input class="form-control" name="nome" placeholder="Digite o nome do PRODUTO" value="{{ $input_nome }}">

                <label class="form-label">Preço</label>
                <input class="form-control" name="preco" placeholder="Digite o preço do PRODUTO" value="{{ $input_preco }}">

                <label class="form-label">Quantidade</label>
                <input class="form-control" name="quantidade" placeholder="Digite a quantidade do PRODUTO" value="{{ $input_quantidade }}">

                <label class="form-label">Categoria</label>
                <select name='id_categoria' class="form-control">
                    @foreach ($categoria as $dado)
                        <option value="{{ $dado['id'] }}" {{ $dado['id'] == $input_id_categoria ? 'selected' : '' }}>
                            {{ $dado['nome'] }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label">Marca</label>
                <select name='id_marca' class="form-control">
                    @foreach ($marca as $dado)
                        <option value="{{ $dado['id'] }}" {{ $dado['id'] == $input_id_marca ? 'selected' : '' }}>
                            {{ $dado['nome'] }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label">Cores</label>
                <select name='id_cor' class="form-control">
                    @foreach ($cor as $dado)
                        <option value="{{ $dado['id'] }}" {{ $dado['id'] == $input_id_cor ? 'selected' : '' }}>
                            {{ $dado['nome'] }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="produtos-text" placeholder="Digite a descrição do PRODUTO">{{ $input_descricao }}</textarea>

                <br><input type="submit" class="btn btn-success" value="Salvar">
            </form>
        </div>
</div>
@endsection


@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#produtos-text' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
<!--
    php artisan make:migration create_table_marca
-->
