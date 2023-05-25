<?php
 // remove all session variables
session_unset();
 
    include('config.php');

    // Obtengo los datos cargados en el formulario de login.
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Consulta segura para evitar inyecciones SQL.
    $sql = "SELECT email FROM usuarios WHERE email='$email' AND password = '$password'";

    $resultUsuario = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($resultUsuario);


    // Verificando si el usuario existe en la base de datos.
    if( $row['email'] == $email and $row['email'] != NULL ){
    // Guardo en la sesión el email del usuario.

    $_SESSION['email'] =  $row['email'];
    
    // Redirecciono al usuario a la página principal del sitio.
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: /principal/alianzas/vista/alianzas.php"); 
    }else{

    echo 'El email o password es incorrecto, <a href="index.html">vuelva a intenarlo</a>.<br/>';
    echo '<script language="javascript">alert("Error de autentificacion");window.location.href="../index.php"</script>';

    }

?>





?>