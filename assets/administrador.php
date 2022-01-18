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
  <?php include 'includes/header.php'  ?>

  <!-- Section: backgroud gris align-items-center -->
  <section class="">
      <div class="container">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-body">
                     <h2 class="card-title">Lista de Usuarios con vista de su perfiles</h2>
                     <p class="card-text">
                       Aqui Podras agregar documentos y visualizar perfil del los usuarios
                     </p>
                     <div class="d-flex justify-content-center">
                         <!-- tablita con datitos -->
                     
              

            <table id="tablita" class="display">
                  <thead>
                      <tr>
                                <th>Nombre</th>
                                <th>Biografia</th>
                                <th>Correo</th>
                                <th>Password</th>
                                <th>Eliminar Usuario</th>
                                <th>Editar Usuario</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $sql = "SELECT * from usuarios";
                      $result = mysqli_query($conexion, $sql);

                      while ($mostrar = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                          <td><?=$mostrar['Nombre_Completo']?></td>
                          <td><?=$mostrar['Biografia']?></td>
                          <td><?=$mostrar['Correo']?></td>
                          <td><?=$mostrar['Password']?></td>
                          <td>
                                        <a href="php/deleteusuario.php?buscarId=<?= $mostrar['Id'] ?>" class="btn btn-outline-danger">Eliminar</a>

                                    </td>
                                    <td>
                                        <a href="php/updateusuario.php?buscarId=<?= $mostrar['Id'] ?>" class="btn btn-outline-info">Actualizar</a>

                                    </td>
                      </tr>
                      <?php }?>
                  </tbody>
                  <tfoot>
                  <tr>
                                <th>Nombre</th>
                                <th>Biografia</th>
                                <th>Correo</th>
                                <th>Password</th>
                                <th>Eliminar Usuario</th>
                                <th>Editar Usuario</th>
                      </tr>
                  </tfoot>
            </table>

            <!-- tablita con datitos -->
                     </div>
             
                   
                     <a href="#" class="card-link">Card link</a>
                     <a href="#" class="card-link">Another link</a>
                </div>
            </div>
          
      </div>
  </section>
  <!-- Section: backgroud gris -->
</main>

<?php include 'includes/footer.php'  ?>

