<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
       if(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre";
    } elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["nom"])){
        $errors[]="El Nombre solo debe contener letras";
    }

    if(empty($_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno";
    } elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["app"])){
        $errors[]="El Apellido Paterno solo debe contener letras";
    }

    if(empty($_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno";
    } elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["apm"])){
        $errors[]="El Apellido Materno solo debe contener letras";
    }

    if(empty($_POST["cel"])){
        $errors[]="Ingrese el nro. de Celular";
    } elseif(!preg_match("/^[0-9]{9}$/", $_POST["cel"])){
        $errors[]="Ingrese N° Celular válido de 9 dígitos";
    }

    if(empty($_POST["dir"])){
        $errors[]="Ingrese Su direccion";
    } elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["dir"])){
        $errors[]="La dirección solo debe contener letras";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["app"]) &&
        !empty($_POST["apm"])
    ){
        $clave = $template['clave_publica'];
        $id = $_SESSION['codUsu'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $ema = $_POST["ema"];
        $cel = $_POST["cel"];
        $sexo = $_POST["sexo"];
        $dir = $_POST["dir"];
        $est = 1;
        $img = "assets/img/noimagen.jpg";
        $reg = date("Y-m-d H:i:s");
        $pass=encrypt($cel,$clave);
        $sql = "SELECT * FROM cliente WHERE  emaCli ='$ema'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){
                $errors[]="Correo  ya esta registrado, intenta con otro diferente";    
            }else{
                $sql = "SELECT * FROM cliente WHERE  emaCli ='$ema' OR  celCli='$cel'";
                $consulta2= $conector->query($sql);
                $verificarDoc=$consulta2->num_rows;
                    if($verificarDoc>0){
                        $errors[]="N° Celular  ya esta registrado, intenta con otro diferente";    
                    }else{
                        // Validar la dirección de correo electrónico
                        if (filter_var($ema, FILTER_VALIDATE_EMAIL)) {
                            // Verificar que solo sean números de 9 dígitos
                            if (preg_match("/^[0-9]{9}$/", $cel)) {
                                $sql = "INSERT INTO cliente (nomCli,appCli,apmCli,
                                    emaCli,celCli,sexCli,dirCli, pasCli,estCli,imgCli,regCli) VALUES
                                    ('".$nom."','".$app."','".$apm."','".$ema."'
                                    ,'".$cel."','".$sexo."','".$dir."','".$pass."'
                                    ,'".$est."','".$img."','".$reg."')";
                                $insert = $conector->query($sql);
                                if($insert===TRUE){
                                    $messages[]= "Ingreso los datos correctamente";
                                }else{
                                    $errors[]="No se actualizo los datos"; 
                                }
                            }else {
                                // El DNI no es válido
                                $errors[]="Ingrese N° Celular válido de 9 dígitos";
                            }
                        } else {
                            // El correo electrónico no es válido
                            $errors[]= "Ingrese una dirección de correo electrónico válida";
                        }
                    }           
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