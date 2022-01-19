<?php
include 'php/conexion_be.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index2.php");
}
$correo = $_SESSION['usuario'];



//checamos que sea un suario de alto nivel no ?
$sql = "SElECT * FROM usuarios WHERE Correo = '$correo'";
$res = $conexion->query($sql) or die($conexion->error);
$data_user = $res->fetch_assoc();

if($data_user['IdDoc'] == 2){
    header("Location: index2.php");
}

$id_user= $_GET['buscarId'];

//sacamos los datos del usuario a visitar
$query = "SElECT * FROM usuarios 
               JOIN documentos ON documentos.IdDoc= usuarios.IdDoc
               JOIN periodo ON periodo.id_periodo=documentos.idperiodo  WHERE Id = '$id_user'";
$res = $conexion->query($query) or die($conexion->error);
$rows = $res->fetch_assoc();

?>

<?php include 'includes/header.php'  ?>

<div class="container text-center">
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Resultados Evaluación Docente</h5>
            <p class="card-text">Se encuentra tu pdf actualizado</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
<div class="container py-5 bg-secondary">
    <?php
            $email = utf8_decode($rows['Correo']);
            $url =  utf8_decode($rows['url']);
    ?>
    <object class="pdfview" type="application/pdf" data="<?php echo 'Documentos/'.$email.'/'.$url ?>"></object>
</div>


</main>

<?php include 'includes/footer.php'  ?>

