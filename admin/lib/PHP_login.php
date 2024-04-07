<?php
@session_start(); // Iniciar o reanudar la sesión
error_reporting(0); // Ocultar errores de PHP
include_once '../conexion/conectar.php'; // Incluir archivo de conexión a la base de datos
include_once 'functions.php'; // Incluir archivo de funciones adicionales
include_once 'config.php'; // Incluir archivo de configuración

if(empty($_POST['email'])){
    $errors[] = "Ingrese el Correo"; // Mensaje de error si el campo de correo electrónico está vacío
} elseif(empty($_POST['password'])){
    $errors[] = "Ingrese la contraseña"; // Mensaje de error si el campo de contraseña está vacío
} else {
    $llave = $template['clave_publica']; // Obtener la clave pública de la plantilla

    // Obtener correo electrónico y contraseña del formulario y encriptar la contraseña
    $email = $_POST['email'];
    $password = encrypt($_POST['password'], $llave);

    // Consulta SQL para verificar si el correo electrónico o número de celular existen en la base de datos
    $sql = "SELECT * FROM usuario WHERE emaUsu='$email' OR celUsu='$email'";
    $consulta = $conector->query($sql);
    $correo_consulta = $consulta->num_rows;

    // Si no se encuentra ningún correo electrónico o número de celular en la base de datos, agregar un mensaje de error
    if($correo_consulta < 1){
        $errors[] = "El Correo o el numero de celular no es valido";
    } else {
        // Consulta SQL para verificar si el correo electrónico/número de celular y la contraseña coinciden en la base de datos
        $sql = "SELECT * FROM usuario WHERE (emaUsu='$email' OR celUsu='$email') AND pasUsu = '$password'";
        $consulta = $conector->query($sql);
        $pass_consulta = $consulta->num_rows;
        
        // Si no se encuentra ninguna coincidencia de contraseña, incrementar el contador de intentos de inicio de sesión
        if($pass_consulta < 1){
            $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
            $int_rest = 3 - $_SESSION['intentos'];
            
            // Si se exceden los intentos máximos, bloquear la cuenta del usuario en la base de datos
            if($int_rest < 0){                                                           
                $sql_est = "UPDATE usuario SET estUsu=0 WHERE emaUsu='$email'";
                $bloqueo = $conector->query($sql_est);
                
                // Si se bloquea correctamente, mostrar mensaje de error, de lo contrario, mostrar mensaje de error alternativo
                if($bloqueo){
                    $errors[] = "Usuario Bloqueado por el sistema";
                } else {
                    $errors[] = "No se puede bloquear al usuario";
                }
                unset($_SESSION['intentos']);
            } else {
                $errors[] = "La contraseña no es valida lo quedan ".$int_rest." intentos"; // Mensaje de error con intentos restantes
            }
        } else {
            // Si la contraseña coincide, iniciar sesión con éxito
            while($fila = $consulta->fetch_array()){
                $id_user = $fila['codUsu'];
                $nom_user = $fila['nomUsu'];
                $est_user = $fila['estUsu'];
                $pri_user = $fila['priUsu'];
            }
            
            // Si el estado del usuario es 1 (activo), continuar con el inicio de sesión
            if($est_user == 1){
                $reg = date("Y-m-d H:i:s");
                $clave_ul = generar_clave(11);
                $sql_insert = "INSERT INTO usuario_login (codUsu,regUL,claUL,estUL)
                VALUES ('".$id_user."','".$reg."','".$clave_ul."',1)";
                $insert = $conector->query($sql_insert);
                
                // Si se inserta correctamente en la tabla de inicio de sesión, establecer variables de sesión y redirigir al usuario
                if($insert){
                    $_SESSION['codUsu'] = $id_user; 
                    $_SESSION['priUsu'] = $pri_user; 
                    $messages[] = $nom_user;
                    
                    // Redirigir a la página de administrador o empleado según el tipo de usuario
                    if($pri_user == 1){ 
                        $url = "mod_admin/";
                        redireccionar($url);
                    } else {
                        $url = "mod_empleado/";
                        redireccionar($url);  
                    }
                    unset($_SESSION['intentos']);
                } else {
                    $errors[] = 'Sistema fallando'; // Mensaje de error si falla la inserción en la tabla de inicio de sesión
                }
            } else {
                $errors[] = "Usuario Bloqueado, contactarse con soporte tecnico"; // Mensaje de error si el usuario está bloqueado
            }
        }
    }
}

// Mostrar mensajes de error en un cuadro de alerta rojo si existen errores
if(isset($errors)){
    echo '<div class="alert alert-danger" role="alert">';
    echo '<b>Error</b>! ';
    foreach($errors as $error){
        echo $error;
    } 
    echo '</div>';
}

// Mostrar mensajes de éxito en un cuadro de alerta verde si existen mensajes
if(isset($messages)){
    echo '<div class="alert alert-success" role="alert">';
    echo '<b>bienvenido</b>! ';
    foreach($messages as $sms){
        echo $sms;
    } 
    echo '</div>';
}
?>
