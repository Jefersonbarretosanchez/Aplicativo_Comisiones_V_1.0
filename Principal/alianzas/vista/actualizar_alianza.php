<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');
    $a_codigo_alianza = $_POST['codigo_alianza'];
    $a_nombre_alianza = $_POST['nombre_alianza'];
    $a_id_alianza = $_POST['id_alianza'];

    $sql = "UPDATE alianzas set codigo_alianza='$a_codigo_alianza',nombre_alianza='$a_nombre_alianza' where id_alianza='$a_id_alianza'";
    $result = mysqli_query($con, $sql);

    $jTableResult = array();
    $jTableResult['Result'] = 'OK';
    echo json_encode($jTableResult);
} catch (Exception $e) {
    $jTableResult = array();
    $jTableResult['Result'] = 'ERROR';
    $jTableResult['Message'] = $e->getMessage();
    echo json_encode($jTableResult);
}
