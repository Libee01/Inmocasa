<?php
// Iniciar o reanudar la sesión
session_start();

// Obtener el ID del piso enviado desde el formulario
$id_piso = $_POST['id_piso'];

// Almacenar el ID del piso en una variable de sesión
$_SESSION['carrito'][] = $id_piso;

// Redirigir a la página anterior
header("Location: carrito.php");
?>
