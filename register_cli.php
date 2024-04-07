<?php

@session_start();
error_reporting(0);
include_once 'admin/conexion/conectar.php';
include_once 'lib/functions.php';
include_once 'lib/config.php';    

if(empty($_POST["nom"])){
    $errors[]="Ingrese el Nombre";
}elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["nom"])){
    $errors[]="El Nombre solo debe contener letras y espacios";
}elseif(empty($_POST["app_Cli"])){
    $errors[]="Ingrese el apellido Paterno";
}elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["app_Cli"])){
    $errors[]="El apellido Paterno solo debe contener letras y espacios";
}elseif(empty($_POST["apm_Cli"])){
    $errors[]="Ingrese el apellido Materno";
}elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["apm_Cli"])){
    $errors[]="El apellido Materno solo debe contener letras y espacios";
}elseif(empty($_POST["cel"])){
    $errors[]="Ingrese el nuemro de celular";
}elseif(empty($_POST["sexo"])){
    $errors[]="Marque su genero";
}elseif(empty($_POST["dir"])){
    $errors[]="Ingrese su direccion";
}elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["dir"])){
    $errors[]="La dirección solo debe contener letras y espacios";
}elseif(empty($_POST["email"])){
    $errors[]="Ingrese el correo electronico";
}elseif(empty($_POST["pass1"])){
    $errors[]="Ingrese su contraseña";
}elseif(empty($_POST["pass2"])){
    $errors[]="Repetir contraseña es obligatorio";
}elseif(
    !empty($_POST["nom"]) &&
    !empty($_POST["app_Cli"]) &&
    !empty($_POST["apm_Cli"])
){
    $nom = $_POST["nom"];
    $app_Cli = $_POST["app_Cli"];
    $apm_Cli = $_POST["apm_Cli"];
    $cel = $_POST["cel"];
    $sexo = $_POST["sexo"];
    $dir = $_POST["dir"];
    $email = $_POST['email'];
    $est = 1;
    $img = "assets/uploads/2023/05/perfil.png";
    $llave = $template['clave_publica'];
    $pass1 = $_POST["pass1"];//Nueva Contraseña
    $pass2 = $_POST["pass2"];//Repite Contraseña Nueva
    $reg = date("Y-m-d H:i:s");
        if($pass1 == $pass2){
        $password = encrypt($_POST['pass1'], $llave);

        $sql = "SELECT * FROM cliente WHERE  celCli='$cel'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/", $pass1)){
            $errors[]="La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número, un carácter especial y tener una longitud mínima de 6 caracteres";
        }else{
                $sql = "SELECT * FROM cliente WHERE  celCli='$cel' OR emaCli ='$email'";
                $consulta2= $conector->query($sql);
                $verificarEma=$consulta2->num_rows;
                if($verificarEma>0){
                    $errors[]="Correo  ya esta registrado, intenta con otro diferente";    
                }else{
                    $password = encrypt($_POST['pass1'], $llave);
                    // Validar la dirección de correo electrónico
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // Verificar que solo sean números de 9 dígitos
                        if (preg_match("/^[0-9]{9}$/", $cel)) {
                            
                                $sql = "INSERT INTO cliente (nomCli,appCli,apmCli,
                                    emaCli,celCli,sexCli,dirCli,pasCli,estCli,imgCli,regCli) VALUES
                                    ('".$nom."','".$app_Cli."','".$apm_Cli."','".$email."'
                                    ,'".$cel."','".$sexo."','".$dir."','".$password."'
                                    ,'".$est."','".$img."','".$reg."')";
                                    $insert = $conector->query($sql);
                                        if($insert===TRUE){
                                            $messages[]= "Ingreso los datos correctamente";
                                            }else{
                                                $errors[]="No se registro los datos"; 
                                            }             
                        }else {
                            // El N° no es válido
                            $errors[]="Ingrese N° Celular válido de 9 dígitos";
                        }
                    } else {
                        // El correo electrónico no es válido
                        $errors[]= "Ingrese una dirección de correo electrónico válida";
                    }
                }
            } 
        }else{
            $errors[]="Las contraseñas no son iguales"; 
        }                       
        }else{
            $errors[]="Error Desconocido";
        }
    
    if(isset($errors)){
        echo '<div class="alert alert-danger" role="alert">';
        echo '<b>Error</b>! ';
              foreach($errors as $error){
                    echo $error;
              } 
        echo '</div>';
    }

    if(isset($messages)){
        echo '<div class="alert alert-success" role="alert">';
        echo '<b>Bien</b>! ';
              foreach($messages as $sms){
                    echo $sms;
              } 
        echo '</div>';
    }
?>