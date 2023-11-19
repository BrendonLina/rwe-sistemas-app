<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h4>Editando o usuario {{Auth::user()->name}}</h4>

    <form action="/user/edit/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" placeholder="Nome" value="{{ Auth::user()->name }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror

        <input type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror

        <input type="password" name="password" placeholder="Senha">
            @error('password')
                <span>{{ $message }}</span>
            @enderror

        <input type="url" name="facebook" placeholder="https://facebook.com" value="{{ Auth::user()->facebook }}">
        <input type="url" name="twitter" placeholder="https://twitter.com" value="{{ Auth::user()->twitter }}">
        <input type="url" name="linkedin" placeholder="https://linkedin.com" value="{{ Auth::user()->linkedin }}">
        

        <textarea name="about" rows="10" cols="10" maxlength="500">
            {{ Auth::user()->about }}
        </textarea>

        <input type="file" name="profile_picture" accept="image/*">
        @error('profile_picture')
            <span>{{ $message }}</span>
        @enderror
        <input type="submit" value="Editar">

    </form>
</body>
</html>