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
    
    <form action="{{route ('editUser', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h3>Editando o usuario: <b>{{ Auth::user()->name }}</b></h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('danger'))
            <div class="alert alert-danger">
                {{session('danger')}}
            </div>
        @endif

        <input type="text" class="form-control" name="name" placeholder="Seu nome" value="{{ Auth::user()->name }}">
        @error('name')
            <span>{{ $message }}</span>
        @enderror

        <input type="email" class="form-control" name="email" placeholder="Seu Email" value="{{ Auth::user()->email }}">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <input type="password" class="form-control" name="password" placeholder="Senha">
        @error('password')
            <span>{{ $message }}</span>
        @enderror

        <input type="text" class="form-control" name="facebook" placeholder="https:/www.facebook.com" value="{{ Auth::user()->facebook }}">
        @error('facebook')
            <span>{{ $message }}</span>
        @enderror   

        <input type="text" class="form-control" name="twitter" placeholder="https:/www.twwiter.com" value="{{ Auth::user()->twitter }}">
        @error('twitter')
            <span>{{ $message }}</span>
        @enderror    

        <input type="text" class="form-control" name="linkedin" placeholder="https:/www.linkedin.com" value="{{ Auth::user()->linkedin }}">
        @error('linkedin')
            <span>{{ $message }}</span>
        @enderror

        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="about">{{ Auth::user()->about }}</textarea>
            <label for="floatingTextarea">Sobre mim</label>
        </div>

        <div class="mb-3">
            <input class="form-control" type="file" id="formFile" name="profile_picture">
        </div>
        @error('profile_picture')
            <span>{{ $message }}</span>
        @enderror

        <input type="submit" class="btn btn-primary form-control" value="Salvar">
        <a href="/dashboard">Voltar</a>
    </form>
</body>
</html>
