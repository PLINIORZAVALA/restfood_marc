<?php 
    @session_start();
	include_once 'admin/conexion/conectar.php';
    include_once 'lib/config.php';
    include_once 'lib/functions.php';
    if(!empty($_SESSION['codCli'])){
        if($_SESSION['estCli']==1){
            $url = "restaurant_main/";
            redireccionar2($url);        
        }else{
            $url = "restaurant_main/";
            redireccionar2($url);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Inicio de sesión</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="login/css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="login/css/fontawesome.css">
   <link rel="stylesheet" href="login/css/all.min.css">
   
   
</head>
<body class="bg-light">
   <div class="container mt-5">
      <div class="row justify-content-center">
         <div class="col-lg-4 col-md-6">
            <div class="card card-transparent shadow-lg p-3 mb-5 bg-white rounded">
               <div class="card-body">
                  <h2 class="card-title text-center">BIENVENIDO</h2>
                  <form id="login_php" class="form-horizontal form-bordered form-control-borderless">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                           </div>
                           <input id="email" type="text" class="form-control" name="email" placeholder="Ingrese su correo">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                           </div>
                           <input type="password" id="input" class="form-control" name="pass" placeholder="Contraseña">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="showPassword">
                           <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
                        </div>
                     </div>
                     <div id="div_login" class="col-xs-12"></div>
                     <input name="submit" class="btn btn-primary btn-block" type="submit" value="INICIAR SESIÓN">
                     <div class="text-center mt-3">
                        <a id="forgotPasswordLink" class="font-italic isai5" href="#" data-form-id="forgotPasswordForm">Olvidé mi contraseña</a>
                        <div id="forgotPasswordForm" style="display: none;">
                           <h5>Recuperación de contraseña</h5>
                           <input type="text" id="forgotEmail" class="form-control" placeholder="Correo Electrónico">
                           <input type="button" id="submitForgotPassword" class="btn btn-secondary btn-block mt-2" value="Enviar solicitud">
                        </div>
                        <a class="font-italic isai5" href="registration.php">Registrarse</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="login/js/fontawesome.js"></script>
   <script src="login/js/main.js"></script>
   <script src="login/js/main2.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <?php include_once 'foot.php'?>
</body>
</html>
