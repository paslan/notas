<!doctype html>
<html lang="pt-BR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Sistema NF</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Controle de NF</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empresas.index') }}">Empresas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contratos.index') }}">Contratos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('propostas.index') }}">TA/Propostas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contatos.index') }}">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notas.index') }}">Notas Fiscais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('processos.index') }}">Processos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('custos.index') }}">Centro de Custos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userparams.index') }}">Parametros</a>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
            @if (Auth::check())
                <form action="logout" method="post">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-danger btn-sm">Login</a>
            @endif
        </nav>
    </body>
</html>


