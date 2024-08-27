<?php
session_start();
    
// Verificar si el usuario no está autenticado
if($_SESSION['loggedin'] !== true || $_SESSION['tipousu'] !== 'administrador'){
    // Redirigir a la página de inicio de sesión
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listarpiso.css">
    <link rel="icon" href="../img/logo.ico" type="image/x-icon">
    <title>Pisos</title>
</head>
<body>
    <div id="titulo">
       <a href="./admin.php" class="nada" > <img src="../img/logoinmo.png" id="logo"></a>
       
    </div>
    <a href="../index.php" class="nada"> <img src="../img/cerrar_sesion.png" class="cerrar_sesion1"> </a>
    

    <div id="filtrar">
        <form action="" method="GET">
            <label for="id_usuario">ID de Usuario:</label>
            <input type="text" id="id_usuario" name="id_usuario">
            <button type="submit">Filtrar</button>
        </form>
    </div>
    <div class="tabla1">

        <?php
        //conectar con el servidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        // Construir la consulta SQL
        $query = "SELECT * FROM pisos";

        // Si se ha ingresado un correo o ID de usuario, agregar una cláusula WHERE a la consulta SQL
        if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
            $id_usuario = $_GET['id_usuario'];
            $query .= " WHERE usuario_id = '$id_usuario'";
        }

        // Ejecutar la consulta SQL
        $consulta = mysqli_query($conexion, $query) or die ("Fallo de la consulta");

        // Mostrar el resultado de la consulta
        $nfilas = mysqli_num_rows($consulta); //devuelve el numero de filas

        if ($nfilas == 0) {
            echo "<p class='error-message2'>No hay pisos en venta asociados a ese usuario</p>";
        } else {
            echo "<table border='1'>";
            echo "<tr><th>Calle</th><th>Imagen</th><th>Acción</th></tr>";

            while ($resultado = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<td class='datos'>". "<ul style='color:black; font-size:1.2em;'><b>Ubicado en</b></ul>". 
                "<li style='color:black;'><b>Código Piso: </b>". $resultado['codigo_piso'] ."</li>".
                "<li style='color:black;'><b>Calle: </b>". $resultado['calle'] ."</li>".
                "<li style='color:black;'><b>Número: </b>". $resultado['numero'] ."</li>".
                "<li style='color:black;'><b>Piso: </b>". $resultado['piso'] ."</li>".
                "<li style='color:black;'><b>Puerta: </b>". $resultado['puerta'] ."</li>".
                "<li style='color:black;'><b>Código Postal: </b>". $resultado['cp'] ."</li>".
                "<li style='color:black;'><b>Metros: </b>". $resultado['metros'] ."</li>".
                "<li style='color:black;'><b>Zona: </b>". $resultado['zona'] ."</li>".
                "<li style='color:black;'><b>Precio: </b>". $resultado['precio'] ."</li>".
                "<li style='color:black;'><b>Código usuario: </b>". $resultado['usuario_id'] ."</li>".
                "</td>";
                echo "<td class='imgpiso'><img class='imgpiso' src='./pisos/img/" . $resultado['imagen'] . "'/></td>";
                echo "<td class='anadir'><form action='./pisos/modificarpiso.php' method='POST'>
                <input type='hidden' name='id_piso' value='" . $resultado['codigo_piso'] . "'>
                <button type='submit'>Modificar piso</button></form><br>
                <form action='./pisos/borrarpiso.php' method='POST'>
                <input type='hidden' name='id_piso' value='" . $resultado['codigo_piso'] . "'>
                <button type='submit'>Borrar piso</button></form>
                </td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        //cerrar
        mysqli_close($conexion);
        ?>
    </div>
</body>
</html>
