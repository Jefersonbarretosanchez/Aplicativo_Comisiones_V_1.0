<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');
    $ac_id_campania = $_POST['id_campania'];
    $ac_codigo_campania = $_POST['codigo_campania'];
    $ac_nombre_campania = $_POST['nombre_campania'];
    $ac_descripcion= $_POST['descripcion'];
    

    $sql = "UPDATE campanias set codigo_campania='$ac_codigo_campania',nombre_campania='$ac_nombre_campania',descripcion='$ac_descripcion' where id_campania='$ac_id_campania'";
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
