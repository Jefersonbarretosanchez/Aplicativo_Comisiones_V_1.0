<?php require("/wamp64/www/Principal/vista/header.php");
session_start();
?>

<body>
    <div><br><br><br></div>
    <div id="comisiones" style="width: 80%; margin:auto; vertical-align: baseline;"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#comisiones').jtable({
                title: "COMISIONES",
                paging: true,
                pageSize: 5,
                sorting: true,
                defaultSorting: 'cedula_asesor ASC',
                actions: {
                    listAction: '/principal/comisiones/controlador/c_listar_asesor.php'

                },
                fields: {
                    id_asesor: {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    comision: {
                        title: '',
                        width: '5%',
                        sorting: false,
                        edit: false,
                        create: false,
                        display: function(comisionData) {
                            var $img1 = $('<img src="/principal/imagenes/dinero.png" title="Comisiones" width="25" height="25" style="cursor:pointer"/>');
                            $img1.click(function() {
                                $('#comisiones').jtable('openChildTable',
                                    $img1.closest('tr'), {
                                        title: 'Comisiones del Agente ' + comisionData.record.nombre,
                                        actions: {
                                            listAction: '/principal/comisiones/vista/listar_comision.php?id_asesor=' + comisionData.record.id_asesor,
                                            deleteAction: '/principal/comisiones/controlador/c_eliminar_comision.php',
                                            updateAction: '/principal/comisiones/controlador/c_actualizar_comision.php',
                                            createAction: '/principal/comisiones/controlador/c_crear_comision.php',
                                        },
                                        fields: {
                                            id_asesor: {
                                                type: 'hidden',
                                                defaultValue: comisionData.record.id_asesor
                                            },
                                            id_comision: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            fecha_calculo: {
                                                title: 'Fecha De Calculo',
                                                width: '15%',
                                                type: 'date',
                                                displayFormat: 'yy-mm-dd',
                                            },
                                            mes: {
                                                title: 'Mes A Calcular',
                                                width: '10%',
                                                options: {
                                                    '1': 'Enero',
                                                    '2': 'Febrero',
                                                    '3': 'Marzo',
                                                    '4': 'Abril',
                                                    '5': 'Mayo',
                                                    '6': 'Junio',
                                                    '7': 'Julio',
                                                    '8': 'Agosto',
                                                    '9': 'Septiembre',
                                                    '10': 'Octubre',
                                                    '11': 'Noviembre',
                                                    '12': 'Diciembre'
                                                }
                                            },
                                            numero_ventas: {
                                                title: 'Cantidad De Ventas',
                                                width: '15%'
                                            },
                                            estatus: {
                                                title: 'Estatus',
                                                width: '25%',
                                                options: {
                                                    '1': 'Pendiente',
                                                    '2': 'Pagado'
                                                }
                                            },
                                        },
                                    },
                                    function(comision) {
                                        comision.childTable.jtable('load');
                                    });
                            });
                            return $img1;
                        },
                    },
                    cedula_asesor: {
                        title: 'Cedula Agente',
                        width: '25%'
                    },
                    nombre: {
                        title: 'Nombre Completo',
                        width: '30%'
                    },
                    antiguedad: {
                        title: 'Antiguedad',
                        width: '20%'
                    },
                    tipo_asesor: {
                        title: 'Tipo De Agente',
                        width: '20%',
                        options: {
                            '1': 'Nuevo',
                            '2': 'Antiguo',
                            '3': 'Redes'
                        }
                    },
                },
            });
            $('#comisiones').jtable('load');
        });
    </script>
    <div><br><br><br><br></div>

</body>
<?php require("/wamp64/www/Principal/vista/footer.php"); ?>

</html>