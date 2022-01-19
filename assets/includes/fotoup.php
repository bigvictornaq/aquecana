<?php

include '../php/conexion_be.php';

session_start();

//assets\photo_profile


$correo = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index2.php");
}

$sql = "SElECT IdRol FROM usuarios WHERE Correo = '$correo'";
$resultado = $conexion->query($sql) or die($conexion->error);
$roles = $resultado->fetch_assoc();



// echo $correo;

// if(!mkdir('../photo_profile/'.$correo.'/CoverPhoto',0777,true)){
//     echo("No se creo ni madrs wey vete alv");

//assets\photo_profile\javier.yair78@gmail.com\CoverPhoto

// }else {
//     echo "si creo ";
// }

if($_SERVER["REQUEST_METHOD"] == 'POST'){
  
    $userImage = $_FILES['userCover'];
    $userCircle = $_FILES['userCircle'];

    if(!empty($userImage)){
        $img_name = $userImage['name'];
        $img_size = $userImage['size'];
        $tmp_name = $userImage['tmp_name'];
        $error = $userImage['error'];

        if($error === 0){
            if($img_size > 125000){
                $em = "Disculpe carnal, pero su foto esta muy pesada  la neta.";
                header("Location: ../perfil.php?error=$em");
            }else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); // aqui devolvemos el name de la ruta de la imagen
                $img_ex_lc = strtolower($img_ex); // convierte un string en minusculas
                $allowed_exs = array("jpg", "jpeg", "png");  // extension permitida cana
                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc; // esta puedes cambiarla,
                    //lo que hace crear un nombre con identificador unico

                    //para que no tengas problemas al momento de guardarlo.
                    // aqui lo guardar en la ruta de tu pc
                    $img_upload_path = '../photo_profile/'.$correo.'/CoverPhoto/'.$new_img_name;
                    
                   


                    if(file_exists('../photo_profile/'.$correo.'/CoverPhoto')){ //revisamos si existe ese carpeta
                           
                        $photoss = glob('../photo_profile/'.$correo.'/CoverPhoto/*');
                        if(!empty($photoss)){
                            foreach ($photoss as $photo) {
                                if (is_file($photo)){
                                    unlink($photo);
                                }
                            }
                        }
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }else{

                        mkdir('../photo_profile/'.$correo.'/CoverPhoto',0777,true);
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }


                    // aqui movemos a la base de datos
                    $sql = "UPDATE usuarios SET Perfil = '$new_img_name' WHERE Correo = '$correo'";
                    $resultado =  mysqli_query($conexion, $sql);
                    if (utf8_decode($roles['IdRol']) == 2){
                        echo "si lo saco el rol";
                    }
                   // header("location: ../inicio.php?error=$resultado");
                }else{
                    $em = "No puedes subir archivos de este tipo";
                    header("Location: ../inicio.php?error=$em");
                }
            }
        }
    }else{
        echo "novboday is for image circle";
    }

}




