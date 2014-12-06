<?php



class Materia {

    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;


    public function readMateriaG(){

        echo"<br>readMateriaG";

    }

    public function readMateriaS(){

        echo"<br>readMateriaS";

    }


    public function createMateria(){

        echo"<br>createMateria";


    }

    public function updateMateria(){

        echo"<br>updateMateria";

    }

    public function deleteMateria(){

        echo"<br>deleteMateria";

    }

    public function seleccionaMaestro(){

        echo"<div class=table-responsive>";
        echo"<form action=ajax.php method=Post name=maestro>";
        echo"<table class=\"table  table-bordered col-md-6\" align=center>";
	
        echo"<tr><td>Maestro:</td><td><select name=idmae>";
        $sql01 ="SELECT * FROM usuario WHERE Estatus=1 and Nivel=2 ORDER BY ApellidoPaterno ASC";
        $result01= mysql_query($sql01) or die ("Error $sql01");
        while($field= mysql_fetch_array($result01)) {

           $id_maestro=$field['id'];
           $opcion=utf8_decode($field['id'].") ".'&nbsp;&nbsp;'." ".$field['ApellidoPaterno']."  ".$field['ApellidoMaterno']."  ".$field['Nombre']);
            echo "<option value=$id_maestro>$opcion</option>";

       }

      echo"</select></td></tr>";
      echo"<tr><td colspan=2 align=center>
                <br><input type=submit id=submit value=Seleccionar class=\"btn btn-primary\"></td></tr>";
      echo"</table>";
      echo"</form>";
      echo"</div>";

}

    public function datosMaestro($id_maestro){

        $sql04="select * from usuario where id=$id_maestro";
        $result04= mysql_query($sql04) or die ("Error $sql04");
        $existe=mysql_num_rows($result04);
        if($existe > 0) {
            $nombre = $id_maestro ." ) ";
            $nombre .=mysql_result($result04, 0, 'ApellidoPaterno');
            $nombre .= " " .mysql_result($result04, 0, 'ApellidoMaterno');
            $nombre .= " " .mysql_result($result04, 0, 'Nombre');
            $nombre =utf8_decode($nombre);
            echo "Maestro Seleccionado: <strong> ".'&nbsp;&nbsp;'." " .$nombre. "  </strong>";

        }
    }

    public function materiasAsignadas($maestro){
        echo"<div class='table-responsive sok_font'>";
        echo"<table class=\"table table-bordered table-striped\" align=center>";
        $sql = "SELECT * FROM maestro_materia WHERE id_maestro=$maestro";
        $consulta = mysql_query($sql)or die("Error de consulta");
        $cuantos = mysql_num_rows($consulta);
        for($i = 0; $i < $cuantos; $i++){
            $id_mat = mysql_result($consulta,$i,'id_materia');

            $sql2 = "SELECT * FROM materia WHERE id=$id_mat";
            $consulta2 = mysql_query($sql2)or die("Error de consulta 2");
            $materia = mysql_result($consulta2, 0, 'nombre');
            echo"<tr>";
            echo"<td>$materia</td><td><a href='Eliminar.php?id=$id_mat'>Eliminar</a></td>";
            echo"</tr>";
        }
        echo"</table></div>";
    }

    public function asignarMateriaMaestro($maestro){
        echo"<div class='table-responsive sok_font'>";
        echo"<br><table class=\"table  table-bordered\" align=center>";
        echo"<form action=TestMateria.php method=POST name=materias>";
        echo"<tr><th colspan=2><div align=center>Asignar Nuevas Materias.</div></th></tr>";
        echo"<tr><td>Materia:</td><td><select name=materia>";
        $sql = "SELECT * FROM materia WHERE estatus=1 ORDER BY nombre ASC";
        $consulta = mysql_query($sql)or die("Error de consulta");
        $cuantos = mysql_num_rows($consulta);
        for($i = 0; $i < $cuantos; $i++){
            $id_mat = mysql_result($consulta,$i,'id');
            $nombre = mysql_result($consulta,$i,'nombre');

            $sql2 = "SELECT * FROM maestro_materia WHERE id_maestro=$maestro AND id_materia=$id_mat";
            $consulta2 = mysql_query($sql2)or die("Error de consulta 2");
            $cuantos2 = mysql_num_rows($consulta2);
            if($cuantos2 > 0){
                echo"<option value=0>No disponible</option>";
            }
            else{
                echo"<option value=$id_mat>$nombre</option>";
            }
        }
        echo"</select></td>";
        echo"<tr>";
        echo"<input type=hidden id=accion name=accion value=1>";
        echo"<input type=hidden id=maestro name=maestro value=$maestro>";
        echo"</tr>";
        echo"<tr><td colspan=2 align=center><input type=submit value=Agregar class=\"btn btn-primary\"></td></tr>";
        echo"</form></table></div>";
    }




}