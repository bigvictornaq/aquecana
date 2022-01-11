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
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php  include 'includes/barranavegacion.php' ?>
</head>

<body>
<div class="row-12;">
        <h1 style="text-align: center;">Registros</h1>
    </div>

    <div class="col-12; border-box;">

        <div class="contenedor2" style="margin-left: 300px; table-layout: fixed; word-wrap: break-word; padding-right: 300px;">
            <h3>Historial de evaluacione docente: </h3>
            <table class="table table-bordered table-info">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ver</th>
                        <th scope="col">descargar</th>
                        <th scope="col">Ver</th>
                        <th scope="col">descargar</th>


                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------------------------tabla de descargas de archvivos-------------- -->
                    <tr>
                        <th scope="row">2021</th>
                        <td><a href="../Documentos/examen unidad 3.pdf" class="btn" target="_blank">2021-Ene-jun</a></td>
                        <td><a href="../Documentos/examen unidad 3.pdf" class="btn" Download="2021">descargar</a></td>

                        <td><a href="../Documentos/examen unidad 3.pdf" class="btn" target="_blank">2021-Ago-Dic</a></td>
                        <td><a href="../Documentos/examen unidad 3.pdf" class="btn" Download="2021">descargar</a></td>


                    </tr>
                    <tr>
                        <th scope="row">2020</th>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2020-Ene-jun</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2020-Ago-Dic</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>


                    </tr>

                    <tr>
                        <th scope="row">2019</th>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2019-Ene-jun</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2019-Ago-Dic</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>


                    </tr>
                    <tr>
                        <th scope="row">2018</th>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2018-Ene-jun</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2018-Ago-Dic</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>


                    </tr>
                    <tr>
                        <th scope="row">2017</th>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2017-Ene-jun</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" target="_blank">2017-Ago-Dic</a></td>
                        <td><a href="../Documentos/acme.pdf" class="btn" Download="2020">descargar</a></td>


                    </tr>
</div>
</div>

<br>
<br>
<div >
</div>  


