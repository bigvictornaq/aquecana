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
<?php include 'includes/barranavegacion.php'?> 
<link rel="stylesheet" href="css/estilos2.css" />  <!-- mi hoja de estilos -->
</head>

<!--          Visualizador de usuarios       -->


<body>
    <?php include 'includes/perfil.php' ?>
        <div style="padding-top: 60px;">


            <div>
                <div class="container">
                    <table class="table table-dark" style="table-layout: fixed; word-wrap: break-word;" id="myList">
                        <thead>
                            <tr>
                            <!--th scope="col">Id</th-->
                                <th scope="col">Perfil</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Biografia</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Password</th>
                                <th scope="col">Eliminar Usuario</th>
                                <th scope="col">Editar Usuario</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * from usuarios";
                            $result = mysqli_query($conexion, $sql);

                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>




                                <tr>
                                <!--td>?php echo $mostrar['Id'] ?> </td-->
                                    <td><?php echo $mostrar['Perfil'] ?> </td>
                                    <td><?php echo $mostrar['Nombre_Completo'] ?> </td>
                                    <td><?php echo $mostrar['Biografia'] ?> </td>
                                    <td><?php echo $mostrar['Correo'] ?> </td>

                                    <td><?php echo $mostrar['Password']?> </td>
                                    <td>
                                        <a href="deleteusuario.php?buscarId=<?= $mostrar['Id'] ?>" class="btn btn-outline-danger">Eliminar</a>

                                    </td>
                                    <td>
                                        <a href="updateusuario.php?buscarId=<?= $mostrar['Id'] ?>" class="btn btn-outline-info">Actualizar</a>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>



            </div>
            <footer> <?php  include 'includes/footer.php' ?> </footer>
        </div>


