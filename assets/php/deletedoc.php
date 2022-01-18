<?php

include 'conexion_be.php';


$id_doc = $_GET['buscarId'];

$borrarDocumeto =$conexion->query("DELETE FROM documentos WHERE idDoc={$id_doc}") or die(mysqli_error($conexion));

if($borrarDocumeto){
    header("Location: ../expen_cr.php");    
}else{
    echo "valio verga no esta viendo";
}
