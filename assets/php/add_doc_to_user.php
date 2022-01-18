<?php

    include 'conexion_be.php';

    session_start();
    $correo = $_SESSION['usuario'];
    if (!isset($_SESSION['usuario'])) {
    header("Location: ../index2.php");
    }

    $id_user = $_GET['buscarId'];

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_documento = $_POST['ped'];
            echo $id_user;

            $doc_result = $conexion->query("SELECT * FROM documentos WHERE IdDOC={$id_documento}")
                                            OR die(mysqli_error($conexion));
            $doc_selected = $doc_result->fetch_assoc();


            if (file_exists('../Documentos/'.$correo.'/'.$doc_selected['url'])){

                            $user_rs = $conexion->query("SELECT Correo FROM usuarios WHERE Id={$id_user}")
                                                or die(mysqli_error($conexion));
                            $email_user = $user_rs->fetch_assoc();

                    if(file_exists('../Documentos/'.$email_user['Correo'])){
                        copy('../Documentos/'.$correo.'/'.$doc_selected['url'],'../Documentos/'.$email_user['Correo'].'/'.$doc_selected['url']);
                    }else{
                        mkdir('../Documentos/'.$email_user['Correo']); //creamos el directorio del usuario

                        copy('../Documentos/'.$correo.'/'.$doc_selected['url'],'../Documentos/'.$email_user['Correo'].'/'.$doc_selected['url']);
                    }

                $add_doc_user = $conexion->query("UPDATE usuarios SET IdDoc={$id_documento} WHERE Id={$id_user} ")
                or die(mysqli_error($conexion));

                if ($add_doc_user){
                    echo  $id_user.'</br>';
                    echo '../Documentos/'.$email_user['Correo'];
                    // header("Location: ../expen_cr.php");
                }else{
                    echo "Error: efesota $add_doc_user";
                }
            }










    }