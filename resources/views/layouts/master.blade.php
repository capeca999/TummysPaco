<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <title>Tummys @yield('titulo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
 <!--JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    
   <!-- CSS -->
    <link rel="stylesheet" href="/css/styles.min.css">

      <!-- JavaScript -->
    <script src="/js/masterlayout.js"></script>


      @yield('scripts')
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md custom-header">
        <div class="container-fluid">
            <div><a class="navbar-brand" href="{{url('/')}}"><img style="width: 120px;" src ="/img/Casa.png"><span>  <img style="width: 120px;" src ="/img/Nombre.png"></span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse"
                id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/animales/">Animales En Adopción</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/animales/casosEspeciales">Casos Especiales</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/preguntas/"> Preguntas Y Respuestas</a></li>

                    @if(Auth::user()==null)
                    <a href="{{url('/login/')}}"><img class="cursorHand iconos ml-3" src="/img/icons/login.svg" id="loginHeader" alt="Login" title="Login"></a>
                
                <a href="{{url('/register/')}}"><img class="cursorHand iconos ml-5" src="/img/icons/register.svg" id="registerHeader" alt="Registrarse" title="Registrarse"></a>
                    @endif


                    @if(Auth::user()!=null)
{{Auth::user()->role=='Administrador'}}
<a href="{{url('/AnimalesAdmin')}}"><img class="cursorHand iconos ml-5" src="/img/icons/listaranimales.png" id="lista2Header" alt="listaranimales" title="listaranimales"></a>     
<a href="{{url('/UsuariosAdmin')}}"><img class="cursorHand iconos ml-5" src="/img/icons/listarusuarios.png" id="lista2Header" alt="listarusuarios" title="listarusuarios"></a>         


                    <a href="{{ route('logout') }}" id="logout"><img class="cursorHand iconos ml-3" src="/img/icons/logout.svg" id="logoutHeader" alt="Logout" title="Logout"></a>
                       
                       <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
                    @endif
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="assets/img/avatar.jpg"></a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="#">Settings </a><a class="dropdown-item" role="presentation" href="#">Payments </a><a class="dropdown-item" role="presentation" href="#">Logout </a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     <div id="contenedorPrincipal">         
        @yield('contenido')
    </div>


<footer>
        <div class="row">
            <div class="col-sm-6 col-md-4 footer-navigation">
                <h3><a href="#"> <img style="width: 120px;" src ="/img/Casa.png"> <img style="width: 120px;" src ="/img/Nombre.png"></a></h3>
                <p class="links"><a href="#">Home</a><strong> · </strong><a href="/politicaPrivacidad/">Pólitica de Privacidad</a><strong> · </strong><a href="/condicionesAdoptar/">Condiciones De Adopción</a><strong> · </strong><a href="/aboutUs/">Sobre Nosotros</a><strong> · </strong><a href="/faq/">Faq</a><strong> · </strong>
                    <a
                        href="#">Información Importante&nbsp;</a>
                </p>
                <p class="company-name">Tummys © 2020</p>
            </div>
            <div class="col-sm-6 col-md-4 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">Plaza Rafael Atard, 7 , 24</span> Manises, España</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left"> +34 722513578</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p> <a href="#" target="_blank">tummysrefugio@gmail.com</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 footer-about">
                <h4>Siguenos en las redes sociales&nbsp;</h4>
                <p>Tambien puedes apoyar al refugio siguiendonos en las distintas redes sociales!</p>
                <div class="social-links social-icons"><a href="https://www.facebook.com/tummysrefugio/"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/Tummys1"><i class="fa fa-twitter"></i></a><a href="https://www.instagram.com/tummysrefugio/"><i class="fa fa-instagram"></i></a><a href="https://github.com/capeca999/TummysPaco"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </footer>





    <div>
        <div class="modal rubberBand animated" role="dialog" tabindex="-1" id="cookieModal" style="font-size: 10px;opacity: 1;min-width: 300;max-width: 500;min-height: 100;max-height: 200;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header border rounded border-dark shadow">
                        <h4 class="modal-title text-primary" style="color: #007afd;"><strong>Bienvenido - &nbsp; &nbsp; &nbsp; A Tummys!.</strong><br></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div
                        class="modal-body">
                        <p style="color: #262626;font-size: 11px;"> Esta página web usa cookies de Google para proporcionar sus servicios y analizar trafico.<br></p>
                        <hr>
                        <p style="color: #262626;margin-bottom: 0;"><strong>Usando esta página aceptas el uso de Cookies.</strong><br></p>
                </div>
                <div class="modal-footer"><button class="btn btn-dark tada animated" id="cookieModalConsent" type="button" data-dismiss="modal">Aceptar</button></div>
            </div>
        </div>
    </div>
 
    <script src="/js/cookies_index.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>