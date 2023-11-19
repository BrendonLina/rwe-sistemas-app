<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seu Perfil</title>
</head>
<body>
    
    <p>Caminho da imagem: {{ asset(Auth::user()->profile_picture) }}</p>
    {{-- @if (file_exists(public_path('img/profile/' . Auth::user()->profile_picture)))
        <img src="{{ asset('img/profile/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
    @else
        <p>Imagem não encontrada</p>
    @endif
    <p>{{ Auth::user()->name }}</p> --}}

    <img src="{{ asset('img/profile/' . Auth::user()->profile_picture) }}" alt="Profile Picture">


</body>
</html>