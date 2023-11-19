<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
</head>
<body>
    <form action="/cadastrar" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="Nome">
        @error('name')
            <span>{{ $message }}</span>
        @enderror

        <input type="email" name="email" placeholder="Email">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <input type="password" name="password" placeholder="Senha">
        @error('password')
            <span>{{ $message }}</span>
        @enderror

        <input type="file" name="profile_picture" accept="image/*">
        @error('profile_picture')
            <span>{{ $message }}</span>
        @enderror
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>