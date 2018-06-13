<!doctype html>
<html lang="es">

<head>
    <title>Boutique General Inicio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/contacto.css" />
    <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">

    <!-- Estilos -->
    <style>
        .logo {
            background-image: url("Imagenes/LogoEnteroBorde.svg");
            background-repeat: no-repeat;

        }
    </style>

    <!-- Menú -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
    <a class="navbar-brand" href="#">Boutique General</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quienesSomos.html">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ofertas.php">Ofertas del mes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.html">Contacto</a>
                </li>
            </ul>
            <a class="nav-item" href="logIn.html" style="color:white">Login
                <i class="oi oi-account-login"></i>
            </a>
        </div>
    </nav>
</head>


<body>
    <!-- Encabezado -->
    <div class="container-fluid">
        <div class="row">
            <div class="encabezado1 logo col-sm-12 d-block d-sm-none d-none d-sm-block d-md-none"></div>
            <div class="encabezado2 logo col-sm-12 d-none d-md-block d-lg-none"></div>
            <div class="encabezado3 logo col-sm-12 d-none d-lg-block"></div>
        </div>
    </div>

    <div class="espacio1 container-fluid"></div>

    <div class="fondo container-fluid">

        <!-- Carousel -->
        <div class="row d-flex justify-content-center">
            <div class="col-2 d-block d-sm-none d-none d-sm-block d-md-none"></div>
            <div class="col-sm-12 col-lg-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="Imagenes/1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Imagenes/2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Imagenes/3.jpg" alt="Third slide" style="height: 390px">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Imagenes/4.jpg" alt="Third slide" style="height: 390px">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
            <div class="col-2 d-block d-sm-none d-none d-sm-block d-md-none"></div>
        </div>
        <div class="row title d-flex justify-content-center">
                <p>Especialistas en autopartes recuperadas originales,
                    <a href="http://www.dnrpa.gov.ar/desarmadero/informacion/ley25761.pdf">Ley 25761</a>
                </p>
            </div>
        </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>