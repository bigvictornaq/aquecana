<?php

include 'conexion_be.php';
session_start();

$correo = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index2.php");
}


$nme_fecha = $_POST['name_fecha'];

//  query
$query = "INSER INTO periodo(fecha_estipada)
            VALUES($nme_fecha)";
/*ejecutar query */
$ejecutar = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    
if($ejecutar){
    echo '
    <script>
    alert ("Se agrego exitosamente");
    window.location = "../periodo_view.php";
    </script>
    ';
}else{
    echo '
    <script>
    alert ("no se agrego nada");
    window.location = "../periodo_view.php";
    </script>
    ';

}
mysqli_close ($conexion);            