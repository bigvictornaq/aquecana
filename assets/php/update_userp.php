<?php

include 'conexion_be.php';

$obtener_ID = $_GET['buscarId'];

$sql = "SELECT * FROM usuarios WHERE Id = '$obtener_ID'";
$resultado = $conexion->query($sql);
$rows = $resultado->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['name_u'];
        $bio = $_POST['bio_user'];
        $pass = $_POST['pass_u'];

        if(!empty($nombre) && !empty($bio) && !empty($pass)){
            $updateU = $conexion->query("UPDATE 
                                usuarios SET Nombre_Completo='{$nombre}',
                                Biografia='{$bio}',Password='{$pass}' WHERE id= {$obtener_ID}");

            if(utf8_decode($rows['IdRol']) == 2){
               
                header("Location: ../inicio.php");                 
            }else{
                
            
                header("Location: ../administrador.php"); 
            }

        }else{
            echo "hay error";
        }
        
}