<?php
try {
    include('../modelo/config.php');

    $sql = "SELECT count(DISTINCT com.id_comision) as RecordCount from alianzas as ali 
    LEFT JOIN campanias as camp on ali.id_alianza = camp.id_alianza 
    LEFT JOIN asesores as ase ON camp.id_campania = ase.id_campania 
    LEFT JOIN comisiones as com ON ase.id_asesor =com.id_asesor 
    WHERE ase.id_asesor is not null";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $recordCount = $row['RecordCount'];

    $orden = $_GET['jtSorting'];
    $inicioReg = $_GET['jtStartIndex'];
    $fin = $_GET['jtPageSize'];

    $sqlAgentes = "SELECT ali.nombre_alianza, camp.id_campania,
    camp.nombre_campania, ase.id_asesor, ase.id_campania as campania, 
    ase.nombre, ase.tipo_asesor, com.mes, sum(numero_ventas) AS ventas, com.estatus, 
    com.mes, 10000 as precio, 0.0 as pago, '0' as cumple  from alianzas as ali 
    LEFT JOIN campanias as camp on ali.id_alianza = camp.id_alianza 
    LEFT JOIN asesores as ase ON camp.id_campania = ase.id_campania 
    LEFT JOIN comisiones as com ON ase.id_asesor =com.id_asesor 
    WHERE ase.id_asesor is not null 
    GROUP BY ali.nombre_alianza, camp.nombre_campania, com.mes, 
    ase.id_asesor, ase.id_campania
    order by $orden limit $inicioReg,$fin;";

    $resultAgentes = mysqli_query($con, $sqlAgentes);
    $rowsAgentes = array();
    while ($row = mysqli_fetch_array($resultAgentes)) {
        
        if (is_null($row["mes"])){
            $row["mes"]=0;
            $row["ventas"]=0;
            $row["precio"] = 0;
            $row["estatus"] = 11;
            $row["meta"] = 2;

        }else {

            if ( $row["tipo_asesor"] == '1' ){
                    // sql para asesores nuevos
                    $sqlcomisiones = "SELECT `valor`, `meta_cumplida` FROM `metas` 
                        WHERE `id_campania` = " . $row["id_campania"] .  
                        " and " . $row["ventas"] . " between `meta_min` and `meta_max`
                        and `concepto` = '1' LIMIT 1";
            } else {
                // sql para asesores veteranos
                $sqlcomisiones = "SELECT `valor`, `meta_cumplida` FROM `metas` 
                    WHERE `id_campania` = " . $row["id_campania"] .  
                    " and " . $row["ventas"] . " between `meta_min` and `meta_max`
                    and `concepto` != '1'  LIMIT 1;";


            }
            // traigo los valores de las metas
            $resultMetas = mysqli_query($con, $sqlcomisiones);
            $rowsMetas = array();
            while ($rowMetas = mysqli_fetch_array($resultMetas)) {
                //echo "Entro" .  " <br>";
                
                $calculo = ($row["ventas"] * $rowMetas["valor"]);
                $calculo = 	number_format($calculo,2);

                //echo $calculo .  " <br>";

                $row["pago"] =  $calculo;
                $row["cumple"] = $rowMetas["meta_cumplida"];
            }
            $row["ventas" ]= number_format($row["ventas"],2);

            
       }

        $rows[] = $row;


    }





    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['TotalRecordCount'] = $recordCount;
    $jTableResult['Records'] = $rows;
    echo json_encode($jTableResult);
    exit;
} catch (Exception $e) {
    $jTableResult = array();
    $jTableResult['Result'] = 'ERROR';
    $jTableResult['Message'] = $e->getMessage();
    echo json_encode($jTableResult);
}