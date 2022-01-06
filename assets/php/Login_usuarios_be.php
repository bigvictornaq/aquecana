<?php

     session_start();
    
     include 'conexion_be.php';

     /**Determinar  si no son null los variables */
     if(isset($_POST['Correo']) && isset($_POST['Password'])){
     
          function probar_campo($data){
               $data = trim($data); //elimiar espacios incio y final
               $data = stripslashes($data); //elimiar las barras invertidas
               $data = htmlspecialchars($data); //convierte caracteres especiales en entidades html
               return $data;
          }

          $correo = probar_campo($_POST['Correo']);
          $password = probar_campo($_POST['Password']);

          if(empty($correo)){
               header("location: ../index2.php?error=Correo es requerido carnal!!");
          }else if(empty($password)){
               //corrige la palabra contrasena
               header("location: ../index2.php?error=Contrasena es requerido carnal!! {$correo}");
          }else{
               /* validar el correo y contraseña para iniciar sesión, ademas se checa si hay error query*/
               $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo= '$correo' 
                                   AND Password= '$password'") or die(mysqli_error($conexion));

               if(mysqli_num_rows($validar_login) === 1){
                    //correo debe ser unico cana si no vale x===D
                    $row = mysqli_fetch_assoc($validar_login); // hay que obtener los datos alv
                    if($row['Password'] === $password ){
                         if((int)$row['IdRol'] === 1){
                              $_SESSION['usuario'] = $correo;
                              $_SESSION['rol'] = (int)$row['IdRol'];
                              header("location: ../administrador.php");
                              exit; 
                         }else if((int)$row['IdRol'] === 2){
                              echo 'nelsonsss';
                              $_SESSION['usuario']= $correo;
                              header("location: ../inicio.php");
                              exit;
                         }
                    }
               }else{
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    header("location: ../index2.php?error=Correo es requerido carnal!!");
               }
          }

     }else{
          //header("Location: ../index2.php");
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
     
              echo'
              <script>
              alert ("usuario no encontrado o no existe, verifique sus datos");
              alert ("si olvido su contraseña contacte con el administrador");
              window.location = "../index2.php";
              </script>
              ';
              exit;
     }

?>