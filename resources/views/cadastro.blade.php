<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>cadastrar</title>
</head>
<body>
    
    <form action="/cadastrar" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Cadastro de colaborador</h3>
        <input type="text" class="form-control" name="name" placeholder="Seu nome">
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <input type="email" class="form-control" name="email" placeholder="Seu Email">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <input type="password" class="form-control" name="password" placeholder="Senha">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <input type="file" name="profile_picture" accept="image/*">
        @error('profile_picture')
            <span>{{ $message }}</span>
        @enderror
        <input type="submit" class="btn btn-primary form-control" value="Cadastrar">
        <a href="/">Voltar</a>
    </form>
</body>
</html>

