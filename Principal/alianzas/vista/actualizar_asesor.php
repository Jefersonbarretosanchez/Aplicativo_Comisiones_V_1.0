<?php
try {
    include('/wamp64/www/Principal/modelo/config.php');
    $aa_id_asesor = $_POST['id_asesor'];
    $aa_cedula_asesor = $_POST['cedula_asesor'];
    $aa_nombre = $_POST['nombre'];
    $aa_antiguedad = $_POST['antiguedad'];
    $aa_tipo_asesor = $_POST['tipo_asesor'];
    

    $sql = "UPDATE asesores set cedula_asesor='$aa_cedula_asesor',nombre='$aa_nombre',antiguedad='$aa_antiguedad',tipo_asesor='$aa_tipo_asesor' where id_asesor='$aa_id_asesor'";
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