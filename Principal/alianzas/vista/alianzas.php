<?php require("/wamp64/www/Principal/vista/header.php");
session_start();
?>

<body>
    <div><br><br><br></div>
    <div id="alianzas" style="width: 80%; margin:auto; vertical-align: baseline;"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#alianzas').jtable({
                title: "ALIANZAS",
                paging: true,
                pageSize: 5,
                sorting: true,
                defaultSorting: 'codigo_alianza ASC',
                actions: {
                    listAction: '../controlador/c_listar_alianza.php',
                    createAction: '../controlador/c_crear_alianza.php',
                    updateAction: '../controlador/c_actualizar_alianza.php',
                    deleteAction: '../controlador/c_eliminar_alianza.php'
                },
                fields: {
                    id_alianza: {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    campania: {
                        title: '',
                        width: '5%',
                        sorting: false,
                        edit: false,
                        create: false,
                        display: function(campaniaData) {
                            var $img1 = $('<img src="/principal/imagenes/campañas.png" title="campañas" width="25" height="25" style="cursor:pointer"/>');
                            $img1.click(function() {
                                $('#alianzas').jtable('openChildTable',
                                    $img1.closest('tr'), {
                                        title: 'Campañas de la alianza ' + campaniaData.record.nombre_alianza,
                                        actions: {
                                            listAction: '/principal/alianzas/vista/listar_campania.php?id_alianza=' + campaniaData.record.id_alianza,
                                            deleteAction: '/principal/alianzas/controlador/c_eliminar_campania.php',
                                            updateAction: '/principal/alianzas/controlador/c_actualizar_campania.php',
                                            createAction: '/principal/alianzas/controlador/c_crear_campania.php',
                                        },
                                        fields: {
                                            id_alianza: {
                                                type: 'hidden',
                                                defaultValue: campaniaData.record.id_alianza
                                            },
                                            id_campania: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            asesor: {
                                                title: '',
                                                width: '5%',
                                                sorting: false,
                                                edit: false,
                                                create: false,
                                                listClass: 'child-opener-image-column',
                                                display: function(asesordata) {
                                                    var $img = $('<img src="/principal/imagenes/asesores.png" title="Agentes" width="25" height="25" style="cursor:pointer"/>');
                                                    $img.click(function() {
                                                        $('#alianzas').jtable('openChildTable',
                                                            $img.closest('tr'), {
                                                                title: 'Asesores De La Campaña ' + asesordata.record.nombre_campania,
                                                                actions: {
                                                                    listAction: '/principal/alianzas/vista/listar_asesor.php?id_campania=' + asesordata.record.id_campania,
                                                                    deleteAction: '/principal/alianzas/controlador/c_eliminar_asesor.php',
                                                                    updateAction: '/principal/alianzas/controlador/c_actualizar_asesor.php',
                                                                    createAction: '/principal/alianzas/controlador/c_crear_asesor.php'
                                                                },
                                                                fields: {
                                                                    id_campania: {
                                                                        type: 'hidden',
                                                                        defaultValue: asesordata.record.id_campania
                                                                    },
                                                                    id_asesor: {
                                                                        key: true,
                                                                        create: false,
                                                                        edit: false,
                                                                        list: false
                                                                    },

                                                                    cedula_asesor: {
                                                                        title: 'Cedula',
                                                                        width: '20%'
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
                                                                        title: 'Tipo De Asesor',
                                                                        width: '20%',
                                                                        options: {
                                                                            '1': 'Nuevo',
                                                                            '2': 'Antiguo'
                                                                        }
                                                                    },
                                                                },
                                                            },
                                                            function(asesores) {
                                                                asesores.childTable.jtable('load');
                                                            });
                                                    });
                                                    return $img;
                                                },
                                            },
                                            meta: {
                                                title: '',
                                                width: '5%',
                                                sorting: false,
                                                edit: false,
                                                create: false,
                                                listClass: 'child-opener-image-column',
                                                display: function(metasdata) {
                                                    var $img = $('<img src="/principal/imagenes/metas.png" title="Metas" width="25" height="25" style="cursor:pointer"/>');
                                                    $img.click(function() {
                                                        $('#alianzas').jtable('openChildTable',
                                                            $img.closest('tr'), {
                                                                title: 'Metas De La Campaña  ' + metasdata.record.nombre_campania,
                                                                actions: {
                                                                    listAction: '/principal/alianzas/vista/listar_meta.php?id_campania=' + metasdata.record.id_campania,
                                                                    deleteAction: '/principal/alianzas/controlador/c_eliminar_meta.php',
                                                                    updateAction: '/principal/alianzas/controlador/c_actualizar_meta.php',
                                                                    createAction: '/principal/alianzas/controlador/c_crear_meta.php'
                                                                },
                                                                fields: {
                                                                    id_campania: {
                                                                        type: 'hidden',
                                                                        defaultValue: metasdata.record.id_campania
                                                                    },
                                                                    id_meta: {
                                                                        key: true,
                                                                        create: false,
                                                                        edit: false,
                                                                        list: false
                                                                    },
                                                                    concepto: {
                                                                        title: 'Concepto',
                                                                        width: '20%',
                                                                        options: {
                                                                            '1': 'Comision Nuevo',
                                                                            '2': 'Comision Base',
                                                                            '3': 'Comision ',
                                                                            '4': 'Acelerador'
                                                                        }
                                                                    },
                                                                    estatus: {
                                                                        title: 'Estatus',
                                                                        width: '20%',
                                                                        options: {
                                                                            '1': 'Activo',
                                                                            '2': 'Inactivo'
                                                                        }
                                                                    },
                                                                    valor: {
                                                                        title: 'Valor',
                                                                        width: '20%'
                                                                    },
                                                                    meta_min: {
                                                                        title: 'Meta Minima',
                                                                        width: '10%'
                                                                    },
                                                                    meta_max: {
                                                                        title: 'Meta Maxima',
                                                                        width: '10%'
                                                                    },
                                                                    meta_cumplida: {
                                                                        title: 'Cumple Meta',
                                                                        width: '20%',
                                                                        options: {
                                                                            '1': 'SI',
                                                                            '2': 'NO'
                                                                        }
                                                                    },
                                                                },
                                                            },
                                                            function(metas) {
                                                                metas.childTable.jtable('load');
                                                            });
                                                    });
                                                    return $img;
                                                },
                                            },
                                            codigo_campania: {
                                                title: 'Codigo',
                                                width: '15%'
                                            },
                                            nombre_campania: {
                                                title: 'Nombre Campaña',
                                                width: '20%'
                                            },
                                            descripcion: {
                                                title: 'Descripcion',
                                                width: '50%'
                                            },
                                        },
                                    },
                                    function(campania) {
                                        campania.childTable.jtable('load');
                                    });
                            });
                            // document.getElementById('asesores').refresh(true);
                            // $('#alianzas').refresh(true);
                            return $img1;
                        }
                    },
                    codigo_alianza: {
                        title: 'Codigo Alianza',
                        width: '20%'
                    },
                    nombre_alianza: {
                        title: 'Nombre Alianza',
                        width: '40%'
                    },
                },
            });
            $('#alianzas').jtable('load');
        });
    </script>
    <div><br><br><br><br></div>

</body>
<?php require("/wamp64/www/Principal/vista/footer.php"); ?>

</html>