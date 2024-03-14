<?php
// Iniciar o reanudar la sesión
session_start();

//conectar con el servidor de base de datos
$conexion = mysqli_connect("localhost", "root", "rootroot")
or die ("No se puede conectar con el servidor");

//seleccionar base de datos
mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

// Obtener el ID del piso enviado desde el formulario
$id_piso = $_POST['id_piso'];
$id_usuario = $_POST['id_usuario'];
$precio=$_POST['precio'];

// Insertar el piso en la tabla comprados
$query_insertar = "INSERT INTO comprados (usuario_comprador, codigo_piso,precio_final) VALUES ('$id_usuario', '$id_piso','$precio')";

echo "Gracias por confiar en nosotros para comprar tu hogar";   
mysqli_query($conexion, $query_insertar) or die ("Fallo de la consulta");

// Eliminar el piso de la tabla pisos
$query_eliminar = "DELETE FROM pisos WHERE Codigo_piso = '$id_piso'";
mysqli_query($conexion, $query_eliminar) or die ("Fallo al eliminar el piso de la tabla pisos");

// Eliminar el ID del piso del carrito
$key = array_search($id_piso, $_SESSION['carrito']);
if ($key !== false) {
    unset($_SESSION['carrito'][$key]);
}

// Cerrar la conexión
mysqli_close($conexion);

// Redirigir a la página del carrito
header("Location: listarpiso.php");
?>