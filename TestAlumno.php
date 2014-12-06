<?php
require('Alumno.php');
require('conecbd.php');
require('header.php');
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

    //Creamos un objeto
    $alumno = new Alumno();

    $alumno->muestraMaterias(4);

    echo"</div>";
?>
<?php
 require('footer.php');
?>

</html>