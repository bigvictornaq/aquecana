<!DOCTYPE html>
<html lang="es">

<head> 
<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Usuario</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- boostrap -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
  rel="stylesheet"
/>
  <!-- css de datatable cdn para tablas mamalonas -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
 
  <!-- css de datatable cdn para tablas mamalonas -->
    <!-- custom estilos -->
<link rel="stylesheet" href="css/admin_fb.css" /> 
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
<!-- JS de datatable es cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JS de datatable es cdn -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</head>                              
<body class="bg-light">
<header>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid justify-content-between">
    <!-- componentes izquierda -->
    <div>
    <a class="navbar-brand" href="#">
      <img
        src="../assets/images/logo_tec_juarez3.png"

      />
      <small>Departamento de Sistemas</small>
    </a>
    </div>
    <!-- componentes izquierda -->
    
    <!-- componetes centro -->
    <div>      
        <!-- validacion de usuario -->          
            <a class="btn btn-outline-dark btn-rounded" role='button' href="inicio.php"><i class="fas fa-home fa-lg me-2"></i>Inicio</a>
 
          <a class="btn btn-outline-dark btn-rounded" role='button' href="expedientes.php"><i class="fas fa-file-contract fa-lg me-2"></i>Expedientes</a>
    </div>
    <!-- componetes centro -->

    <!-- componetes derecha -->
    <div class="hover-zoom">
    <a class="btn btn-outline-danger btn-rounded " role='button' href="php/cerrar_sesion.php">
            <i class="fas fa-sign-out-alt fa-lg me-2"></i></a>
    </div>
    <!-- componetes derecha -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar --> 
