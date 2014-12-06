<?php

    class TestLogin{

        public function Login(){
            echo"<div class=\"col-sm-4\">
                 </div>
                  <div class=\"col-sm-4\">
                     <div class=\"panel panel-primary\">
                         <div class=\"panel-heading\">
                            <h3 class=\"panel-title\"><em>Nota: Favor de llenar todos los campos.</em></h3>
                         </div>
                         <div class=\"panel-body\">
                             <form action='login.php' method='POST' name = 'frmdo' id = 'frmdo' target = '_self'>
                                  <table class=\"table table-bordered\" align='center'>
                                      <tr><td>*Usuario:</td></td><td><input type='text' name='user' class='label_user' placeholder='Usuario'></td></tr>
                                      <tr><td>*Password:</td><td><input type='password' name='pass' class='label_pass' placeholder='Password'></td></tr>
                                      <tr><td colspan=2 align=center><input type='submit' value='Iniciar' class=\"btn btn-primary\" ></td></tr>
                                  </table>
                             </form>
                             <br/><center><div id = 'msg' class='ajax_login'></div></center></div>
                         </div>
                     </div>
                  </div>";

        }


    }
?>