<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';

    $errors = [];
    $messages = [];

    // Validar campos
    if(empty($_POST["nom"]) || !preg_match("/^[a-zA-Z\s]+$/", $_POST["nom"])){
        $errors[]="Ingrese el Nombre correctamente";
    }
    if(empty($_POST["app"]) || !preg_match("/^[a-zA-Z\s]+$/", $_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno correctamente";
    }
    if(empty($_POST["apm"]) || !preg_match("/^[a-zA-Z\s]+$/", $_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno correctamente";
    }
    if(empty($_POST["ema"]) || !filter_var($_POST["ema"], FILTER_VALIDATE_EMAIL)){
        $errors[]="Ingrese su email correctamente";
    }
    if(empty($_POST["doc"]) || !preg_match("/^\d{8}$/", $_POST["doc"])){
        $errors[]="Ingrese su dni correctamente (8 dígitos)";
    }
    if(empty($_POST["cel"]) || !preg_match("/^\d{9}$/", $_POST["cel"])){
        $errors[]="Ingrese su numero de celular correctamente (9 dígitos)";
    }
    if(empty($_POST["sex"])){
        $errors[]="Ingrese su genero";
    }

    // Solo proceder si no hay errores
    if(empty($errors)){
        $id = $_SESSION['codUsu'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $ema = $_POST["ema"];
        $doc = $_POST["doc"];
        $cel = $_POST["cel"];
        $sex = $_POST["sex"];
        $sql = "SELECT *FROM usuario WHERE codUsu='$id' or emaUsu ='$ema'";
        $consulta= $conector->query($sql);
        $uno_consulta=$consulta->num_rows;
        if($uno_consulta>1){
            $errors[]="Correo ya esta registrado, intenta con otro diferente";    
        }else{
            $sql = "SELECT *FROM usuario WHERE codUsu='$id' or emaUsu ='$ema' or docUsu='$doc'";
            $consulta= $conector->query($sql);
            $uno_consulta=$consulta->num_rows;
            if($uno_consulta>1){
                $errors[]="DNI ya esta registrado, intenta con otro diferente";    
            }else{    
                $sql = "UPDATE usuario SET nomUsu='".$nom."',appUsu='".$app."',apmUsu='".$apm."',docUsu='".$doc."',celUsu='".$cel."',sexUsu='".$sex."' WHERE codUsu='".$id."'";
                $update = $conector->query($sql);
                
                if($update){
                    // Procesar la foto si se subió
                    if(!empty($_FILES["foto"]['size'])){
                        $year = date('Y');
                        $mes = date('m');
                        $ruta = "assets/uploads";
                        $cadena = $ruta."/".$year."/".$mes."/"; //ruta para guardar el archivo
                        $folder = "../../".$cadena; //Folder donde estara el arcivo
                        //Crear folder si no existe
                        if (!file_exists($folder)) {
                            mkdir($folder, 0777, true);
                        }
                        $maxlimit = 90000000000000; // Máximo límite de tamaño (en bits)
                        $allowed_ext = "jpg,png,jpeg,gif"; // Extensiones permitidas (usad una coma para separarlas)
                        $overwrite = "yes"; // Permitir sobreescritura? (yes/no)
                        $match1 = "";  
                        $filesizeImagen = $_FILES['foto']['size']; // toma el tamaño del archivo
                        $filenameImagen = strtolower($_FILES['foto']['name']); // toma el nombre del archivo y lo pasa a minúsculas
                        $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                        $dir_img1 = $id.'_foto.'.$exten1;//renombrarlo
                        if($filesizeImagen < 1){ // el archivo está vacío
                            $errors[]= "La foto esta vacía.";
                        }elseif($filesizeImagen > $maxlimit){ // el archivo supera el máximo
                            $errors[]= "La <b>foto</b> supera el máximo tamaño permitido.";
                        }else{
                            $file_ext = preg_split("/\./",$filenameImagen); //verifica las extensiones
                            $allowed_ext = preg_split("/\,/",$allowed_ext); // ídem extensiones
                            foreach($allowed_ext as $ext){
                                if($ext==$file_ext[1]) $match1 = "1"; // Permite el archivo
                            }
                            // Extensión no permitida
                            if(!$match1){
                                $errors[]= "La imagen elegida no esta permitida: ";
                            }else{
                                if(move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$dir_img1)){
                                    $foto = $cadena.$dir_img1;
                                    $sql="UPDATE usuario SET imgUsu='".$foto."' WHERE codUsu='".$id."'";
                                    $query_update = $conector->query($sql);
                                    if ($query_update){
                                        $messages[] = "Evento Registrado con Éxito!.                                                       
                                                        <script type='text/javascript'>
                                                                        function redireccionar(){
                                                                            window.location='./';
                                                                        } 
                                                                        setTimeout ('redireccionar()', 3000);
                                                        </script>";
                                    } else{
                                        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
                                    }
                                }
                            }
                        }
                    }else{
                        $messages[]="Informacion Actualizada con Exito";
                    }
                }else{
                    $errors[]="No se actualizo tu perfil"; 
                }
            }
        }
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
