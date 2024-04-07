<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Restaurant</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="restaurant/css/normalize.css">

	<!-- MDBootstrap V5 -->
	<link rel="stylesheet" href="restaurant/css/mdb.min.css">

	<!-- Font Awesome V5.15.1 -->
	<link rel="stylesheet" href="restaurant/css/all.css">

	<!-- Sweet Alert V10.13.0 -->
	<script src="restaurant/js/sweetalert2.js" ></script>

	<!-- General Styles -->
	<link rel="stylesheet" href="restaurant/css/style.css">
</head>

<body>
	<!-- Header -->
	<?php include_once 'sections/header.php' ?>

	<!-- Content -->
	<div class="container container-web-page">
	    <h3 class="font-weight-bold poppins-regular text-uppercase">Crear cuenta</h3>
	    <p class="text-justify">Al crear una cuenta en nuestro sitio web usted acepta nuestros <a href="#">términos y condiciones</a>. La información introducida en el formulario debe de ser clara, precisa y legitima. Para crear una cuenta debe de llenar todos los campos que son obligatorios marcados con el icono <i class="fab fa-font-awesome-alt"></i></p>
	    <hr>
	    <div class="row">
	        <div class="col-12">
			    <form id="register_php" class="form-horizontal form-bordered form-control-borderless">
	                <fieldset>
				        <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
	                    <div class="container-fluid">
	                        <div class="row">
	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="text"  class="form-control" name="nom" id="nom">
	                                    <label for="nom" class="form-label">Nombres <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>
								
 	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="text" class="form-control" name="app_Cli" id="app_Cli">
	                                    <label for="app_Cli" class="form-label">Apellido Paterno <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>

								<div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="text" class="form-control" name="apm_Cli" id="apm_Cli">
	                                    <label for="apm_Cli" class="form-label">Apellido Materno  <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>

	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="text" class="form-control" name="cel" id="cel">
	                                    <label for="cliente_telefono" class="form-label">N° Celular <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>
								<div class="col-12 col-md-6">
	                                <div class="">
									<label class="radio-inline">
                                        <input class="form-check-input" type="radio" name="sexo"  value="M">
                                            Masculino
                                    </label>   
                                    <label class="radio-inline">
                                        <input class="form-check-input" type="radio" name="sexo"  value="F">
                                        	Femenino
                                    </label> 
	                                <label for="cliente_tipo_documento" class="form-label"></label>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </fieldset>

	                <fieldset>
	                    <legend><i class="fas fa-map-marked-alt"></i> &nbsp; Información de envió</legend>
	                    <div class="container-fluid">
	                        <div class="row">
	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="text" class="form-control" name="dir" id="dir">
	                                    <label for="cliente_direccion" class="form-label">Direccion <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </fieldset>

	                <fieldset>
	                    <legend><i class="fas fa-user-lock"></i> &nbsp; Información de inicio de sesión</legend>
	                    <div class="container-fluid">
	                        <div class="row">
	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="email" class="form-control" name="email" id="email" maxlength="47">
	                                    <label for="cliente_email" class="form-label">Email <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>
	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="password" class="form-control" name="pass1" id="pass1">
	                                    <label for="cliente_clave_1" class="form-label">Contraseña <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>
	                            <div class="col-12 col-md-4">
	                                <div class="form-outline mb-4">
	                                    <input type="password" class="form-control" name="pass2" id="pass2">
	                                    <label for="cliente_clave_2" class="form-label">Repetir contraseña <i class="fab fa-font-awesome-alt"></i></label>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </fieldset>
					<div id="div_login" class="col-xs-12"></div>
	                <p class="text-center" style="margin-top: 40px;">
	                    <button type="submit" class="btn btn-info btn-sm"><i class="far fa-paper-plane"></i> &nbsp; CREAR CUENTA</button>
	                </p>
	                <p class="text-center">
	                    <small>Los campos marcados con <i class="fab fa-font-awesome-alt"></i> son obligatorios</small>
	                </p>
	            </form>
	        </div>
	    </div>
	</div>
	<!-- Footer -->
	
	<!-- MDBootstrap V5 -->
	<script src="restaurant/js/mdb.min.js" ></script>

	<!-- General scripts -->
	<script src="restaurant/js/main.js" ></script>
	<!-- General scripts -->
	<script src="restaurant/js/main.js" ></script>

   <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
	<script src="admin/assets/template/admin/js/vendor/jquery.min.js"></script>
	<script src="admin/assets/template/admin/js/vendor/bootstrap.min.js"></script>
	<script src="admin/assets/template/admin/js/plugins.js"></script>
	<script src="admin/assets/template/admin/js/app.js"></script>
   <script src="admin/assets/template/admin/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
   <script src="register.js?v=230823"></script>
</body>
</html>