<?php require("/wamp64/www/Principal/vista/header.php");
session_start();
?>

<body>
  <div><br><br><br></div>
  <div id="comisiones" style="width: 80%; margin:auto; vertical-align: baseline;"></div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#comisiones').jtable({
        title: "REPORTES",
        paging: true,
        pageSize: 5,
        sorting: true,
        defaultSorting: 'com.id_asesor ASC',
        actions: {
          listAction: 'listar_reporte.php',
        },
        fields: {
          id_campania: {
            key: true,
            create: false,
            edit: false,
            list: false
          },
          id_asesor: {
            type: 'hidden'
          },
          nombre_alianza: {
            title: 'Alianza',
            width: '20%'
          },
          nombre_campania: {
            title: 'Campaña',
            width: '20%'
          },
          nombre: {
            title: 'Agente',
            width: '20%'
          },
          mes: {
            title: 'Mes',
            width: '5%',
            options: {
              '0': "Sin Dato",
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
          ventas: {
            title: 'Ventas',
            width: '5%',
          },
          pago: {
            title: 'Pago',
            width: '10%'
          },
          cumple: {
            title: 'Meta',
            width: '10%',
            options: {
              '2': 'No cumplida',
              '1': 'Cumplida',
              '0': 'Sin dato'
            }
          },
          estatus: {
            title: 'Estatus',
            width: '10%',
            options: {
              '1': 'Pendiente',
              '2': 'Pagado',
              '11': 'Sin Ventas'
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