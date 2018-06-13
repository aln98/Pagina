<!--MENU-->
<?php
      include('mnuDashBoard.php');
    ?>
    <!-- FIN MENU-->

<?php

 error_reporting( ~E_NOTICE );
 require_once 'dbconfig.php';
 
 //DECLARACION DE VARIABLES GLOBALES-start
 $Nombre = '';
 $Marca = '';
 $Modelo = '';
 $Cantidad = 0;
 $Oferta = false;
 $LinkDePago = '';
 $PrecioDeVenta = 0;
 $Imagen = '';
 $id = -1;
//DECLARACION DE VARIABLES GLOBALES-end

 if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
 {
    if(!isset($_POST['modificar']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT RepuestoId, Nombre, Marca, Modelo, Cantidad, Oferta, Imagen, LinkDePago, PrecioDeVenta 
                                        FROM repuestos 
                                        WHERE RepuestoId =:uid');
        $stmt_edit->execute(array(':uid'=>$id));

        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);        
    }
 }
 else
 {
  header("Location: consulta.php");
 }
 
 if(isset($_POST['modificar']))
 {
    $Nombre = $_POST['nombre'];
    $Marca = $_POST['marca'];
    $Modelo = $_POST['modelo'];
    $Cantidad = $_POST['cantidad'];
    if($_POST['oferta'] == 'on')
    {
        $Oferta = 1;
    }
    else
    {
        $Oferta = 0;
    };
    $LinkDePago = $_POST['linkDePago'];
    $PrecioDeVenta = $_POST['precioDeVenta'];
    if($Imagen != $_FILES['imagen']['name'])//si actualizaron la imagen.......
    {
        
        $imgFile = $_FILES['imagen']['name'];
        $tmp_dir = $_FILES['imagen']['tmp_name'];
        $imgSize = $_FILES['imagen']['size'];
     
        if($imgFile)
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
                    
                    $Imagen = $upload_dir.$userpic;//ACA-PATH IMAGEN
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
        }
        else
        {
        // if no image selected the old image remain as it is.
        $userpic = $edit_row['Imagen']; // old image from database
        } 
}
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $id = $_GET['edit_id'];
  
   if($Imagen != "")
   { 
    $stmt = $DB_con->prepare('UPDATE repuestos 
    SET Nombre=:nombre, 
        Marca=:marca, 
        Modelo=:modelo,
        Cantidad=:cantidad,
        Oferta=:oferta,
        Imagen=:imagen,
        LinkDePago=:linkDePago,
        PrecioDeVenta=:precioDeVenta
    WHERE RepuestoId=:rid');
    $stmt->bindParam(':nombre',$Nombre);
    $stmt->bindParam(':marca',$Marca);
    $stmt->bindParam(':modelo',$Modelo);
    $stmt->bindParam(':cantidad',$Cantidad);
    $stmt->bindParam(':oferta',$Oferta);
    $stmt->bindParam(':imagen',$Imagen);
   }
   else
   {
    $stmt = $DB_con->prepare('UPDATE repuestos 
    SET Nombre=:nombre, 
        Marca=:marca, 
        Modelo=:modelo,
        Cantidad=:cantidad,
        Oferta=:oferta,        
        LinkDePago=:linkDePago,
        PrecioDeVenta=:precioDeVenta
    WHERE RepuestoId=:rid');
    $stmt->bindParam(':nombre',$Nombre);
    $stmt->bindParam(':marca',$Marca);
    $stmt->bindParam(':modelo',$Modelo);
    $stmt->bindParam(':cantidad',$Cantidad);
    $stmt->bindParam(':oferta',$Oferta); 
   }
   $stmt->bindParam(':linkDePago',$LinkDePago);
   $stmt->bindParam(':precioDeVenta',$PrecioDeVenta);
   $stmt->bindParam(':rid',$id);
   
    
   if($stmt->execute()){
    echo "<script>
            alert('Articulo agregado correctamente...');
            location.href='Consulta.php';
          </script>";
   }
   else{
    $errMSG = "Ups! hay problemas conla modificación";
   }
  }    
 }
 else
 { ?>

<html lang="es">
  <head>
    <title>Alta de Articulos</title>
  </head>
  <body>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">
     
     <table id="repuestoAdd" class="table table-bordered table-responsive">
            <tr>
                <td><label class="control-label">Nombre</label></td>
                <td><input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $Nombre; ?>" /></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Marca</label></td>
                <td><input class="form-control" type="text" name="marca" placeholder="Marca" value="<?php echo $Marca; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Modelo</label></td>
                <td><input class="form-control" type="text" name="modelo" placeholder="Modelo" value="<?php echo $Modelo; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Cantidad</label></td>
                <td><input class="form-control" type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $Cantidad; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Oferta</label></td>
                <td><input class="form-control" type="checkbox" name="oferta"  placeholder="oferta" <?php if($Oferta==1){echo 'checked';}else{echo '';}; ?>/></td>
            </tr>
            
            <tr><!--ACA-->
                <td><label class="control-label">Imagen Actual</label></td>
                <td><img src="
                                <?php echo $Imagen;
                                   /* if($Imagen == $_FILES['imagen']['name']) 
                                        echo $_FILES['imagen']['name']; 
                                    else 
                                        echo $Imagen; */
                                ?>
                            " class="img-rounded" width="250px" height="250px" /></td>                
            </tr>

            <tr>
                <td><label class="control-label">Imagen</label></td>
                <td><input class="input-group" type="file" name="imagen" accept="image/*" /></td>
            </tr>
            
            <tr>
                <td><label class="control-label">Link De Pago</label></td>
                <td><input class="form-control" type="text" name="linkDePago" placeholder="Link De Pago" value="<?php echo $LinkDePago; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Precio De Venta</label></td>
                <td><input class="form-control" type="text" name="precioDeVenta" placeholder="Precio De Venta" value="<?php echo $PrecioDeVenta; ?>" /></td>
            </tr>

            <input type="hidden" name="modificar" value="si">

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
 <?php } ?>