<?php
include 'php/conexion_be.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index2.php");
}
$correo = $_SESSION['usuario'];

$sql = "SElECT * FROM usuarios WHERE Correo = '$correo'";
$resultado = $conexion->query($sql);
$rows = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">

<head> 
<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Usuario</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- boostrap -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
  rel="stylesheet"
/> 
    <!-- custom estilos -->
<link rel="stylesheet" href="css/admin_fb.css" />  
</head>                              
<body>
<header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- componentes izquierda -->
    <div>
    <a class="navbar-brand" href="#">
      <img
        src="../assets/images/logo_tec_juarez3.png"

      />
    </a>
    </div>
    <!-- componentes izquierda -->
    
    <!-- componetes centro -->
    <!-- componetes centro -->

    <!-- componetes derecha -->
    <!-- componetes derecha -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar --> 


</header>
<main></main>
<footer>

</footer>
</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
</html>
