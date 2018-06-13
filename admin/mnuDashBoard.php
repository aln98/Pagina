<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Acceso restringido.<br>";
   echo "<br><a href='http://localhost/bas/logIn.html'>Login</a>";
   echo "<br><br><a href='http://localhost/bas/index.php'>Volver</a>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='logIn.html'> Es necesario que inicie sesión en el sistema</a>";
exit;
}
?>

<html lang="es">
    <head>
      <title>Gestion de Autoparetes</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="css/estilos.css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    </head>
    <body>
   <!--MENU-->
    <div class="nav justify-content-center" style="background-color:#FF8E00">
        <a class="nav-link active"  href="dashboard.php">Inicio</a>
        <a class="nav-link" href="Consulta.php">Consultar</a>
        <a class="nav-link" href="Agregar.php">Agregar</a>
        
      </div><!-- FIN MENU-->