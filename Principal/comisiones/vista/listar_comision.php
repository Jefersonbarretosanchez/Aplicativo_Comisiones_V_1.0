<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $id_asesor = $_GET['id_asesor'];
    $sql = "SELECT `id_comision`,`id_asesor`,`fecha_calculo`, `mes`, `numero_ventas`,`estatus` FROM comisiones WHERE id_asesor = $id_asesor";
    $result = mysqli_query($con, $sql);

    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }

    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['Records'] = $rows;

    echo json_encode($jTableResult);
} catch (Exception $e) {
    $jTableResult = array();
    $jTableResult['Result'] = 'ERROR';
    $jTableResult['Message'] = $e->getMessage();
    echo json_encode($jTableResult);
}