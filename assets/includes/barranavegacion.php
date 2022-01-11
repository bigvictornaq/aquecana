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
               <div
                class="p-5 text-center bg-image shadow-1-strong rounded-bottom"
                style="
                background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
                height: 400px;
              ">
                 </div>
                  <?php 
                      $nombre1 = utf8_decode($rows['Correo']);
                      $nombre2 = utf8_decode($rows['Perfil']);
                  if(file_exists("../fotos de perfil/{$nombre1}/{$nombre2}")){?>
                   <div class="d-flex justify-content-center">
                   <img 
                 src="../assets/fotos de perfil/<?php echo utf8_decode($rows['Correo']); ?>/<?php echo utf8_decode($rows['Perfil']); ?> " 
               alt="" class="rounded-circle shadow-3-strong position-absolute" style="width: 168px; margin-top: -140px;">
                </div>
                  <?php }else{ ?>
                    <div class="d-flex justify-content-center">
                   <img 
                 src="../assets/images/Avatar.jpg" 
               alt="" class="rounded-circle shadow-3-strong position-absolute" style="width: 168px; margin-top: -140px;">
                </div>
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
                  <button type="button" onclick="window.location.href='expen_cr.php'" class="btn btn-link text-reset" datadata-ripple-color="dark">Documnetos(Expedientes)</button>
                </div>
                <!-- elementos de la izquierda -->

                <!-- elementos de la Derecha -->
                <div>
                  <button type="button" class="btn btn-light" datadata-ripple-color="dark"><i class="fas fa-edit me-2"></i>Editar Pefil</button>
                </div>
                <!-- elementos de la Derecha -->
          </section>
          <!-- Section: opcion de botones para  usuario -->

          </div>
  </section>
  <!-- background blanco -->