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
                                          <form id="nameform" class="was-validated" action="php/add_docs.php" method="POST" enctype="multipart/form-data">
                                                        <!-- campo de subir documento -->
                                                        <div class="row">
                                                          <div class="col-align-self-center">
                                                            <div class="form-group files">
                                                              <h1>Sube Documento PDF</h1>
                                                              <input type="file" class="form-control" aria-label="file example" name="doc" required />
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <!-- campo de subir documento -->

                                                        <!-- compos de fecha de periodo algo asi -->
                                                        <div class="row mb-2">
                                                          <div class="col-7">
                                                            <select class="form-select" aria-label="Default select example" name="semestre">
                                                              <option selected>Seleciona el semestre</option>
                                                              <option value="1">Ene-Jun</option>
                                                              <option value="2">Ago-Dic</option>
                                                            </select>
                                                          </div>
                                                          <div class="col-4">
                                                          <label class="control-label" for="date" >Fecha</label>
                                                          <?php $year =  date("Y");?>
                                                          <input type="number" min="1900" max="2099" step="1" value="<?php echo date("Y");?>" name="fechas" />
                                                            
                                                        </div>
                                                        </div>
                                                       
                                                        <!-- compos de fecha de periodo algo asi -->
                                                        

                                                </form>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                         Close
                                        </button>
                                        <button  class="btn btn-primary" type="submit" value="upload" form="nameform">
                                        agregar documento
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
                                      <th >semestre </th>
                                      <th >año</th>
                                      <th >operaciones</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php 
                                         $sql = "SELECT documentos.idDoc, documentos.url, periodo.fecha_estipada, documentos.año  
                                                  FROM documentos INNER JOIN periodo ON documentos.idperiodo=periodo.id_periodo";
                                         $result = mysqli_query($conexion, $sql);
                                        // $mostra = mysqli_fetch_array($result);
                   
                                         while ($mostrar = mysqli_fetch_array($result)) {
                                      ?>
                                    <tr>
                                         <td><?=$mostrar['url']?></td>
                                         <td><?=$mostrar['fecha_estipada']?>-<?=$mostrar['año']?></td> 
                                         <td><?=$mostrar['año']?></td>
                                         <td>
                                        <a href="php/deletedoc.php?buscarId=<?= $mostrar['idDoc'] ?>" class="btn btn-danger  btn-rounded">Eliminar</a>
                                        <a href="edit_doc.php?buscarId=<?= $mostrar['idDoc'] ?>" class="btn btn-warning  btn-rounded">Actualizar</a>
                                        <a href="Documentos/<?php echo $correo.'/'.$mostrar['url'];?>" class="btn btn-info  btn-rounded" target="_blank" >Ver PDF</a>
                                        </td>
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
<?php include 'includes/footer.php'  ?>