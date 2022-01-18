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

<?php include 'includes/header.php' ?>
    <!-- Section: backgroud gris align-items-center -->
    <section class="">
        <div class="container">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Lista de Usuarios</h5>
                    <p class="card-text">
                        Aqui se puede modificar todos los usuarios
                    </p>
                    <div class="d-flex justify-content-center">
                        <!-- tablita con datitos -->

                        <table id="tablita" class="display">
                            <thead>
                            <tr>
                                <th>Nombre Del Usuario</th>
                                <th>Correo</th>
                                <th>Documento Aiginado actualmente</th>
                                <th>Agregar Document</th>
                                <th>Ver perfil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * from usuarios WHERE IdRol=2";
                            $result = mysqli_query($conexion, $sql);

                            while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= $mostrar['Nombre_Completo'] ?></td>
                                    <td><?= $mostrar['Correo'] ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <form
                                                      action="php/add_doc_to_user.php?buscarId=<?=$mostrar['Id']?>"
                                                      method="post">
                                                    <select name="ped" class="form-control"
                                                            aria-label="Default select example=">
                                                        <option>Seleciona el documento</option>
                                                        <?php
                                                        $query = "SELECT documentos.idDoc, documentos.año, 
                                                                    periodo.fecha_estipada FROM documentos 
                                                                        INNER JOIN periodo ON documentos.idperiodo=periodo.id_periodo";
                                                        $result2 = $conexion->query($query) or die($conexion->error);

                                                        while ($show_docs = $result2->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?= $show_docs['idDoc'] ?>">
                                                                <?php echo $show_docs['fecha_estipada'] . "-" . $show_docs['año']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    <button type="submit" value="ne" "
                                                            class="btn btn-outline-secondary">
                                                        Agregar Documento
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <a href="php/view_user_profile.php?buscarId=<?= $mostrar['Id'] ?>"
                                           class="btn btn-outline-info">Visulizar Perfil</a>
                                    </td>
                                    <td>hola</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Agregar Documento</th>
                                <th>Ver perfil</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- tablita con datitos -->
                    </div>
                        <!--modal-->
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   <form class="">

                                   </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--modal-->

                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

        </div>
    </section>
    <!-- Section: backgroud gris -->
    </main>

<?php include 'includes/footer.php' ?>