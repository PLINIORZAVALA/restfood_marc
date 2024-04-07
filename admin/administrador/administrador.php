<?php
	@session_start();
	include_once '../conexion/conectar.php';
    include_once 'functions.php';
    include_once 'config.php';  
	include_once 'session_check.php';
	check_session();
	if(isset($_SESSION['codCli'])){
		$id_cli = $_SESSION['codCli'];
		$sql = "SELECT *FROM clientes WHERE codCli='".$id_cli."'";
		$query = $conector->query($sql);
		$cliente = array();
		while($row = $query->fetch_array()){
			$cliente = $row;
		}		
	}else{
		echo "
		<script type='text/javascript'>
			function redireccionar(){
			window.location='index.php'
			}
			setTimeout('redireccionar()',0);
		</script>";
	}
?>
<?php
function check_session() {
    if (!isset($_SESSION['codCli'])) {
        header("Location: index.php");
        exit;
    }
	
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINITRADOR DE CLIENTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 mt-4 card">				
				<div class="card-body">
				<h2 class="card-title">Tabla de cliente</h2>
					Nombre Completo: <?php echo $cliente['nomCli'].' '.$cliente['apeCli'];?><br>
					DNI: <?php echo $cliente['dniCli'];?><br>
					Genero: <?php if($cliente['sexCli'] == "M"){echo "Masculino";}else{echo "Femenino";}?><br>
					CORREO: <?php echo $cliente['emaCli'];?><br>
				</div>
				<div class="card-footer">
					<a href="functions/PHP_cerrar.php" class="btn btn-danger">Cerrar Session</a>
				</div>                
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>