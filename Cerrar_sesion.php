<?php

    setCookie('id',"");
    session_start();
    session_unset();
    session_destroy();

    print "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;

?>