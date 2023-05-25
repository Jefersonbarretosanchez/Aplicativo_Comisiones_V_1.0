<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $cc_id_alianza = $_POST['id_alianza'];
    $cc_codigo_campania = $_POST['codigo_campania'];
    $cc_nombre_campania = $_POST['nombre_campania'];
    $cc_descripcion = $_POST['descripcion'];
    $sql = "INSERT into campanias (id_alianza,codigo_campania,nombre_campania,descripcion) values ('$cc_id_alianza','$cc_codigo_campania','$cc_nombre_campania','$cc_descripcion')";
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
