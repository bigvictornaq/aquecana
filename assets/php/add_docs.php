<?php
include 'conexion_be.php';

session_start();


$correo = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index2.php");
}


    
    $userDoc = $_FILES['doc'];
    $doc_n = "pdf_file";
    $doc_semestre = $_POST['semestre'];
    $doc_fecha = $_POST['fechas'];

    $doc_name = $userDoc['name'];
    $doc_tmp = $userDoc['tmp_name'];
    $error = $userDoc['error'];
    

    $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION); // aqui devolvemos el name de la ruta de la imagen
    $doc_ex_lc = strtolower($doc_ex); // convierte un string en minusculas
    $allowed_exs = array('docx','pdf');  // extension permitida cana

    
        $new_doc_name = uniqid("PDF-", true).'.'.$doc_ex_lc; // esta puedes cambiarla,
        $doc_upload_path = '../Documentos/'.$correo.'/'.$new_doc_name; //la ruta donde se va guardar

        if(file_exists('../Documentos/'.$correo)){ //revisamos si existe ese carpeta
            move_uploaded_file($doc_tmp, $doc_upload_path);
            }else{
            mkdir('../Documentos/'.$correo);
           move_uploaded_file($doc_tmp, $doc_upload_path);
        }	
     

            /*Query*/
            $query = "INSERT INTO documentos(Documento, url, año, idperiodo,semestre )
            VALUES ('$doc_n', '$new_doc_name', '$doc_fecha' , $doc_semestre, $doc_semestre)"; 
            
            /*ejecutar query */
            $ejecutar = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        
            if($ejecutar){
                echo '
                <script>
                alert ("Documento '  .$doc_fecha.'");
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

        
    
    // fin del cheque de documentro
    



