<?php

class Usuario {

        private $Id;
        private $Nombre;
        private $ApellidoPaterno;
        private $ApellidoMaterno;
        private $Telefono;
        private $Calle;
        private $NumeroExterior;
        private $NumeroInterior;
        private $Colonia;
        private $Municipio;
        private $Estado;
        private $CP;
        private $Correo;
        private $Usuario;
        private $Contrasena;
        private $Nivel;
        private $Estatus;



    public function readUsuarioG(){

         
        $sql01 ="SELECT * FROM usuario WHERE Estatus=1 ORDER BY ApellidoPaterno ASC";
        $result01= mysql_query($sql01) or die ("Error $sql01");
		echo"<div class=\"col-md-6\">";
        echo"<div class=table-responsive>";
         echo"<table class=\"table table-bordered\">";
		 
            echo"<tr><td colspan=5 align='center'><strong>Lista de Usuarios</strong></td>";
            echo"<tr><th>Id</th><th>Nombre</th><th>Apellido P</th><th>Apellido M</th><th>Nivel</th></tr>";
        while($field= mysql_fetch_array($result01)) {

            $this->Id =$field['id'];
            $this->Nombre =utf8_decode($field['Nombre']);
            $this->ApellidoPaterno =utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno =utf8_decode($field['ApellidoMaterno']);
            $this->Nivel =$field['Nivel'];
            switch($this->Nivel){
                case 1;
                      $type= "Administrador";
                   break;
                case 2;
                      $type= "Maestro";
                    break;
                case 3;
                    $type= "Alumno";
                    break;
            }
            echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td> $this->Nivel</td>";
			 
        }
		echo"</table>";
		 echo"</div>";
    }

    public function readUsuarioS($id){

       /* echo"<br>readUsuarioS";*/
        $buscar01 ="SELECT * FROM usuario WHERE id='$id' ORDER BY ApellidoPaterno ASC";
        $resultado01= mysql_query($buscar01) or die ("Error $buscar01");
        echo"<div class=table-responsive>
        <table class=\"table table-bordered table-striped\" align='center'>
        <tr><td colspan=5 align='center'><strong><font color='#6495ed'>Lista de Usuarios</font></strong></td>
        <tr><th>Id</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nivel</th></tr>";

        while($field= mysql_fetch_array($resultado01)) {

            $this->Id =$field['id'];
            $this->Nombre =utf8_decode($field['Nombre']);
            $this->ApellidoPaterno =utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno =utf8_decode($field['ApellidoMaterno']);
            $this->Nivel =$field['Nivel'];
            switch($this->Nivel){
                case 1;
                    $type= "Administrador";
                    break;
                case 2;
                    $type= "Maestro";
                    break;
                case 3;
                    $type= "Alumno";
                    break;
            }
            echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td> $this->Nivel</td>";
        }
    }

    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){


        $insert01 ="INSERT INTO usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus)
                  Values ('$nombre','$apellidop','$apellidom','$nivel',1)";
        $execute01= mysql_query($insert01) or die ("Error $insert01");

    }

    public function updateUsuario($id,$nombre,$apellidop,$apellidom,$nivel){


        $update01 ="UPDATE usuario SET Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Nivel='$nivel' WHERE id= $id";
        $execute01= mysql_query($update01) or die ("Error $update01");
    }

    public function deleteUsuario($id){


        $delete01 ="DELETE FROM usuario WHERE id=$id";
        $execute01= mysql_query($delete01) or die ("Error $delete01");
    }
}

?>