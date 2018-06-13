<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "test";
$tbl_name = "usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM $tbl_name WHERE nombre = '$usuario' AND password = '$password'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
//  }
 $row = $result->fetch_array(MYSQLI_ASSOC);
//  if (password_verify($password, $row['password'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

    $_SESSION['usuario'];
    
    //echo "Bienvenido! " . $_SESSION['usuario'];
    echo "<script>   
    location.href='admin/dashboard.php';
    </script>";
 } else { 
   echo "Usuario y/o Contraseña incorrectos.";

   echo "<br><a href='logIn.html'>Reintentar</a>";
 }
 mysqli_close($conexion); 
 ?>