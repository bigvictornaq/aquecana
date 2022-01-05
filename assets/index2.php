<!--inicio de sesion-->
<?php
  session_start();
  
  // Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
  error_reporting(E_ALL);
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!--fuente roboto-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/estilos2.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/Login_usuarios_be.php" method = "POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <?php if(isset($_GET['error'])){ ?>
                            <div class="err_nav">
                            <?= $_GET['error'] ?>
                        </div>
                       <?php } ?>
                        <input type="text" placeholder="Correo Institucional" name= "Correo">
                        <input type="password" placeholder="Contraseña" name = "Password">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre completo" name= "Nombre_Completo">
                        <input type="text" placeholder="Correo Institucional" name= "Correo">
                        <input type="password" placeholder="Contraseña" name= "Password">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="js/Script.js"></script>
</body>
</html>