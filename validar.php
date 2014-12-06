<?php

header("Content-Type: text/html;charset=utf-8");

//Llama conexión a BD.
include ('conecbd.php');

//Se recibe el usuario y la contraseña.
$user = $_REQUEST['user'];
$psw = $_REQUEST['pass'];

$band = 1;

if($user == "" OR $psw == ""){
    $band = 0;
    //Si no se introdujo algun valor manda un mensaje de error al login.
    echo"<div class=\"alert alert-danger\" role=\"alert\">Llenar todos los campos antes de continuar </div><br/>";
    exit;
}

$sql = "SELECT * FROM usuario WHERE Usuario ='".mysql_real_escape_string($user)."' AND Contrasena ='".mysql_real_escape_string($psw)."'";
$consulta = mysql_query($sql)or die("Error de consulta");
$cuantos = mysql_num_rows($consulta);
if($cuantos == 0){
    $band = 0;
    //Si no encuentra coincidencias en la base de datos manda un mensaje de error al login.
    echo "<div class=\"alert alert-danger\" role=\"alert\">Usuario ó Password no válidos </div><br/>";
    exit;
}

if($band == 1){
    //Si todo es válido envía a la pantalla principal del sistema correcto.php.
    $id = mysql_result($consulta, 0, 'id');

    //Se crea una cookie e inicia sesión de usuario.
    setCookie('id', $id);
    session_start();

    $_SESSION["sesionUsuario"] = $_REQUEST['user'];
    ?>
    <script type='text/JavaScript'>
        $(function () {
            window.location="Bienvenido.php";
        })
    </script>

    <?php
    exit;
}

?>