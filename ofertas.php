<?php

require_once 'admin/dbconfig.php';
    if(isset($_GET['delete_id']))
 {
  //Selecciiona el articulo a eliminar por ID
  $stmt_select = $DB_con->prepare('SELECT Imagen FROM repuestos WHERE RepuestoId =:uid');
  $stmt_select->execute(array(':uid'=>$_GET['delete_id']));

  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
  unlink("admin/user_images/".$imgRow['Imagen']);
  
  //Eliminacion de regitro actual en ls DB
  $stmt_delete = $DB_con->prepare('DELETE FROM repuestos WHERE RepuestoId =:uid');
  $stmt_delete->bindParam(':uid',$_GET['delete_id']);
  $stmt_delete->execute();
  
  header("Location: ofertas.php");
 }
?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Boutique General Ofertas</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css" />
        <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">

        <!-- Estilos -->
        <style>
            .logo {
                background-image: url("Imagenes/LogoEnteroBorde.svg");
                background-repeat: no-repeat;
            }

            .bordeTxt {
                border: 1px;
                border-style: solid;
                border-color: #3b59ff;

            }
            .bordeImg {
                border: 1px;
                border-style: solid;
                border-color: black;
                
            }

            .opa {
                opacity: 0.5;
            }

        </style>
    </head>

    <body>

        <!-- Menú -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
            <a class="navbar-brand" href="#">Boutique General</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quienesSomos.html">Quienes somos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Ofertas del mes
                            <span class="sr-only">(current)</span>
                        </a>
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

        <!-- Encabezado -->
        <div class="container-fluid">
            <div class="row">
                <div class="logo encabezado1 col-sm-12 d-block d-sm-none d-none d-sm-block d-md-none"></div>
                <div class="logo encabezado2 col-sm-12 d-none d-md-block d-lg-none"></div>
                <div class="logo encabezado3 col-sm-12 d-none d-lg-block"></div>
            </div>
        </div>

        <div class="container-fluid" style="height: 10vh; background-color: black;"></div>

        <div class="div" style="background-color: #343a40; height: 100vh">

        <div class="container-fluid">
            <div class="row justify-content-center" style="background-color: black;">
                <?php
 
            $stmt = $DB_con->prepare('SELECT RepuestoId, Nombre, Marca, Modelo, Cantidad, Oferta, Imagen, LinkDePago, PrecioDeVenta 
                            FROM repuestos 
                            WHERE Oferta=1');
            $stmt->execute();
 
            if($stmt->rowCount() > 0)
            {
            
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                 extract($row);
        ?>

<div class="col-md-4 col-lg-3 col-xl-3">
    <div class="card">
        <div class="card-header">
            <img src="<?php echo "admin/" . $row['Imagen']; ?>" class="img-rounded" width="100%" />
        </div>
        
        <div class="card-body">
                        <p><?php echo "Marca: " . $row['Marca']; ?><hr>
                        <?php echo "Nombre: " . $row['Nombre']; ?><br>
                        <?php echo "Modelo: " . $row['Modelo']; ?><br>
                        <?php echo "Precio: $" . $row['PrecioDeVenta']; ?><br>
                        <?php echo "Stock: " . $row['Cantidad']; ?><hr>
                        <a class="btn btn-primary btn-lg btn-block" href="<?php echo $row['LinkDePago']; ?>">Comprar</a></p>
        </div>
    </div>
    </br></br>
</div>

                    <?php
                }
 }
 else
 {
  ?>
                        <div class="col-xs-12">
                            <div class="alert alert-warning">
                                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No se encontraron datos...
                            </div>
                        </div>
                        <?php
 }
 
?>
            </div>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
                crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
        </div>
        </div>
    </body>

    </html>