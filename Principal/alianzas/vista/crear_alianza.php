<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $c_codigo_alianza = $_POST['codigo_alianza'];
    $c_nombre_alianza = $_POST['nombre_alianza'];
    $sql = "INSERT into alianzas(codigo_alianza,nombre_alianza) values ('$c_codigo_alianza','$c_nombre_alianza')";
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
