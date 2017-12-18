<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/css/all.css">
                
        <!-- Styles -->
    </head>
    <body>
        <header>
            <div class="container-fluid form-inline ">
                <div id="img-logo" class="float-left d-none d-md-block">
                    <img class="" src="https://placehold.it/300x100" alt="Super Ferreteria">
                </div>
                <div class="search-items ml-auto d-none d-md-block">
                    {{-- <form class="form-inline my-2 my-lg-0">
                       <input class="form-control mr-sm-2" type="search" placeholder="Buscar Producto" aria-label="Search">
                       <button class="btn btn-outline-default my-2 my-sm-0" type="submit">Buscar</button>
                    </form> --}}
                </div>
                <ul class="navbar-nav ml-auto d-none d-md-block navzindex">
                    @if (auth()->guest())
                       <div class="choice  form-inline">
                           {{ redirect()->url('/login') }}
                           {{-- <a class="nav-link" href="{{ url('/login') }}">Entrar</a>&nbsp;&nbsp;&nbsp;
                           <a class="nav-link" href="{{ url('/register') }}">Registrarse</a> --}}
                       </div>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                                {{-- <b class="caret"></b> --}}
                            </a>
                            <ul class="dropdown-menu">
                                @if(auth()->user()->access_id == 1)
                                    <li><a class="nav-link" href="{{ url('/') }}">Volver</a></li>
                                @endif
                                <li><a class="nav-link" href="{{ url('/logout') }}">Salir</a></li>
                            </ul>

                        </li>
                    @endif 
                </ul>

            </div>

            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
              <div class="container">       

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile.index', auth()->user()->id) }}">Usuarios <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
               </div>
              </div>
            </nav>
            
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
           <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Dirección</h3>
                            
                        <ul class="address">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Avenida 1234, Lorem, <span>Maracaibo - Edo. Zulia.</span></li>
                            <li><i class="fa fa-envelope-square" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><i class="fa fa-phone-square" aria-hidden="true"></i>+1234 567 567</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Información</h3>
                        <ul class="info"> 
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">Nosotros</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contactanos</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Categorias</h3>
                        <ul class="info"> 
                            @foreach(app('App\Http\Controllers\CategoryController')->index() as $category)
                                <li class="nav-item">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i><a name={{ $category->id }} href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach

{{--                             <li><a href="groceries.html">Hogar</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.html">Construccion</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="personalcare.html">Jardin</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="packagedfoods.html">Cocina</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Perfil</h3>
                        <ul class="info"> 
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('item.index') }}">Tienda</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html">Carrito</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ url('/login') }}">Entrar</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ url('/register') }}">Registrarse</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
                
            <div class="footer-copy">
                  
                <div class="container ml-auto">
                    <p>© 2017 Super Ferreteria. Derechos y Zurdos Reservados | Developed by <a href="https://github.com/carlos-bermudez1982/">Carlos Bermudez</a></p>
                </div>
            </div>
                
            <div class="footer-botm">
                    <div class="container">
                        <div class="float-left my-auto">
                            <ul class="form-inline">
                                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="float-right my-auto">  
                            <img src="/images/card.png" alt=" " class="img-responsive">
                        </div>
                        <div class="clearfix"> </div>
                    </div>
            </div> 
        </footer>

        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
