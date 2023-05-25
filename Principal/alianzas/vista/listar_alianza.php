<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $sql = "SELECT count(*) as RecordCount from alianzas";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $recordCount = $row['RecordCount'];

    $orden = $_GET['jtSorting'];
    $inicioReg = $_GET['jtStartIndex'];
    $fin = $_GET['jtPageSize'];

    $sql = "SELECT `id_alianza`,`codigo_alianza`,`nombre_alianza` from alianzas order by $orden limit $inicioReg,$fin";
    $result = mysqli_query($con, $sql);

    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['TotalRecordCount'] = $recordCount;
    $jTableResult['Records'] = $rows;

    echo json_encode($jTableResult);
} catch (Exception $e) {
    $jTableResult = array();
    $jTableResult['Result'] = 'ERROR';
    $jTableResult['Message'] = $e->getMessage();
    echo json_encode($jTableResult);
}
