<?php
// Inicio de PHP
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../conexion/conectar.php';

if (!empty($_SESSION['codUsu'])) {
    $priv_user = $_SESSION['priUsu'];
    $id_user = $_SESSION['codUsu'];
    if ($priv_user <> 1) {
        redireccionar2("../mod_empleado/");
    }
    $doc = 'productos.pdf';
} else {
    redireccionar2("../");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>prueba</title>
    <style>
        body {
            width: 95%;
            margin: auto;
            font-family: "helvetica";
            font-size: 16px;
            color: #444;
        }

        table {
            width: 90%;
        }

        .wrapper-page {
            page-break-after: always;
        }

        .wrapper-page:last-child {
            page-break-after: avoid;
        }
    </style>
</head>

<body>
<div class="wrapper-page">
    <center><strong>Reporte Ventas</strong></center>
    <hr>
    <table>
        <thead>
        <tr>
            <th>Nro</th>
            <th>Cliente</th>
            <th>Pedido</th>
            <th>cantidad</th>
            <th>Precio Cantidad</th>
        </tr>
        </thead>
        <tbody>
        <?php
 $sql = "SELECT c.nomCli AS nomUsu, p.nomProd, SUM(dp.cantProd) AS cantidad_total, SUM(dp.totalProd) AS costo_total
 FROM cliente c
 INNER JOIN pedido pe ON c.codCli = pe.codCli
 INNER JOIN detalle_pedido dp ON pe.codPedi = dp.codPedi
 INNER JOIN producto p ON dp.codProd = p.idProd
 GROUP BY c.nomCli, p.nomProd
 ORDER BY cantidad_total DESC
 LIMIT 5;";
$query = $conector->query($sql);
$i = 1;
$total_costo = 0; // Variable para almacenar el costo total de todos los productos vendidos
while ($fila = $query->fetch_array()) {
    echo '<tr>';
    echo '<td>' . $i . '</td>';
    echo '<td>' . $fila['nomUsu'] . '</td>';
    echo '<td>' . $fila['nomProd'] . '</td>';
    echo '<td>' . $fila['cantidad_total'] . '</td>';
    echo '<td>' . $fila['costo_total'] . '</td>';
    echo '</tr>';
    $i++;
    $total_costo += $fila['costo_total']; // Suma el costo total de cada producto
}
// Agrega una fila al final de la tabla para mostrar el costo total de todos los productos vendidos
echo '<tr>';
echo '<td colspan="4"><strong>Costo total: </strong></td>';
echo '<td>' . $total_costo . '</td>'; // Muestra el costo total
echo '</tr>';
        ?>
        </tbody>
    </table>
    <br>
    <center>Abancay, <?php echo fechaEs(date('Y-m-d')); ?></center>
</div>

</body>
</html>

<?php
require_once '../../assets/dompdf/autoload.inc.php'; // Ubicación de la librería
use Dompdf\Dompdf;
function fechaEs($fecha) {
    setlocale(LC_ALL, 'es_ES');
    return strftime("%d de %B de %Y", strtotime($fecha));
}
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$filename = $doc;
$dompdf->stream($filename);
ob_end_flush();
?>