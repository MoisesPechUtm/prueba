<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grayscale - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}"/>

        <link rel="stylesheet" href="{{asset('css/fonts.css')}}"/>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: black;">
            <div class="container px-4 px-lg-5">
                <!--a class="navbar-brand" href="#page-top">Start Bootstrap</a-->
                <a href="#inicio"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 100px;"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#proyecto">Proyecto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#personajes">Personajes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#enemigos">Enemigos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#powerup">Power Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="#plataformas">Plataformas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#mercancia">Mercancia</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comentarios">Comentarios</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="inicio">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase" style="font-family: bubblegum;">Frop's Adventure</h1>
                        <!--h2 class="text-white-50 mx-auto mt-2 mb-5">A free, responsive, one page Bootstrap theme created by Start Bootstrap.</h2-->
                        <br>
                        <a class="btn btn-primary" href="#proyecto">Inicio</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Proyecto-->
        <section class="projects-section bg-light" id="proyecto" style="margin: 20px;">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="{{ asset('img/fondo-web.png') }}" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4 style="font-family: bubblegum;">Descripcion</h4>
                            <p class="text-black-50 mb-0">Frop, una rana mitad rana toro y mitad rana pacman, emprende una aventura para rescatar a su hermana; en esta aventura se topará con terrenos complicados. El juego cuenta con niveles, enemigos y mecanicas muy interesantes. Espera a ver los enemigos, no vas a querer acercarteles 
                                ¡CUIDADO!
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('img/nivel2.png') }}" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project" style="padding: 20px;">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white" style="font-family: bubblegum;">Nivel 2</h4>
                                    <p class="mb-0 text-white-50" >El demo del juego cuenta con un nivel dos, enemigos apareceran por todo el mapa, te obstaculizarán el camino, acaba con ellos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('img/nivel3.png')}}" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project" style="padding: 20px;">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white" style="font-family: bubblegum;">Nivel 3</h4>
                                    <p class="mb-0 text-white-50">Por ultimo el demo del juego tambien tiene un ultimo nivel, un boss final para poder salir de la cueva, la Reina Ambar te espera al fondo de la cueva para termianr contigo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>     
        <!-- Personajes-->
        <section class="contact-section bg-black" id="personajes">
            <div class="titulo-catalogo">
                <h2>Personajes</h2>
            </div>
            <br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <!--carta-->
                    @foreach($personajes as $registro)
                    <div class="col-md-4 mb-3 mb-md-0 card-contenedor">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="/imagenes_personajes/{{ $registro['imagen'] }}" alt="" style="width: 100%; height: auto; margin-bottom: 15px;">
                                <br>
                                <h4 class="text-uppercase m-0">{{ $registro["nombre"] }}</h4>
                                <hr class="my-2 mx-auto" />
                                <div class="small text-black-50">{{ $registro["descripcion"] }}</div>
                            </div>
                        </div>
                    </div>
                    <!--carta-->
                    @endforeach
                </div>

            </div>
        </section>
        <!-- Enemigos-->
        <section class="contact-section bg-black" id="enemigos">
            <div class="titulo-catalogo">
                <h2>Enemigos</h2>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <!--carta-->
                    @foreach($enemigo as $registro)
                    <div class="col-md-4 mb-3 mb-md-0 card-contenedor">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="/imagenes_enemigos/{{ $registro['imagen'] }}" alt="" style="width: 100%; height: auto; margin-bottom: 15px;">
                                <br>
                                <h4 class="text-uppercase m-0">{{ $registro["nombre"] }}</h4>
                                <hr class="my-2 mx-auto" />
                                <div class="small text-black-50">{{ $registro["descripcion"] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--carta-->
                </div>
            </div>
        </section>
        <!-- Power up-->
        <section class="contact-section bg-black" id="powerup">
            <div class="titulo-catalogo">
                <h2>Power Up</h2>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <!--carta-->
                    @foreach($powerups as $registro)
                    <div class="col-md-4 mb-3 mb-md-0 card-contenedor">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="/imagenes_powerups/{{ $registro['imagen'] }}" alt="" style="width: 100%; height: auto; margin-bottom: 15px;">
                                <br>
                                <h4 class="text-uppercase m-0">{{ $registro["nombre"] }}</h4>
                                <hr class="my-2 mx-auto" />
                                <div class="small text-black-50">{{ $registro["descripcion"] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--carta-->                   
                </div>
            </div>
        </section>
        <!-- Plataformas-->
        <section class="contact-section bg-black" id="plataformas">
            <div class="titulo-catalogo">
                <h2>Plataformas</h2>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <!--carta-->
                    @foreach($plataformas as $registro)
                    <div class="col-md-4 mb-3 mb-md-0 card-contenedor">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="/imagenes_plataformas/{{ $registro['imagen'] }}" alt="" style="width: 100%; height: auto; margin-bottom: 15px;">
                                <br>
                                <h4 class="text-uppercase m-0">{{ $registro["nombre"] }}</h4>
                                <hr class="my-2 mx-auto" />
                                <div class="small text-black-50">{{ $registro["descripcion"] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--carta-->                    
                </div>
            </div>
        </section>
        <!-- Mercancia-->
        <section class="contact-section bg-black" id="mercancia">
            <div class="titulo-catalogo">
                <h2>Mercancia</h2>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                   <!--carta-->
                   @foreach($mercancia as $registro)
                    <div class="col-md-4 mb-3 mb-md-0 card-contenedor">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <img src="/imagenes_mercancias/{{ $registro['imagen'] }}" alt="" style="width: 100%; height: auto; margin-bottom: 15px;">
                            <br>
                            <h4 class="text-uppercase m-0">{{ $registro["nombre"] }}</h4>
                            <hr class="my-2 mx-auto" />
                            <h4 class="text-uppercase m-0">${{ $registro["precio"] }}</h4>
                            <div class="small text-black-50">{{ $registro["descripcion"] }}</div>
                            <button class="compra-btn">Comprar</button>
                        </div>
                    </div>
                    </div>
                    @endforeach
                <!--carta-->
                </div>
            </div>
        </section>
        <!-- comentarios-->
        <section class="signup-section" id="comentarios">
            <div class="titulo-comentarios">
                <h2>Comentarios</h2>
                <br>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center comentarios">                      
                        <div class="comment-form">
                            <h2>Deja tu Comentario</h2>
                            <form action="/guardar_comentario" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ empty($id) ? '' : $id}}">
                                <label for="name">Nombre:</label>
                                <input type="text" id="name" name="nombre" value="{{ empty($nombre) ? '' : $nombre}}">
                    
                                <label for="comment">Comentario:</label>
                                <textarea id="comentario" name="comentario" value="{{ empty($comentario) ? '' : $comentario}}"></textarea>
                    
                                <button type="submit">{{empty($id) ? 'Agregar' : 'Modificar'}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
                                                                                                                                                                                                            