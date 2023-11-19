<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h3>Olá seja bem-vindo!</h3>
    <p>{{Auth::user()->name}}</p>
    <a href="/user/edit/{id}">Editar informações</a>
    <a href="/user/profile/{id}">Suas informações</a>
    <a href="/logout">Sair</a>
</body>
</html>