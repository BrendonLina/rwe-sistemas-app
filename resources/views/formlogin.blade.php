<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post" id="formLogin">
        @csrf

        @if(session('danger'))
            <div class="alert alert-danger">
                {{session('danger')}}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <input type="email" name="email" placeholder="Email">
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <input type="password" name="password" placeholder="Senha">
        @error('password')
            <span>{{$message}}</span>
        @enderror
        <input type="submit" value="Entrar" class="btn btn-primary" id="btnEnviar">
        <a href="/cadastrar">Cadastre-se</a>
    </form>
        
</body>
</html>