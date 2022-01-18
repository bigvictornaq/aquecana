<?php

    include 'conexion_be.php';

    session_start();
    $id_user = $_GET['buscarId'];

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_documento = $_POST['periodo'];
            $add_doc_user = $conexion->query("UPDATE usuarios SET IdDoc={$id_documento} WHERE Id={$id_user} ")
                                                or die(mysqli_error($conexion));
            if ($add_doc_user){
                header("Location: ../expen_cr.php");
            }else{
                echo "Error: efesota $add_doc_user";
            }
    }