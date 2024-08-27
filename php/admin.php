<?php
    session_start();
    
    // Verificar si el usuario no está autenticado
    if($_SESSION['loggedin'] !== true || $_SESSION['tipousu'] !== 'administrador'){
        // Redirigir a la página de inicio de sesión
        header("Location: ../index.php");
        exit;
    }
    $username = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/index.js"></script>
    <link rel="icon" href="../img/logo.ico" type="image/x-icon">
    <title>Administración</title>
</head>
<body>
    <div class="container">
    <div class="logo" onclick="hideLogoAndShowForm()">
        <img class="logo1" src="../img/logoinmo.png" alt="Logo" id="logo">
    </div>
    <div class="login-form" id="loginForm">
        <img src="../img/logoinmo2.png" class="logo2">
        <form>
            <button type="button" onclick="pisos()">Pisos</button>
            <button type="button" onclick="usuarios()">Usuarios</button>
            <button type="button" onclick="goBackToHome()">Volver al inicio</button>
        </form>
    </div>

</div>
</body>
</html>

