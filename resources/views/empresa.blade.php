<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresas</title>
    @include('cdn')
</head>
<body>
  
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Empresas
                            <a href="" class="btn btn-danger btn-sm float-end">VOLTAR</a><br>
                            <a href="" class="btn btn-primary btn-sm float-begin">Adicionar Empresa</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Fantasia</th>
                                    <th>Razao Social</th>
                                    <th>CNPJ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID Empresa</td>
                                    <td>Nome Fabntasia</td>
                                    <td>Razão Social</td>
                                    <td>CNPJ</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">Visualizar</a>
                                        <a href="" class="btn btn-success btn-sm">Editar</a>
                                        <a href="" class="btn btn-primary btn-sm">Contratos</a>
                                        <button type="submit" name="delete_empresa" value="" class="btn btn-danger btn-sm">Deletar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('cdn-js')
</body>
</html>