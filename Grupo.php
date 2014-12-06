<?php



class Grupo extends Usuario {



    public function muestraAlumnos(){

        echo"<div class=table-responsive>";
        echo"<table class=\"table table-bordered\">";
        echo"<thead><tr><th>#</th><th>Lista de Alumnos.</th></tr></thead><br><br>";

        $sql01 ="SELECT * FROM usuario WHERE Estatus=1 and Nivel=3 ORDER BY ApellidoPaterno ASC";
        $result01= mysql_query($sql01) or die ("Error $sql01");
        $cuantos = mysql_num_rows($result01);
        for($i = 0; $i < $cuantos; $i++){

            $id_alum=mysql_result($result01,$i,'id');
            $nombre=mysql_result($result01,$i,utf8_decode('Nombre'));
            $app=mysql_result($result01,$i,utf8_decode('ApellidoPaterno'));
            $apm=mysql_result($result01,$i,utf8_decode('ApellidoMaterno'));

            $sql2 = "SELECT * FROM alumno_grupo WHERE id_alumno=$id_alum";
            $consulta2 = mysql_query($sql2)or die("Error de consulta 2");
            $asignado = mysql_num_rows($consulta2);
            if($asignado == ""){
                echo"<tbody><tr><td><input type='checkbox' name='al$i' value='$id_alum'></td><td>&nbsp;&nbsp;$nombre &nbsp; $app &nbsp; $apm</td></tr>";
            }
            else{
                $id_grup = mysql_result($consulta2,0,'id_grupo');
                $sql3 = "SELECT * FROM grupo WHERE id_grupo=$id_grup";
                $consulta3 = mysql_query($sql3)or die("Error de consulta 3");
                $nombregrupo = mysql_result($consulta3,0,'nombre');

            echo"<tr><td colspan=2>$nombre &nbsp; $app &nbsp; $apm, &nbsp; asignado(a) al grupo $nombregrupo &nbsp; <a href='TestGrupo.php?id=$id_alum'>->Desasignar.</a></td></tr></tbody>";
            }
        }
       echo"<input type=hidden name=cuantos value=$cuantos>";
       echo"</div>";

}
    public function muestraGrupos(){

        echo"<div class=\"table-responsive sok_font\">";
        echo"<table class=\"table table-bordered\">";
        echo"<tr><td><select name=grupo>";
        $sql = "SELECT * FROM grupo WHERE estatus=1 ORDER BY nombre ASC";
        $consulta = mysql_query($sql)or die("Error de consulta");
        $cuantos = mysql_num_rows($consulta);
        for($i = 0; $i < $cuantos; $i++){
            $id_grupo = mysql_result($consulta,$i,'id_grupo');
            $nombre = mysql_result($consulta,$i,'nombre');


                echo"<option value=$id_grupo>$nombre</option>";

        }
        echo"</select></td>";
        echo"<tr>";
        echo"</table></div>";
    }
    public function asignarGrupos($id_alum, $nombregrupo){

        $sql = "INSERT INTO alumno_grupo (id_alumno, id_grupo) values ($id_alum, $nombregrupo)";
        $consulta = mysql_query($sql)or die("Error de insercion $sql");

    }
    public function eliminarGrupos($id_alum){

        $sql = "DELETE FROM  alumno_grupo WHERE id_alumno=$id_alum";
        $consulta = mysql_query($sql)or die("Error de eliminacion");

    }
}




