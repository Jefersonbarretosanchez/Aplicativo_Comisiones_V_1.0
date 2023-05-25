
<?php require("vista/headerindex.php"); 
// remove all session variables
session_unset();
?>
<body>
    <div class="from-group">
      <h3>Iniciar Sesión</h3>
      <form action="modelo/usr.php" method ="post" class="input-group">
        <input type="email" name="email" class="input-field" placeholder="Correo Electronico">
        <input type="password" name="password" class="input-field" placeholder="Contraseña">
        <br><br>
        <button type="submit" class="btn-enviar" >Iniciar Sesión</button>
      </form>
    </div>
    <!-- <div style="width: 250px; margin: 10px auto; text-align: center; background-color: #0b132b; padding: 10px 20px; border-radius: 10px;">
      <a href="index.html" style="color: white; text-decoration: none; font-weight: bold;" target="blank">Visita mis redes sociales</a>
    </div> -->
  </body>
  <?php require("vista/footerIndex.php"); ?>

</html>