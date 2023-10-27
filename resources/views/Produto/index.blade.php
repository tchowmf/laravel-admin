@extends('TemplateAdmin.index')
@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Cadastro de Produtos</h1>

    <div class="card">
        <div class="card-header">
           Categorias
        </div>
        <div class="card-body">
            <a href='/produto/novo' class="btn btn-success">Novo Produto</a>
            <br><table class="table table-bordered dataTable"><br>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Cor</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    @foreach ($produto as $dados)
                    <tr>
                        <td>{{ $dados['id'] }}</td>
                        <td>{{ $dados['nome'] }}</td>
                        <td>{{ $dados['preco'] }}</td>
                        <td>{{ $dados['quantidade'] }}</td>
                        <td>{{ $dados['cat'] }}</td>
                        <td>{{ $dados['marc'] }}</td>
                        <td>{{ $dados['cor'] }}</td>
                        <td>{!! $dados['descricao'] !!}</td>
                        <td>
                            <a href="/produto/update/{{ $dados['id'] }}" class="btn btn-success"><li class="fa fa-edit"></li></a>
                            <a href="/produto/excluir/{{ $dados['id'] }}" class="btn btn-danger"><li class="fa fa-trash"></li></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<!--
    php artisan make:migration create_table_marca
-->
