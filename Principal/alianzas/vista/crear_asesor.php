<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $ca_id_campania = $_POST['id_campania'];
    $ca_cedula_asesor = $_POST['cedula_asesor'];
    $ca_nombre = $_POST['nombre'];
    $ca_antiguedad = $_POST['antiguedad'];
    $ca_tipo_asesor = $_POST['tipo_asesor'];
    $sql = "INSERT into asesores(id_campania,cedula_asesor,nombre,antiguedad,tipo_asesor) values ('$ca_id_campania','$ca_cedula_asesor','$ca_nombre','$ca_antiguedad','$ca_tipo_asesor')";
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
