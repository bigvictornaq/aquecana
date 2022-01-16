<?php

include 'conexion_be.php';


$obtenerID = $_GET['buscarId'];

$obtenerDatos = $conexion->query("SELECT * FROM usuarios WHERE id={$obtenerID}");
$arregloUsuarios = mysqli_fetch_assoc($obtenerDatos);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password1 = $_POST['password'];

    if (!empty($nombre)) {
        $nombre_validate = true;
    } else {
        $nombre_validate = false;
        $errors['nombre'] = "Debes llenar el campo Nombre";
    }
    if (!empty($correo)) {
        $correo_validate = true;
    } else {
        $correo_validate = false;
        $errors['correo'] = "Debes llenar el campo categoria";
    }
    if (!empty($password1)) {
        $password1_validate = true;
    } else {
        $password1_validate = false;
        $errors['password'] = "Debes llenar el campo cantidad";
    }

    if (!isset($errors)) {
        $crearUsuario = $conexion->query("UPDATE usuarios SET Nombre_Completo='{$nombre}',Correo='{$correo}',Password='{$password1}' WHERE id= {$obtenerID}");

        $conexion = null;
        header("Location: perfil2admin.php?update=1");
    } else {

        echo "<div class= 'alert alert-danger'> Tienes algun error en el formulario</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Usuario</title>
    <link rel="stylesheet" href="../css/estilos2.css" />
    <!--mi hoja de estilos-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <body>

        <tbody>
            <div class="container" style="padding-top: 20px;">
                <div class="row">
                    <div class="col-12 ">
                        <div style="padding-left: 100px; padding-top: 40px;">
                            <a href="../administrador.php" class="btn btn-primary mb-4">Regresar</a>
                        </div>

                        <div style="padding-left: 300px; padding-bottom: 20px;">
                            <div class="card" style="width: 500px; ">

                                <div class="card-body bg-info text-white">

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $arregloUsuarios['Nombre_Completo'] ?>">

                                            <?php
                                            if (isset($errors['nombre'])) {
                                                echo "<div class= 'alert alert-danger' >" . $errors['nombre'] . "</div> ";
                                            }
                                            ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="correo">Correo</label>
                                            <input type="text" class="form-control" name="correo" id="correo" value="<?= $arregloUsuarios['Correo'] ?>">

                                            <?php
                                            if (isset($errors['correo'])) {
                                                echo "<div class= 'alert alert-danger' >" . $errors['correo'] . "</div> ";
                                            }
                                            ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" value="<?= $arregloUsuarios['Password'] ?>">

                                            <?php
                                            if (isset($errors['password1'])) {
                                                echo "<div class= 'alert alert-danger' >" . $errors['password'] . "</div> ";
                                            }
                                            ?>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </tbody>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </body>

</body>

</html>