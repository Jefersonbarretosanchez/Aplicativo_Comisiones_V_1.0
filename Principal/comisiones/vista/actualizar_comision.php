<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');
    $aco_id_comision=$_POST['id_comision'];
    $aco_fecha_calculo = $_POST['fecha_calculo'];
    $aco_mes= $_POST['mes'];
    $aco_numero_ventas = $_POST['numero_ventas'];
    $aco_estatus =$_POST['estatus'];
    

    $sql = "UPDATE comisiones set fecha_calculo='$aco_fecha_calculo',mes='$aco_mes',numero_ventas='$aco_numero_ventas',estatus='$aco_estatus' where id_comision='$aco_id_comision'";
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