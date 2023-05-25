<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $la_id_campania = $_GET['id_campania'];
    $sql = "SELECT `id_asesor`,`id_campania`,`cedula_asesor`, `nombre`, `antiguedad`,`tipo_asesor` FROM asesores where id_campania = $la_id_campania Order By 1";
    $result = mysqli_query($con, $sql);

    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }

    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['Records'] = $rows;

    echo json_encode($jTableResult);
} catch (Exception $e) {
    $jTableResult = array();
    $jTableResult['Result'] = 'ERROR';
    $jTableResult['Message'] = $e->getMessage();
    echo json_encode($jTableResult);
}
