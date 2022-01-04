<?php

include 'conexion_be.php';

$idUsuario = $_GET['buscarId'];

$borrarProducto = $conexion->query("DELETE FROM usuarios WHERE id={$idUsuario}");

header("Location: ../administrador.php");

?>