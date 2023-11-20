<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">{{Auth::user()->name}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route ('profileUser', Auth::user()->id)}}"><b>Suas informações</b></a>
                            <!-- <a class="nav-link" href="/user/profile/{{Auth::user()->id}}"><b>Suas informações</b></a> -->
                        </li>
                
                        <li class="nav-item">
                            <a class="nav-link" href="{{route ('editUser', Auth::user()->id)}}">Editar suas informações</a>
                            <!-- <a class="nav-link" href="/user/edit/{{Auth::user()->id}}">Editar suas informações</a> -->
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>

