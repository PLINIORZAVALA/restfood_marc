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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>RESTAURANT |TIO 10 LUCAS</title>
	<link rel="icon" href="assets/images/descarga.png" type="image/x-icon">

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
	<?php include_once 'sections/content.php' ?>

	<!-- Footer -->
	
	<!-- MDBootstrap V5 -->
	<script src="restaurant/js/mdb.min.js" ></script>

	<!-- General scripts -->
	<script src="restaurant/js/main.js" ></script>
</body>
</html>