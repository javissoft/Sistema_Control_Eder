<?php

 require('Materia.php');
 require('conecbd.php');
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

    if(isset($_REQUEST['accion'])){
        $accion = $_REQUEST['accion'];
        $materia = $_REQUEST['materia'];
        $maestro = $_REQUEST['maestro'];

        if($materia != 0){
            $sql = "INSERT INTO maestro_materia (id_maestro, id_materia) VALUES ($maestro, $materia)";
            $consulta = mysql_query($sql)or die("Error de inserción");
        }

    }

    //Creamos un objeto
	echo"<div class=\"col-md-6\" align=center>
            <div class=\"panel panel-primary\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Profesores</h3>
                </div>
                <div class=\"panel-body\"><br/>";
    $materia = new Materia();

    $materia->seleccionaMaestro();
	echo"</br></div>
            </div>
        </div>";

  require('footer.php');





?>