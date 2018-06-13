
    <!--MENU-->
    <?php
      include('mnuDashBoard.php');
    ?>
    <!-- FIN MENU-->

      <!-- VENTANA DE INICIO -->
      <div class="tab-pane fade show active container mt-3 card" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
            <h2>Bienvenidos al sistema de gestion de autopartes</h2><hr>
            <h4>Este sensillo sistema permite agregar autopartes, asi como consultar, editar y borrar las ya existentes</h4>
            <div class="card">
              <h4>Sección Agregar</h4><hr>
              <p>Para comenzar a utilizar la sección de consulta, hacer click en el pnto de menú "Agregar" para poder cargar nuevas autopartes en el sistema.</p>              
            </div>
            <div class="card">
              <h4>Sección Consultar</h4><hr>
              <p>Para comenzar a utilizar esta sección, presionar el botón "Consultar". En esta seccion se mostraran las autopartes cargadas, permitiendo consultar sus datos, asi como modificarlos o si resulta necesario, eliminar del sistema.</p>
              <p>En caso de querer ofrcer autopartes a un precio diferencial (Destacar en Oferta), bastara con indicarlo mediante la busqueda, seleccion y edicion de la autoparte en cuestion, activando el casillero "Mostrar como oferta".</p>
            </div>
      </div><!-- FIN VENTANA DE INICIO -->

      <a href=logout.php>Cerrar Sesion X </a>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="js/app-js.js"></script>
    <script src="js/app-jq.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>