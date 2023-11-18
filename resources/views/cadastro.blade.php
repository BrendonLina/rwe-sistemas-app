<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Senha">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>