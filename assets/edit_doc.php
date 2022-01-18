<?php

include 'php/conexion_be.php';

session_start();

$obtenerID = $_GET['buscarId'];

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index2.php");
}  
$correo = $_SESSION['usuario'];

$sql = "SElECT * FROM usuarios WHERE Correo = '$correo'";
$resultado = $conexion->query($sql);
$rows = $resultado->fetch_assoc();

if(isset($obtenerID)){
   echo$obtenerID = $_GET['buscarId'];
   
    $obtenerDatos = $conexion->query("SELECT * FROM documentos WHERE idDoc=$obtenerID") or die($conexion->error);
    $arregloDoc = $obtenerDatos->fetch_assoc();
    $url_doc = $arregloDoc['url'];
    $periodo_doc = $arregloDoc['idperiodo'];
    $year_doc = $arregloDoc['año'];
}

if(isset($_POST['update_doc'])){
    echo "no entro";
    $id = $_GET['buscarId'];
    $doc_periodo = $_POST['semestre'];
    $doc_periodo = $_POST['fechas'];
    $docUser = $_FILES['doc'];
   
    $doc_name = $userDoc['name'];
    $doc_tmp = $userDoc['tmp_name'];
    $error = $userDoc['error'];
    
    if(empty($_FILES['doc']['name'] == false)){
        

        $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION); // aqui devolvemos el name de la ruta de la documento
        $doc_ex_lc = strtolower($doc_ex); // convierte un string en minusculas
        $allowed_exs = array('docx','pdf');  // extension permitida cana
        
        $new_doc_name = uniqid("PDF-", true).'.'.$doc_ex_lc; // esta puedes cambiarla,
        $doc_upload_path = 'Documentos/'.$correo.'/'.$new_doc_name; //la ruta donde se va guardar

        if(file_exists('Documentos/'.$correo)){ //revisamos si existe ese carpeta
            move_uploaded_file($doc_tmp, $doc_upload_path);
            }else{
            mkdir('Documentos/'.$correo);
           move_uploaded_file($doc_tmp, $doc_upload_path);
        }
         /*Query*/
         $query = "UPDATE documentos Documento='$doc_n', 
                    url='$new_doc_name', año='$doc_fecha', idperiodo='$doc_semestre' WHERE IdDoc='$id'"; 
         
         /*ejecutar query */
         $ejecutar = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
         if($ejecutar){
            echo '
            <script>
            alert ("Documento  update '  .$doc_fecha.'");
            window.location = "expen_cr.php";
            </script>
            ';
        }else{
            echo '
            <script>
            alert ("no se agrego nada");
            window.location = "expen_cr.php";
            </script>
            ';
    
        }
        mysqli_close ($conexion);
    
    }

     /*Query*/
     $query = "UPDATE documentos Documento='$doc_n', 
      año='$doc_fecha', idperiodo='$doc_semestre' WHERE IdDoc='$id'"; 
       /*ejecutar query */
       $ejecutar = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
       if($ejecutar){
          echo '
          <script>
          alert ("Documento Update ");
          window.location = "../expen_cr.php";
          </script>
          ';
      }else{
          echo '
          <script>
          alert ("no se agrego nada");
          window.location = "../expen_cr.php";
          </script>
          ';
  
      }
      mysqli_close ($conexion);
    
}

?>


<?php include 'includes/header.php' ?>


<div class="container d-flex justify-content-center ">
                  
                   
                    <form id="formedi" action="php/update_doc.php?buscarId=<?=$_GET['buscarId']?>" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <!-- CAMPO SELECIONAR PERIODO -->
                            <div class="col-md-6">
                                <label for="sems">Seleciona El periodo</label>
                                <select id="sems" class="form-select" aria-label="Default select example" name="semestre">
                                    <?php if($periodo_doc == 1) {?>
                                                <option selected value="1">Ene-Jun</option>
                                                <option value="2">Ago-Dic</option>
                                    <?php } else { ?>    
                                              <option value="1">Ene-Jun</option>
                                              <option selected value="2">Ago-Dic</option>
                                    <?php }?>   
                                </select>
                            </div>
                            <!-- CAMPO SELECIONAR PERIODO -->

                            <!-- CAMPO SELECIONAR ANO -->
                            <div class="col-md-6 align-self-end">
                                 <label for="nmyear">Seleciona El periodo</label>
                                <input id="nmyear" type="number" min="1900" max="2099" step="1" value="<?=$year_doc?>" name="fechas" />
                            </div>
                            <!-- CAMPO SELECIONAR ANO -->
                        </div>
                        <!-- CAMPO SELECIONAR PDF ADEMAS VISUALIzar pdf -->
                        <div class="row">
                                <div class="col-sm-8">
                                    <h5><?= $url_doc?></h5>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-primary" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                     Ver Pdf
                                    </button>  
                                </div>
                                <div class="col"></div>
                            </div>
                            
                            <div class="row">
                                <!-- campo de subir documento -->
                                <!-- no ses recomendable darle archivo pdf en el input file por cuestiione de seguridad -->
                                <div class="row mb-4">
                                    <div class="col-align-self-center">
                                        <div class="form-group files">
                                            <h1>Sube Documento PDF</h1>
                                            <input type="file" class="form-control" aria-label="file example" name="doc"  />
                                        </div>
                                    </div>
                                </div>
                                <!-- campo de subir documento -->
                                
                                <!-- vista del pdf del usuario -->
                                <div class="row mb-4 justify-content-center">
                                
                            </div>
                        <!-- vista del pdf del usuario -->
                        </div>
                        <!-- CAMPO SELECIONAR PDF ADEMAS VISUALIzar pdf -->
                              <div class="row justify-content-lg-end" style="background-color: #eee;">
                                  <div class="col-4"></div>
                            <div class="flex-column col-8  align-items-end">
                                <button class="btn btn-primary">Cancelar</button>
                                <button type="submit" value="update_doc" class="btn btn-primary" form="formedi">Actualizar</button>
                            </div>
                            
                        </div>
                    </form>
               
        
    
</div>

<div class="container">
        <div class="collapse" id="collapseExample">     
            <div class="card card-body ">
                <div class="ratio ratio-21x9">
                    <object class=""    type="application/pdf" data="<?php echo 'Documentos/'.$correo.'/'.$url_doc?>"></object>
                </div>
            </div>
        </div>
</div>





</main>
<?php include 'includes/footer.php'  ?>