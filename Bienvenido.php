<?php

    header("Content-Type: text/html;charset=utf-8");

    require'conecbd.php';

    session_start();

    if(isset($_SESSION['sesionUsuario'])){

    echo"<html lang='en'>";

    //Incluímos el header (las librerias).
    require'header.php';


    $id = $_COOKIE['id'];

    $sql = "SELECT * FROM usuario WHERE id = $id";
    $consulta = mysql_query($sql)or die("Error de consulta $sql");

    $nivel = mysql_result($consulta, 0, 'Nivel');

    if($nivel == 1){
    echo"
        <!-- Fixed navbar -->
    <div class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"Bienvenido.php\">Sistema Escolar</a>
        </div>
        <div class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"Bienvenido.php\">Bienvenido</a></li>
            <li><a href=\"TestUsuario.php\">Usuarios</a></li>
            <li><a href=\"TestMateria.php\">Profesore(s)</a></li>
            <li><a href=\"TestGrupo.php\">Alumno(s)</a></li>
            <li><a href=\"Cerrar_sesion.php\">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>";
    }
    else{
        echo"
            <!-- Fixed navbar -->
        <div class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
          <div class=\"container\">
            <div class=\"navbar-header\">
              <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
              </button>
              <a class=\"navbar-brand\" href=\"Bienvenido.php\">Sistema Escolar</a>
            </div>
            <div class=\"navbar-collapse collapse\">
              <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"correcto.php\">Bienvenido</a></li>
                <li><a href=\"TestAlumno.php\">Materias-Asignadas</a></li>
                <li><a href=\"Cerrar_sesion.php\">Salir</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>";
    }

?>
     <div class="col-sm-4">
         <div class='img_user' align="center"><img src="bor1.jpg"></div>
     </div>

        <?php

            $nombre = mysql_result($consulta, 0, 'Nombre');
            $app = mysql_result($consulta, 0, 'ApellidoPaterno');
            $apm = mysql_result($consulta, 0, 'ApellidoMaterno');



        ?>

     <div class="col-sm-4">
            <?php

            echo"<br><br><br><br><div class='welcome'><h3>&nbsp;&nbsp;&nbsp;&nbsp;Welcome $nombre $app $apm.</h3></div><br>";

            ?>
            <div class="panel panel-primary">

            </div>
            <br>
            <div class="panel panel-primary">

                <div class="panel-body">
                   <div class='img_user' align="center"><img src="usuario.jpg"></div>
                </div>

            </div>
     </div>

     <div class="col-sm-4">
         <div class='img_user' align="center"><img src="bor1.jpg"></div>
     </div>

<?php

    //Incluímos el footer.
    require'footer.php';

    }
    else{
        echo"<script>alert(' No ha iniciado sesión.');
			location.href = 'Login.php';
			</script>";
    }

?>
</html>