</header>
<main>
  <!-- background blanco -->
  <section class="bg-white mb-4 shadow-3">
        <div class="container">
          <!-- section : las imagenes del pefil -->
          <section class="mb-5">
            <!-- Background image -->

                  <?php 
                      $emails = utf8_decode($rows['Correo']);
                      $profi = utf8_decode($rows['Perfil']);
                      $portada = utf8_decode($rows['Portada']);

                     
                       
                  if(file_exists("../assets/photo_profile/{$emails}/CoverPhoto/{$profi}") && file_exists('../assets/photo_profile/'.utf8_decode($rows['Correo']).'/CirclePhoto/'.utf8_decode($rows['Portada']))){?>
              
              <!-- div: contiene la imagen de la portada del inicio -->
               <div
               class="p-5 text-center bg-image shadow-1-strong rounded-bottom"
               style="
                background-image: url('../assets/photo_profile/<?php echo  utf8_decode($rows['Correo']).'/CoverPhoto/'.utf8_decode($rows['Perfil'])?>');
                height: 400px;
                ">
                 </div>
                 <!-- div: contiene la imagen de la portada del inicio -->

                 <!-- div: contiene la imagen del circulo del inicio -->
                 <div class="d-flex justify-content-center">
                   <img 
                   src="../assets/photo_profile/<?php echo utf8_decode($rows['Correo']).'/CirclePhoto/'.utf8_decode($rows['Portada']); ?> " 
                   alt="" class="rounded-circle shadow-3-strong position-absolute" style="width: 168px; margin-top: -140px;">
                      <!-- Button: Boton para cambiar foto Circulo -->
                      <button type="button" class="btn btn-dark btn-floating"
                                data-mdb-toggle="modal"
                                data-mdb-target="#staticCirclePhoto"
                                style="margin-left: 100px; margin-top: -17px">
                            <i class="fas fa-camera-retro fa-2x"></i>
                        </button>
                      <!-- Button: Boton para cambiar foto Circulo -->
                  </div>
                  <!-- div: contiene la imagen del circulo del inicio -->

                  <!-- DIV: contiene el boton cabiar foto de portada -->
                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light shadow-2-strong position-absolute"
                    data-mdb-toggle="modal"
                    data-mdb-target="#staticCoverPhoto"
                    style="margin-right: 50px; margin-top: -85px">
                    <i class="fas fa-camera-retro fa-lg"></i>
                    Cambiar Foto de Portada
                  </button>
                </div>
                <!-- DIV: contiene el boton cabiar foto de portada -->

                  <?php }else{ ?>
                    
                         <div
                          class="p-5 text-center bg-image shadow-1-strong rounded-bottom"
                          style="
                          background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
                          height: 400px;
                        ">
                         </div>
                    <div class="d-flex justify-content-center">
                             <img 
                               src="../assets/images/Avatar.jpg" 
                               alt="" class="rounded-circle shadow-3-strong position-absolute" style="width: 168px; margin-top: -140px;">
                            <!-- Button: Boton para cambiar foto Circulo -->
                      <button type="button" class="btn btn-dark btn-floating"
                                data-mdb-toggle="modal"
                                data-mdb-target="#staticCirclePhoto"
                                style="margin-left: 100px; margin-top: -17px">
                            <i class="fas fa-camera-retro fa-2x"></i>
                        </button>
                      <!-- Button: Boton para cambiar foto Circulo -->   
                    </div>
                    <!-- DIV: contiene el boton cabiar foto de portada -->
                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light shadow-2-strong position-absolute"
                    data-mdb-toggle="modal"
                    data-mdb-target="#staticCoverPhoto"
                    style="margin-right: 50px; margin-top: -85px">
                    <i class="fas fa-camera-retro fa-lg"></i>
                    Cambiar Foto de Portada
                  </button>
                </div>
                <!-- DIV: contiene el boton cabiar foto de portada -->

                  <?php }?>
                 
                <!-- Background image -->
          </section>
          <!-- section : las imagenes del pefil -->

          <!-- Section: datos del pefil -->
          <section class="text-center border-bottom">
            <div class="row d-flex justify-content-center">
            <div class="col-md-6">
            <h2><strong><?php echo utf8_decode($rows['Nombre_Completo']); ?></strong></h2>
             <p class="text-muted"><?php echo utf8_decode($rows['Biografia']); ?></p>
            </div>
              </div>
          </section>
          <!-- Section: datos del pefil -->

          <!-- Section: opcion de botones para usuario -->
          <section class="py-3 d-flex justify-content-between align-items-center">
                <!-- elementos de la izquierda -->
                <div>
              
                </div>
                <!-- elementos de la izquierda -->

                <!-- elementos de la Derecha -->
                <div>
                <a href="edit_profile.php" class="btn btn-light" datadata-ripple-color="dark"><i class="fas fa-edit me-2"></i>Editar Pefil</a>
                  <!-- <button type="button" class="btn btn-light" datadata-ripple-color="dark"><i class="fas fa-edit me-2"></i>Editar Pefil</button> -->
                </div>
                <!-- elementos de la Derecha -->
          </section>
          <!-- Section: opcion de botones para  usuario -->

          </div>
  </section>

   <!-- Modal: formulario para cambiar foto de porrada-->
   <div
    class="modal fade"
    id="staticCoverPhoto"
    data-mdb-backdrop="static"
    data-mdb-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Foto de Portada</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
                    <form id="nameCoverPhoto" action="includes/fotoup.php" method="post" enctype="multipart/form-data">
                      <div class="col-align-self-center">
                        <div class="form-group files">
                          <input type="file" class="form-control" aria-label="file example" name="userCover" required />
                        </div>
                      </div>
                    </form>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" value="update" form="nameCoverPhoto" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal: formulario para cambiar foto de porrada-->
          
          <!-- Modal: formulario para cambiar foto de circulo-->
          <div
          class="modal fade"
          id="staticCirclePhoto"
          data-mdb-backdrop="static"
          data-mdb-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
          >
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Foto de Pefil</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form id="nameCirclePhoto" action="includes/fotoup.php" method="post" enctype="multipart/form-data">
                  <div class="col-align-self-center">
                    <div class="form-group files">
                      <input type="file" class="form-control" aria-label="file example" name="userCircle" required />
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="submit" value="update" form="nameCirclePhoto" class="btn btn-primary">Understood</button>
              </div>
            </div>
          </div>
        </div>
        
    <!-- Modal: formulario para cambiar foto de circulo-->

  <!-- background blanco -->