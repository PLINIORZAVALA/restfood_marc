<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
   // $hoy = date('Y-m-d');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
        // Hallar el stock disponible
        $sql ="SELECT *FROM usuario";
        $consulta = $conector->query($sql);
        $ver = $consulta->num_rows;
        if($ver<1){
            $error[]="No se registran <strong>usuarios en el Sistema</strong>";
        }else{
        ?>
            <table id="example" class="table table-striped table-bordered table-hover dt-responsive" style="width: 100%;">
                <thead>
                    <tr class="odd">
                        <th class="all text-center">Nro.</th>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Paterno</th>
                        <th class="text-center">Materno</th>
                        <th class="none">Materno</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($fila = $consulta->fetch_array()){
                    echo '
                        <tr>
                            <td class="text-center">'.$i.'</td>
                            <td class="text-center">'.$fila['codUsu'].'</td>
                            <td class="text-center">'.$fila['nomUsu'].'</td>
                            <td class="text-center">'.$fila['appUsu'].'</td>
                            <td class="text-center">'.$fila['apmUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['apmUsu'].'</td>
                        </tr>';
                    $i++;
                }
                ?>
                </tbody>
            </table>
        <?php
        }
    }
if(isset($error)){
    echo'<div class="alert alert-warning alert-dismissible text-center">
    <h5><i class="icon fas fa-exclamation-triangle"></i> Comunicado!</h5>';
        foreach($error as $err){
        echo $err;
    }
    echo'</div>';
}
if(isset($message)){
    echo'<div class="alert alert-success" role="alert">';
    echo '<b>Bien!</b> ';
    foreach($message as $sms){
        echo $sms;
    }
    echo '</div>';
}
?>