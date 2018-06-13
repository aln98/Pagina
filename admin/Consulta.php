<?php

include('mnuDashBoard.php');

require_once 'dbconfig.php';
    if(isset($_GET['delete_id']))
 {
  //Selecciiona el articulo a eliminar por ID
  $stmt_select = $DB_con->prepare('SELECT Imagen FROM repuestos WHERE RepuestoId =:uid');
  $stmt_select->execute(array(':uid'=>$_GET['delete_id']));

  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
  unlink("user_images/".$imgRow['Imagen']);
  
  //Eliminacion de regitro actual en ls DB
  $stmt_delete = $DB_con->prepare('DELETE FROM repuestos WHERE RepuestoId =:uid');
  $stmt_delete->bindParam(':uid',$_GET['delete_id']);
  $stmt_delete->execute();
  
  header("Location: Consulta.php");
 }
?>
 <html lang="es">
  <head>
    <title>Consulta</title>
  </head>
  <body>
  


<div class="container-fluid">
<?php
 
 $stmt = $DB_con->prepare('SELECT RepuestoId, Nombre, Marca, Modelo, Cantidad, Oferta, Imagen, LinkDePago, PrecioDeVenta 
                           FROM repuestos 
                           ORDER BY RepuestoId DESC');
 $stmt->execute();
 
 if($stmt->rowCount() > 0)
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   extract($row);
   ?>
   <div class="row justify-content-center">
    <div class="col-4">
      <div class="card">
        <div class="card-header">
            <p>            <?php echo $row['Nombre']; ?></p>
        </div>
        <div class="card-body">
            <img class="card-img-top" src="<?php echo $row['Imagen']; ?>" alt="Card image cap">
            <a class="btn btn-info" href="Editform.php?edit_id=<?php echo $row['RepuestoId']; ?>" title="EDITAR" onclick="return confirm('Editar?')"><span class="glyphicon glyphicon-edit"></span> EDITAR</a> 
            <a class="btn btn-danger" href="?delete_id=<?php echo $row['RepuestoId']; ?>" title="BORRAR" onclick="return confirm('Borrar?')"><span class="glyphicon glyphicon-remove-circle"></span> BORRAR</a>
        </div>  

      </div>
    </div>
  </div>
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


</body>
</html>