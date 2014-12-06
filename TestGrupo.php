<?php
require('Usuario.php');
require('Grupo.php');
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
            <li ><a href=\"Bienvenido.php\">Bienvenido</a></li>
            <li ><a href=\"TestUsuario.php\">Usuarios</a></li>
            <li><a href=\"TestMateria.php\">Profesore(s)</a></li>
            <li  class=\"active\"><a href=\"TestGrupo.php\">Alumno(s)</a></li>
            <li><a href=\"Cerrar_sesion.php\">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>";



    //Creamos un objeto
    $grupo = new Grupo();
echo"<div class=\"col-md-6\"></div>";
echo"<div class=\"col-sm-4\">";
//Solo si recibe el elemento del formulario 'add_alu_grup'//
if(isset($_REQUEST['add_alu_grup'])){
    //Recibimos la cantidad de alumnos.
    $cuantos=$_REQUEST['cuantos'];

    //Repetimos el proceso hasta $cuantos.
    for($y=0; $y < $cuantos; $y++){
        // Recibimos el checkbox de la posicion [$y].
        @$al=$_REQUEST["al$y"];

        //Va a llamar el método asignarGrupos sólo si el checkbox está lleno.
        if($al != ""){

            $grupo->asignarGrupos($al,$_REQUEST['grupo']);
        }
    }

    echo"<div class=\"alert alert-success\" role=\"alert\"> Alumno(s) agregados correctamente </div>";

}
//Solo si recibe el id a eliminar 'desasignar'.

if(isset($_REQUEST['id'])){
    //Mandamos a llamar al metodo de eliminarGrupos.
    $grupo->eliminarGrupos($_REQUEST['id']);

    echo"<div class=\"alert alert-warning\" role=\"alert\">Alumno Desasignados exitosamente</div>";

}
echo"</div>";

     //Creamos un formulario en el cual mostramos los alumnos y el combo dinamico de los grupos
echo"
         <div class=\"col-md-6\">
          <div class=\"panel panel-primary\" align=\"center\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Alumnos</h3>
            </div>
            <div class=\"panel-body\">";
               echo"<form action=TestGrupo.php method='Post'>";
                //Mostramos los lumnos ya sea asignados o desasignados de un grupo.
                $grupo->muestraAlumnos();
                //Mostramos el combo dinamico.
                 $grupo->muestraGrupos();
                //Elemento del formulario 'add_alu_grup'.
                echo"<input type='hidden' name='add_alu_grup'>";
                echo"<input type='submit' value='Agregar' class=\"btn btn-default\">";

                echo"</form>
            </div>
      </div>
      </div>";




    require('footer.php');

?>