<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');

    $sql = "SELECT count(*) as RecordCount from asesores";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $recordCount = $row['RecordCount'];

    $orden_a = $_GET['jtSorting'];
    $inicioReg_a = $_GET['jtStartIndex'];
    $fin_a = $_GET['jtPageSize'];

    $sql = "SELECT `id_asesor`,`cedula_asesor`, `nombre`, `antiguedad`,`tipo_asesor` FROM asesores order by $orden_a limit $inicioReg_a,$fin_a";
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
