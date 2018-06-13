<!--MENU-->
<?php
      include('mnuDashBoard.php');
    ?>
    <!-- FIN MENU-->
    
<?php

    $nombre = ''; 
    $marca = '';
    $modelo = '';
    $cantidad = 0;
    $oferta = 0;
    $linkDePago = '';
    $precioDeVenta = 0;
    $imagen = '';

 require_once 'dbconfig.php';

 if(isset($_POST['btnsave']))
 {
    //RECUPARACION DE DATOS DEL POST--------------------------------START
    //Datos de articulo-start
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cantidad = $_POST['cantidad'];
    
    if(isset($_POST['oferta']) && 
   $_POST['oferta'] == 'on') 
   {
    $oferta = 1;
   }else
   {
    $oferta = 0;
   }
    
    $linkDePago = $_POST['linkDePago'];
    $precioDeVenta = $_POST['precioDeVenta'];
    //Datos de articulo-end
    //Datos de imagen-start
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];
/*
    echo 'Más información de depuración:';
    print_r($_FILES);
*/
    //Datos de imagen-end
    //RECUPARACION DE DATOS DEL POST--------------------------------END

    //VALIDACIONES DE FORMULARIO------------------------------------START
    $validacionExitosa = true;//variable de control
    
    if(empty($precioDeVenta)){ $errMSG = "ingrese precio de venta del articulo."; $validacionExitosa = false;}
    if(empty($linkDePago)){ $errMSG = "ingrese link de pago del articulo."; $validacionExitosa = false;}
    //if(empty($imagen)){ $errMSG = "ingrese imagen del articulo."; $validacionExitosa = false;}
    if(empty($cantidad)){ $errMSG = "ingrese cantidad del articulo."; $validacionExitosa = false;}    
    if(empty($modelo)){ $errMSG = "ingrese modelo del articulo."; $validacionExitosa = false;}
    if(empty($marca)){ $errMSG = "ingrese marca del articulo."; $validacionExitosa = false;}
    if(empty($nombre)){ $errMSG = "ingrese Nombre del articulo."; $validacionExitosa = false;}
    //VALIDACIONES DE FORMULARIO------------------------------------END

    if($validacionExitosa == false)
    {
        echo "<script>
        alert('" . $errMSG . "');           
          </script>";   

        //OJO ACA ?>
        
        <html lang="es">
  <head>
    <title>Alta de Articulos</title>
  </head>
  <body>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">
     
     <table class="table table-bordered table-responsive">
            <tr>
                <td><label class="control-label">Nombre</label></td>
                <td><input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" /></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Marca</label></td>
                <td><input class="form-control" type="text" name="marca" placeholder="Marca" value="<?php echo $marca; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Modelo</label></td>
                <td><input class="form-control" type="text" name="modelo" placeholder="Modelo" value="<?php echo $modelo; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Cantidad</label></td>
                <td><input class="form-control" type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $cantidad; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Oferta</label></td>
                <td><input class="form-control" type="checkbox" name="oferta"  placeholder="oferta" value="false"/></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Imagen</label></td>
                <td><input class="input-group" type="file" name="imagen" accept="image/*" /></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Link De Pago</label></td>
                <td><input class="form-control" type="text" name="linkDePago" placeholder="Link De Pago" value="<?php echo $linkDePago; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Precio De Venta</label></td>
                <td><input class="form-control" type="text" name="precioDeVenta" placeholder="Precio De Venta" value="<?php echo $precioDeVenta; ?>" /></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
                <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar
                </button>
                </td>
            </tr>
    </table>    
    </form>
</body>
</html>

<?php
          exit;
    }

    if($validacionExitosa == true)
    {
        $upload_dir = './user_images/'; //Directorio donde se guardan la imagenes 
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //obtiene la extension de las imagenes
        //formatos de imagen permitidos
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
        //renombramiento de archivo
        $userpic = rand(1000,1000000).".".$imgExt;


        //formatos de imagen permitidos
        if(in_array($imgExt, $valid_extensions))
        {   
            //Chequea tamaño de imagen '5MB'
            if($imgSize < 5000000)    
            {
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                
                $imagen = $upload_dir.$userpic; //path completo de la imagen
            }
            else
            {
                $errMSG = "La imagen pesa mucho. Que pese menos de 5Mb por favor";
            }
        }
        else
        {
            $errMSG = "Los formatos de imagen permitidos son: JPG, JPEG, PNG y GIF.";  
        } 

        //Si no hay errores, seguimos ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO repuestos(Nombre, Marca, Modelo, Cantidad, Oferta, Imagen, LinkDePago, PrecioDeVenta) 
                                      VALUES(:nombre, :marca, :modelo, :cantidad, :oferta, :imagen, :linkDePago, :precioDeVenta)');
            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':marca',$marca);
            $stmt->bindParam(':modelo',$modelo);
            $stmt->bindParam(':cantidad',$cantidad);
            $stmt->bindParam(':oferta',$oferta);
            $stmt->bindParam(':imagen',$imagen);
            $stmt->bindParam(':linkDePago',$linkDePago);
            $stmt->bindParam(':precioDeVenta',$precioDeVenta);

            if($stmt->execute())
            {
                
                echo "<script>
                    alert('Articulo agregado correctamente...');
                    location.href='Consulta.php';
                      </script>";
                //header("refresh:5;index.php"); // redirecciona a la pa¿gina de consulta de articulos en 5seg.
            }
            else
            {
                $errMSG = "Ups! problemas guardando el articulo....";
            }
        }
    }
} ?>

<html lang="es">
  <head>
    <title>Alta de Articulos</title>
  </head>
  <body>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">
     
     <table class="table table-bordered table-responsive">
            <tr>
                <td><label class="control-label">Nombre</label></td>
                <td><input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" /></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Marca</label></td>
                <td><input class="form-control" type="text" name="marca" placeholder="Marca" value="<?php echo $marca; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Modelo</label></td>
                <td><input class="form-control" type="text" name="modelo" placeholder="Modelo" value="<?php echo $modelo; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Cantidad</label></td>
                <td><input class="form-control" type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $cantidad; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Oferta</label></td>
                <td><input class="form-control" type="checkbox" name="oferta"  placeholder="oferta" value="false"/></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Imagen</label></td>
                <td><input class="input-group" type="file" name="imagen" accept="image/*" /></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Link De Pago</label></td>
                <td><input class="form-control" type="text" name="linkDePago" placeholder="Link De Pago" value="<?php echo $linkDePago; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Precio De Venta</label></td>
                <td><input class="form-control" type="text" name="precioDeVenta" placeholder="Precio De Venta" value="<?php echo $precioDeVenta; ?>" /></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
                <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar
                </button>
                </td>
            </tr>
    </table>    
    </form>
</body>
</html>