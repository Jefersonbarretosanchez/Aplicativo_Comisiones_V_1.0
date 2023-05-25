<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $lm_id_campania = $_GET['id_campania'];
    $sql = "SELECT `id_meta`,`id_campania`, `concepto`,`estatus`,`valor`,`meta_min`,`meta_max`,`meta_cumplida`  FROM metas where id_campania = $lm_id_campania Order By concepto";
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
