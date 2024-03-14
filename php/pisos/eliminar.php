<?php
// Iniciar o reanudar la sesión
session_start();

// Obtener el ID del piso enviado desde el formulario
$id_piso = $_POST['id_piso'];

// Buscar el ID del piso en el array de carrito y eliminarlo
$key = array_search($id_piso, $_SESSION['carrito']);
if ($key !== false) {
    unset($_SESSION['carrito'][$key]);
}

// Redirigir a la página del carrito
header("Location: carrito.php");
?>
