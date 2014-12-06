<?php

require('Usuario.php');
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
            <li class=\"active\"><a href=\"TestUsuario.php\">Usuarios</a></li>
            <li><a href=\"TestMateria.php\">Profesore(s)</a></li>
            <li><a href=\"TestGrupo.php\">Alumno(s)</a></li>
            <li><a href=\"Cerrar_sesion.php\">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>";

           $usuario= new Usuario();




echo"<div class=\"table-responsive\"><br/>

        <div class=\"col-sm-4\" align=center>
            <div class=\"panel panel-primary\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Alta/Modificación</h3>
                </div>
                <div class=\"panel-body\">
                    <form name=alumno action='TestUsuario.php' method='Post'>
                        <table class=\"table table-bordered\" width='20%'>
                             <tr><td>Nombre(s):</td><td><input type=text name=nombre></td></tr>
                             <tr><td>Apellido Paterno:</td><td><input type=text name=apellidop></td></tr>
                             <tr><td>Apellido Materno:</td><td><input type=text name=apellidom></td></tr>
                             <tr><td>Nivel:</td><td><select name=nivel>
                                 <option value=1> Administrador</option>
                                 <option value=2> Maestro</option>
                                 <option value=3> Alumno</option>
                                 </select></td></tr>
                             <tr><td colspan=2 align=center><input type=submit name=submit value=Alta class=\"btn btn-primary\"></td></tr>
                             <tr><td colspan=2 align=center>ID: <INPUT type=text name=idm><input type=submit name=submit value=Modificar class=\"btn btn-default\"></td></tr>
                             <tr><td colspan=2 align=center>ID: <INPUT type=text name=idb><input type=submit name=submit value=Borrar class=\"btn btn-default\"></td></tr>
                             <tr><td colspan=2 align=center>ID: <INPUT type=text name=idbuscar><input type=submit name=submit value=Buscar class=\"btn btn-default\"></td></tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>";
		$usuario->readUsuarioG();
    echo"</div>";


if (isset($_POST['submit'])) {
    switch($_POST['submit']) {
        case "Alta":
            echo"<div class=\"col-md-6\">";
            echo"<div class=\"alert alert-success\" role=alert>";
            echo"<center><strong>Se Agrego exitosamente</strong></center>";
            echo "</div>";
            $usuario->createUsuario("$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]","$_POST[nivel]");
            echo"</div>";
            BREAK;
        case "Borrar":
            echo"<div class=\"col-md-6\">";
            echo"<div class=\"alert alert-danger\" role=alert>";
            echo"<center><strong>Se Eliminó exitosamente</strong></center>";
            echo "</div>";
            $usuario->deleteUsuario($_POST['idb']);
            echo"</div>";
            BREAK;
        case "Modificar":
            echo"<div class=\"col-md-6\">";
            echo"<div class=\"alert alert-warning\" role=alert>";
            echo"<center><strong>Se Actualizo exitosamente</strong></center>";
            echo "</div>";
            $usuario->updateUsuario($_POST['idm'],".$_POST[nombre].",".$_POST[apellidop]",".$_POST[apellidom]",".$_POST[nivel]");
            echo"</div>";
            BREAK;
        case "Buscar":
            echo"<div class=\"col-md-6\">";
            echo"<div class=\"alert alert-info\" role=alert>";
            echo" " . $_POST['submit']. ": " . " Se encontra&oacute;n los siguientes resultados: ";
            echo "<br/></div><br/>";
            $usuario->readUsuarioS($_POST['idbuscar']);
            echo"</div>";
            BREAK;

    }
	 

}

 

require('footer.php');

?>
