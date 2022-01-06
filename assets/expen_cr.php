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

<!-- Section: Documentos files -->
<section class="">
        <div class="container">
                <div class="card w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Informacion de Los documentos </h5>
                            <?php if($_SESSION['rol'] === 1){ ?>
                            <p class="card-text">
                                Muestra informacion De los ducumentos subidos, ademas como administrador
                                puedes modificar o subir documentos,
                            </p>

                            <!-- Button trigger modal -->
                            <button
                              type="button"
                              class="btn btn-success"
                              data-mdb-toggle="modal"
                              data-mdb-target="#staticBackdrop"
                            >
                            <i class="fas fa-address-book"></i>Agregar
                            </button>            

                           <!-- Modal -->
                                <div
                                  class="modal fade"
                                  id="staticBackdrop"
                                  data-mdb-backdrop="static"
                                  data-mdb-keyboard="false"
                                  tabindex="-1"
                                  aria-labelledby="staticBackdropLabel"
                                  aria-hidden="true"
                                >
                                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Agregar un Nuevo Documento</h5>
                                        <button
                                          type="button"
                                          class="btn-close"
                                          data-mdb-dismiss="modal"
                                          aria-label="Close"
                                        ></button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="container-fluid">
                                          <form class="was-validated" action="php/add_docs.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                            <label for="validationServer01" class="form-label">Nombre del Documento</label>
                                                            <input
                                                                   type="text"
                                                                   class="form-control is-valid"
                                                                   id="validationServer01"
                                                                   value="Mark"
                                                                   required
                                                                   name="doc_name"
                                                                 />
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="invalid-feedback">Documento</div>
                                                            <input type="file" class="form-control" aria-label="file example" name="doc" required />
                                                          
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-7">
                                                            <select class="form-select" aria-label="Default select example" name="semestre">
                                                              <option selected>Seleciona el semestre</option>
                                                              <option value="1">One</option>
                                                              <option value="2">Two</option>
                                                              <option value="3">Three</option>
                                                              <option value="4">Three</option>
                                                              <option value="5">Three</option>
                                                              <option value="6">Three</option>
                                                              <option value="7">Three</option>
                                                              <option value="8">Three</option>
                                                              <option value="9">Three</option>
                                                              <option value="10">Three</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                            <div class="form-outline">
                                                                 <input type="text" id="typeText" class="form-control" name="fecha" />
                                                                 <label class="form-label" for="typeText" >fecha hora</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-4 ms-auto">
                                                            <button type="submit" value="upload" class="btn btn-primary btn-block">agregar documento</button>
                                                            </div>
                                                        </div>

                                                </form>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                          Close
                                        </button>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php }else{ ?>
                            <p class="card-text">
                                Muestra informacion De los ducumentos subidos
                            </p>
                            <?php } ?>

                            <!-- tabla de los documentos -->
                                <table class="display" id="tablita2">
                                  <thead>
                                    <tr>
                                      <th >Nombre del documento</th>
                                      <th >ano </th>
                                      <th >semestre</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php 
                                         $sql = "SELECT * from documentos";
                                         $result = mysqli_query($conexion, $sql);
                   
                                         while ($mostrar = mysqli_fetch_array($result)) {
                                      ?>
                                    <tr>
                                         <td><?=$mostrar['Documento']?></td>
                                         <td><?=$mostrar['año']?></td>
                                         <td><?=$mostrar['semestre']?></td>
                                    </tr>
                                    <?php }?>
                                  </tbody>
                                </table>
                            <!-- tabla de los documentos -->

                        </div>  
                </div>
        </div>
</section>
<!-- Section: Documentos files -->


</main>
<?php include 'includes/admin_bs/footer.php'  ?>