@extends('TemplateAdmin.index')
@section('contents')
<h1 class="h3 mb-4 text-gray-800">Inclusão de uma nova Cor</h1>
<div class="card">
        <div class="card-header">
            Criar nova cor
        </div>
        <div class="card-body">
            <form method="post" action="/cor/novo">
                @CSRF
                <label class="form-label">Nome da cor</label>
                <input class="form-control" name="cor" placeholder="Digite o nome da cor"> 

                <label class="form-label">Situação</label>
                <select class="form-control" name='situacao'>           
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>            
                </select>  
                <br/>
                <input type="submit" class="btn btn-success" value="Salvar">
            </form>  
        </div>
</div>  
@endsection

<!-- 
    php artisan make:migration create_table_marca 
-->