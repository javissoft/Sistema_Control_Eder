
<script src="js/jquery.min"></script>

<?php

        require('conecbd.php');
        require("Materia.php");
        require("header.php");

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
            <li ><a href=\"Bienvenido.php\">Bienvenido</a></li>
            <li ><a href=\"TestUsuario.php\">Usuarios</a></li>
            <li class=\"active\"><a href=\"TestMateria.php\">Profesore(s)</a></li>
            <li><a href=\"TestGrupo.php\">Alumno(s)</a></li>
            <li><a href=\"Cerrar_sesion.php\">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>";
	
        $maestro = $_POST['idmae'];

        //Creamos un objeto
		echo"<div class=\"col-md-6\" align=center>
            <div class=\"panel panel-primary\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Profesores</h3>
                </div>
                <div class=\"panel-body\"><br/>";
		
        $materia = new Materia();
        echo"<div class=\"alert alert-warning\" role=alert>";
        $materia->datosMaestro($maestro);
        echo"</div>";
		echo"<br><div class=\"panel panel-primary\">";
        $materia->materiasAsignadas($maestro);
         echo"</div>";
        $materia->asignarMateriaMaestro($maestro);
		
		echo"</br></div>
            </div>
        </div>";



require('footer.php');

?>