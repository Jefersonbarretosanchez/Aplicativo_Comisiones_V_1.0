<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $ec_id_campania = $_POST['id_campania'];
    $sql = "DELETE from campanias where id_campania=$ec_id_campania";
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
