<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $em_id_meta = $_POST['id_meta'];
    $sql = "DELETE from metas where id_meta=$em_id_meta";
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
