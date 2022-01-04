<?php

     session_start();
    
     include 'conexion_be.php';

     $correo = $_POST['Correo'];
     $password = $_POST['Password'];

          /* validar el correo y contraseña para iniciar sesión*/
     $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo= '$correo' AND Password= '$password'");
     
     


     if(mysqli_num_rows($validar_login) > 0 && ['IdRol'] == 1){
         
     $_SESSION['usuario'] = $correo;
     header("location: ../administrador.php");
     exit;
     }
     
     
     if(mysqli_num_rows($validar_login) > 0 && ['IdRol'] == 2){
               
               $_SESSION['usuario']= $correo;
               header("location: ../inicio.php");
               exit;
          }
         
    
    else{
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