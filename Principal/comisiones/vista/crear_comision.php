<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $cc_id_asesor = $_POST['id_asesor'];
    $cc_fecha_calculo = $_POST['fecha_calculo'];
    $cc_mes = $_POST['mes'];
    $cc_numero_ventas = $_POST['numero_ventas'];
    $cc_estatus=$_POST['estatus'];
    $sql = "INSERT into comisiones(id_asesor,fecha_calculo,mes,numero_ventas,estatus) values ('$cc_id_asesor','$cc_fecha_calculo','$cc_mes','$cc_numero_ventas','$cc_estatus')";
    $result = mysqli_query($con, $sql);

    $row = mysqli_insert_id($con);

    $jTableResult = array();
    $jTableResult['Result'] = 'OK';
    $jTableResult['Record'] = $row;

    echo json_encode($jTableResult);
} catch (Exception $e) {
    $jTableResult = array();
    $jTableResult['Result'] = 'ERROR';
    $jTableResult['Message'] = $e->getMessage();
    echo json_encode($jTableResult);
}
