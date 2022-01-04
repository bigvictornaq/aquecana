<?php
include 'php/conexion_be.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index2.php");
}
$correo = $_SESSION['usuario'];

$sql = "SELECT * FROM usuarios WHERE Correo = '$correo'";
$resultado = $conexion->query($sql);
$rows = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php  include 'includes/barranavegacion.php' ?>
    <?php include 'includes/perfil.php'  ?>
    <link rel="stylesheet" href="css/estilos2.css" />  <!-- mi hoja de estilos -->
    <link rel="stylesheet" href="css/visualizador.css"> <!--estilos del visualizador de pdf-->
    
    </head>
<body>
    
        <h1 class="title">Resultados Evaluación Docente</h1>
        <object class="pdfview" type="application/pdf" data="https://www.imaginanet.com/pdfinet/Dise%C3%B1o%20Responsive%20o%20Adaptativo.pdf"></object>

        <footer>      <?php include 'includes/footer.php' ?>  </footer>
    </body>


</html>