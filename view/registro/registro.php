<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>
        <!--        <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="../web/../login/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../login/css/util.css">
        <link rel="stylesheet" type="text/css" href="../login/css/main.css">
        <!--===============================================================================================-->
    </head>
    <style>

        .centrar
        {
            position: absolute;
            /*nos posicionamos en el centro del navegador*/
            top:25%;
            left:50%;
            /*determinamos una anchura*/

            /*indicamos que el margen izquierdo, es la mitad de la anchura*/
            margin-left:-200px;
            /*determinamos una altura*/

            /*indicamos que el margen superior, es la mitad de la altura*/
            margin-top:-150px;
            border:5px solid #808080;
            padding:10px;
        }
    </style>
    <body style="background: #000000">
        <div  class="limiter" >
            <div style="background: #ffffff">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../web/index.html" class="active">Inicio</a></li>
                </ul>	
                <div class="clearfix"> </div>	
            </div>
            <div class="container-login100" style="background-image: url('../web/images/2.jpg')">
                <div class="wrap-login100"> 
                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="../../controller/controller.php">
                        <span class="login100-form-title">
                            Registro de Nuevo Usuario
                        </span>
                        <table>
                            <tr>
                            <input type="text" name="cedula" placeholder="Ingrese su cedula" class="input100" required="" maxlength="10" minlength="10">
                            </tr>
                             <tr><br>
                            <input type="text" name="apellidos" placeholder="Ingrese sus apellidos" class="input100" required="">
                            </tr>
                            <tr><br>
                            <input type="text" name="nombres" placeholder="Ingrese sus nombres" class="input100" required="">
                            </tr>                    
                            <tr><br>
                            <input type="email" name="correo"placeholder="Ingrese su correo" class="input100"required="">
                            </tr>
                            <tr><br>
                            <label style="color: #808080"> Fecha Nacimiento:</label><input type="date" name="fechanac"placeholder="Ingrese su fecha de nacimiento aaaa/mm/dd" class="input100"required=""> 
                            </tr>
                            <tr><br>
                            <input type="tel" name="celular"placeholder="Ingrese su telefono"class="input100"required="" maxlength="13" minlength="10">
                            </tr>
                            <tr><br>
                            <input type="password" name="clave"placeholder="Ingrese su clave"class="input100"required="">
                            </tr>
                            <tr><br>

                            <input type="hidden" name="opcion" value="registro">
                            <input type="submit" value="Registrarse" class="login100-form-btn">

                            <div class="container-login100-form-btn">
                                <span class="txt1 p-b-9" >
                                    <br>
                                    ¿Tienes una Cuenta?
                                    <a href="../login/login.php"> Iniciar Sesión</a>
                                <br>
                                </span>
                                
                            </div>

                            </tr>
                            <tr>
                            
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="../login/js/main.js"></script>
    </body>
</html>
