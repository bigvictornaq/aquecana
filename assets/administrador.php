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
  <?php include 'includes/admin_bs/header.php'  ?>

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
                     
              <table id="table_id" class="display">
                  <thead>
                      <tr>
                                <th>Perfil</th>
                                <th>Nombre</th>
                                <th>Biografia</th>
                                <th>Correo</th>
                                <th>Password</th>
                                <th>Eliminar Usuario</th>
                                <th>Editar Usuario</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Row 1 Data 1</td>
                          <td>Row 1 Data 2</td>
                      </tr>
                      <tr>
                          <td>Row 2 Data 1</td>
                          <td>Row 2 Data 2</td>
                      </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                                <th>Perfil</th>
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

<?php include 'includes/admin_bs/footer.php'  ?>

