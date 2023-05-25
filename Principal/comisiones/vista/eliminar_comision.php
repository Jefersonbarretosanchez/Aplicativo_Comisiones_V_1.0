<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $eco_id_comision = $_POST['id_comision'];
    $sql = "DELETE from comisiones where id_comision=$eco_id_comision";
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