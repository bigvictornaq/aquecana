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
<script>
  $(document).ready( function () {
    $('#table_id').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">'
    });
} );
</script>
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
          <a class="btn btn-outline-dark btn-rounded" role='button' href="#">
            <i class="fas fa-home fa-lg me-2"></i>Inicio</a>
          <a class="btn btn-outline-dark btn-rounded" role='button' href="#">
            <i class="fas fa-file-contract fa-lg me-2"></i>Expedientes</a>
    </div>
    <!-- componetes centro -->

    <!-- componetes derecha -->
    <div class="hover-zoom">
    <a class="btn btn-outline-danger btn-rounded " role='button' href="#">
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
                  <div class="d-flex justify-content-center">
                   <img 
                 src="https://pbs.twimg.com/media/FEaQX5fXoA8r0eT.jpg" 
               alt="" class="rounded-circle shadow-3-strong position-absolute" style="width: 168px; margin-top: -140px;">
                </div>
                <!-- Background image -->
          </section>
          <!-- section : las imagenes del pefil -->

          <!-- Section: datos del pefil -->
          <section class="text-center border-bottom">
            <div class="row d-flex justify-content-center">
            <div class="col-md-6">
            <h2><strong>Carlos Ruiz</strong></h2>
             <p class="text-muted">administrador</p>
            </div>
              </div>
          </section>
          <!-- Section: datos del pefil -->

          <!-- Section: opcion de botones para usuario -->
          <section class="py-3 d-flex justify-content-between align-items-center">
                <!-- elementos de la izquierda -->
                <div>
                  <!-- opcion para administrador -->
                  <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark">Usurios</button>
                  <!-- opcion para administrador -->
                  <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark">Documnetos(Expedientes)</button>
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
<footer>

</footer>
</body>

</html>
