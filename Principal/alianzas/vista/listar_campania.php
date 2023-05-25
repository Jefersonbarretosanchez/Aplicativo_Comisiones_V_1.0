<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $lc_id_alianza = $_GET['id_alianza'];
    $sql = "SELECT `id_campania`,`id_alianza`,`codigo_campania`, `nombre_campania`, `descripcion` FROM campanias where id_alianza = $lc_id_alianza Order By 1";
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
