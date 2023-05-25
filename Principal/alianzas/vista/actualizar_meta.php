<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $am_id_meta=$_POST['id_meta'];
    $am_concepto = $_POST['concepto'];
    $am_estatus = $_POST['estatus'];
    $am_valor = $_POST['valor'];
    $am_meta_min = $_POST['meta_min'];
    $am_meta_max = $_POST['meta_max'];
    $am_meta_cumplida = $_POST['meta_cumplida'];

    $sql = "UPDATE metas set concepto='$am_concepto',estatus='$am_estatus',valor='$am_valor',meta_min='$am_meta_min',meta_max='$am_meta_max',meta_cumplida='$am_meta_cumplida' where id_meta='$am_id_meta'";
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
