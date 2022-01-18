<?php

include 'conexion_be.php';

$obtenerID = $_GET['buscarId'];
echo  $obtenerID;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "no entro";
    $id = $_GET['buscarId'];
    $doc_periodo = $_POST['semestre'];
    $doc_fecha = $_POST['fechas'];
    $docUser = $_FILES['doc'];
   
    $doc_name = $docUser['name'];
    $doc_tmp = $docUser['tmp_name'];
    $error = $docUser['error'];
    
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
         $query = "UPDATE documentos SET Documento='$doc_n', 
                    url='$new_doc_name', año='$doc_fecha', idperiodo='$doc_periodo' WHERE IdDoc='$id'"; 
         
         /*ejecutar query */
         $ejecutar = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
         if($ejecutar){
            echo '
            <script>
            alert ("Documento  update '  .$doc_fecha.'");
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

     /*Query*/
     $query = "UPDATE documentos SET
      año='$doc_fecha', idperiodo='$doc_periodo' WHERE IdDoc ='$id' "; 
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