<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $e_id_alianza = $_POST['id_alianza'];
    
    $sql = "DELETE from alianzas where id_alianza='$e_id_alianza'";
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
