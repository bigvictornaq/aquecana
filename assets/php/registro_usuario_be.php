<?php

include 'conexion_be.php';

/*variables de almacenamiento*/
$nombre_completo = $_POST['Nombre_Completo'];
$correo = $_POST['Correo'];
$password = $_POST['Password'];
$idrol = $_POST['IdRol'];

/*Query*/
$query = "INSERT INTO usuarios(Nombre_Completo, Correo, Password, IdRol )
VALUES ('$nombre_completo', '$correo', '$password' '2')";

/* ejecutar una comprobación (que no se repitan datos (correo)) */
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo ='$correo'");

if(mysqli_num_rows($verificar_correo) > 0){
    echo '
    <script>
    alert ("este correo ya existe, si olvido la contraseña contacte con el administrador");
    window.location = "../index2.php";
    </script>;
    ';
    exit();
}

/*ejecutar query */
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
    alert ("usuario registrado satisfactoriamente");
    window.location = "../index2.php";
    </script>
    ';
    
}else{
    echo'<script>
    alert ("usuario no registrado intentalo nuevamente");
    window.location = "../index2.php";
    </script>
    ';
}
mysqli_close ($conexion);

?>