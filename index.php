<?php
    //Crear una sesión en caso de no haberla
    session_start();
    //Destruir la sesión del usuario al acceder a esta página
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/index.js"></script>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <title>Página de Inicio</title>
</head>
<body>

<div class="container">
    <div class="logo" onclick="hideLogoAndShowForm()">
        <img class="logo1" src="./img/logoinmo.png" alt="Logo" id="logo">
    </div>
    <div class="login-form" id="loginForm">
        <img src="./img/logoinmo2.png" class="logo2">
        <form>
            <button type="button" onclick="hideLogoAndShowForm2()" id="ir">Iniciar sesión</button>
            <button type="button" onclick="showRegistrationForm()">Registrarse</button>
            <button type="button" onclick="listar()">Iniciar como invitado</button>
            <button type="button" onclick="goBackToHome()">Volver al inicio</button>
        </form>
    </div>
    <div class="login-form2" id="loginForm2" onsubmit="return validar1()">
    <img src="./img/logoinmo2.png" class="logo2">
        <form action="./php/login.php" method="post">
            <label for="username">Email:</label>
                <input type="text" id="correo" name="email" required>
            <label for="password">Contraseña:</label>
                <input type="password" id="pass" name="password" required>
            <button type="submit">Iniciar sesión</button>
            <button type="button" onclick="showButtons()">Volver</button>
        </form>
    </div>
    <div class="register-form" id="registerForm" onsubmit="return validar2()">
        <form action="./php/registro.php" method="post">
            <label for="username">Usuario:</label>
                <input type="text" id="username" name="user" required>
            <label for="email">Email:</label>
                <input type="text" id="correo2" name="email" required>
            <label for="password">Contraseña:</label>
                <input type="password" id="pass2" name="password" required>
            <label>Tipo de usuario:</label> <select name="tipo_usuario" class="elegir">
                <option value="comprador">Comprador</option>
                <option value="vendedor">Vendedor</option>
            </select>
            <button type="submit">Registrarse</button>
            <button type="button" onclick="showButtons()">Volver</button>
        </form>
    </div>
</div>
</body>
</html>