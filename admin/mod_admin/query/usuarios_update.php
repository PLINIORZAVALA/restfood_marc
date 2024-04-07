<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
      
    $errors = [];
    $messages = [];

    // Validar campos
    if(empty($_POST["id"])){
        $errors[]="Seleccione el Registro";
    }
    if(empty($_POST["nom"]) || !preg_match("/^[a-zA-Z\s]+$/", $_POST["nom"])){
        $errors[]="Ingrese el Nombre correctamente";
    }
    if(empty($_POST["app"]) || !preg_match("/^[a-zA-Z\s]+$/", $_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno correctamente";
    }
    if(empty($_POST["apm"]) || !preg_match("/^[a-zA-Z\s]+$/", $_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno correctamente";
    }
    if(empty($_POST["sexo"])){
        $errors[]="Seleccione el Genero";
    }
    if(empty($_POST["doc"]) || !preg_match("/^\d{8}$/", $_POST["doc"])){
        $errors[]="Ingrese el Nro. de Documento correctamente (8 dígitos)";
    }
    if(empty($_POST["cel"]) || !preg_match("/^\d{9}$/", $_POST["cel"])){
        $errors[]="Ingrese el nro. de Celular correctamente (9 dígitos)";
    }
    if(empty($_POST["mail"]) || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
        $errors[]="Ingrese el Correo Electronico correctamente";
    }
    if(empty($errors)){
        $id = $_POST['id'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $doc = $_POST["doc"];
        $sexo = $_POST["sexo"];
        $cel = $_POST["cel"];
        $mail = $_POST["mail"];
        
        
        if (preg_match("/^[0-9]{8}$/", $doc)) {
            if($doc > 0){
            $sql = "SELECT *FROM usuario WHERE docUsu='".$doc."' AND codUsu<>'".$id."'";
            $query = $conector->query($sql);
            $exit_doc = $query->num_rows;
                if($exit_doc>0){
                        $errors[]="El Nro. de documento ya pertenece a otro usuario";
                }else{
                        $sql = "SELECT *FROM usuario WHERE emaUsu='".$mail."' AND codUsu<>'".$id."'";
                        $query = $conector->query($sql);
                        $exit_mail = $query->num_rows;
                        if($exit_mail>0){
                            $errors[]="El Correo ya pertenece a otro usuario";
                        }else{
                            if (preg_match("/^[0-9]{9}$/", $cel)) {
                            $sql = "SELECT *FROM usuario WHERE celUsu='".$cel."' AND codUsu<>'".$id."'";
                            $query = $conector->query($sql);
                            $exit_cel = $query->num_rows;
                                if($exit_cel>0){
                                    $errors[]="El Celular ya pertenece a otro usuario";
                                }else{
                                    $sql ="UPDATE usuario SET nomUsu = '".$nom."', appUsu = '".$app."',apmUsu = '".$apm."',
                                    docUsu = '".$doc."',emaUsu = '".$mail."',celUsu = '".$cel."',
                                    sexUsu = '".$sexo."' WHERE codUsu='".$id."'";
                                    $update = $conector->query($sql);
                                    if($update){
                                        $messages[]= "Datos actualizados correctamente";
                                    }else{
                                        $errors[]="No se actualizo la contraseña"; 
                                    }
                                }
                            }else{
                                // El Numero de celular no es válido
                                $errors[]="Ingrese un Numero de celular válido de 9 dígitos";   
                            } 
                        }   
                    } 
                }
            }else{
                // El DNI no es válido
                $errors[]="Ingrese un DNI válido de 8 dígitos";
            }
        }else{
            $errors[]="Error Desconocido";
        }

    if(isset($errors)){
        echo '<div class="alert alert-danger" role="alert">';
              foreach($errors as $error){
                    echo $error;
              } 
        echo '</div>';
    }

    if(isset($messages)){
        echo '<div class="alert alert-success" role="alert">';
              foreach($messages as $sms){
                    echo $sms;
              } 
        echo '</div>';
    }
?>