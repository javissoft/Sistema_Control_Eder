<script src="js/jquery.min.js"></script>
<?php
    //Incluímos librerías y archivos necesarios.
    require 'header.php';
    require 'TestLogin.php';

    $login = new TestLogin();

    $login->Login();

    require 'footer.php';
?>
    <script type = "text/JavaScript">
        //Funcion la cual detiene el submit, carga al div ajax una imagen gif y posteriormente manda llamar al archivo validando.php.
        $(function (e) {
            $('#frmdo').submit(function (e) {
                e.preventDefault()
                $('.ajax_login').html("<br><img src='espera.gif' width='60' height='60' />");

                $('.ajax_login').load('validar.php?' + $('#frmdo').serialize())
            })
        })
    </script>