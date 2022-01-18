<?php

include 'conexion_be.php';


$idUsuario = $_GET['buscarId'];

$borrarDocumeto =$conexion->query("DELETE FROM usuarios WHERE id={$documentos}");
header("Location: ../expen_cr.php");