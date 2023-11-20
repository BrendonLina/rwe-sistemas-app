<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Meu Perfil</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 custom-box">
                <div class="profile-container">
                    <a href="{{route ('editUser', Auth::user()->id)}}" class="altperfil">Editar informações</a>
                    <h3>Informações do meu perfil:</h3>
                        <img src="{{ asset('img/profile/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="profile-image">
                        <h4>{{Auth::user()->name}}</h4>
                        <h4>{{Auth::user()->email}}</h4>

                        <div class="container">
                            <div class="accordion custom-accordion" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Sobre mim
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        @if(Auth::user()->about == null)
                                            <div class="accordion-body">Não há informações</div>
                                        @else
                                            <div class="accordion-body">{{Auth::user()->about}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <h5>Redes sociais:</h5>
            
                        @if(Auth::user()->facebook != null)
                            <h6><a href="{{Auth::user()->facebook}}" target="_blank" class="social">Facebook</a></h6>
                        @else
                            <h6><a href="#" class="social">Facebook</a></h6>
                        @endif
                        @if(Auth::user()->twitter != null)
                            <h6><a href="{{Auth::user()->twitter}}" target="_blank" class="social">Twitter</a></h6>
                        @else
                            <h6><a href="#" class="social">Twitter</a></h6>
                        @endif
                        @if(Auth::user()->linkedin != null)
                            <h6><a href="{{Auth::user()->linkedin}}" target="_blank" class="social">Linkedin</a></h6>
                        @else
                            <h6><a href="#" class="social">Linkedin</a></h6>    
                        @endif
                        
                        
                    <a href="{{route ('dashboard')}}" class="voltar">voltar</a>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

