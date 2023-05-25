<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $ea_id_asesor = $_POST['id_asesor'];
    $sql = "DELETE from asesores where id_asesor=$ea_id_asesor";
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