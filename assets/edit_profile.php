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



<?php 
        if(utf8_decode($rows['IdRol']) == 2){
            include 'includes/barranavegacion.php';
        }else{
            include 'includes/header.php';
        }
?>

<!-- section: Edicion de Perfil de Usuario -->
    <section>
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Perfil de Usuario
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p>Podras cambiar tus datos de tu cuenta</p>
                            </div>
                            <form id="formProfile" action="php/update_userp.php?buscarId=<?=utf8_decode($rows['Id'])?>" method="post">

                                <div class="form-group row my-2">
                                    <label for="name_user" class="col-md-4 col-form-label text-md-right">
                                    <i class="fas fa-user-astronaut fa-2x me-2"></i>   Nombre Completo
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="name_user" class="form-control" name="name_u" value="<?=utf8_decode($rows['Nombre_Completo'])?>" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row my-2">
                                    <label for="biografia" class="col-md-4 col-form-label text-md-right">
                                    <i class="fas fa-address-book fa-2x me-2"></i> Biografia
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="biografia" class="form-control" name="bio_user" value="<?=utf8_decode($rows['Biografia'])?>" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row my-2">
                                    <label for="psw_user" class="col-md-4 col-form-label text-md-right">
                                        <i class="fas  fa-key fa-spin fa-2x me-2"></i>Password
                                    </label>
                                    <div class="col-md-6">
                                        <input type="password" id="psw_user" class="form-control" name="pass_u" value="<?=utf8_decode($rows['Password'])?>" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" form="formProfile" class="btn btn-primary" style="background-color: #25d366;">
                                    <i class="fas fa-user-edit fa-lg me-2"></i> Actualizar
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- section: Edicion de Perfil de Usuario -->


</main>
<?php include 'includes/footer.php'  ?>