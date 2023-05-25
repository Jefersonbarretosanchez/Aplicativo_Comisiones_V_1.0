<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');
    
    $cm_id_campania=$_POST['id_campania'];
    $cm_concepto = $_POST['concepto'];
    $cm_estatus = $_POST['estatus'];
    $cm_valor = $_POST['valor'];
    $cm_meta_min = $_POST['meta_min'];
    $cm_meta_max = $_POST['meta_max'];
    $cm_meta_cumplida = $_POST['meta_cumplida'];
    $sql = "INSERT into metas (id_campania,concepto,estatus,valor,meta_min,meta_max,meta_cumplida) values ('$cm_id_campania','$cm_concepto','$cm_estatus','$cm_valor','$cm_meta_min','$cm_meta_max','$cm_meta_cumplida')";
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