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
    <title>Usuarios</title>
</head>
<body>
    <div id="titulo">
       <a href="./admin.php" class="nada"> <img src="../img/logoinmo.png" id="logo"></a>
       
    </div>
    <a href="../index.php" class="nada"> <img src="../img/cerrar_sesion.png" class="cerrar_sesion1"> </a>
    

    <div id="filtrar">
        <form action="" method="GET">
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo">
            <label for="id_usuario">ID de Usuario:</label>
            <input type="text" id="id_usuario" name="id_usuario">
            <button type="submit">Filtrar</button>
        </form>
    </div>
    <div class="tabla2">

        <?php
        //conectar con el servidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        // Construir la consulta SQL
        $query = "SELECT * FROM usuario";

        // Si se ha ingresado un correo o ID de usuario, agregar una cláusula WHERE a la consulta SQL
        if (isset($_GET['correo'])&& !empty($_GET['correo'])){
            $correo = $_GET['correo'];
            $query .= " WHERE correo = '$correo'";
        }
        elseif (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
            $id_usuario = $_GET['id_usuario'];
            $query .= " WHERE usuario_id = '$id_usuario'";
        }

        // Ejecutar la consulta SQL
        $consulta = mysqli_query($conexion, $query) or die ("Fallo de la consulta");

        // Mostrar el resultado de la consulta
        $nfilas = mysqli_num_rows($consulta); //devuelve el numero de filas

        if ($nfilas == 0) {
            echo "Error el usuario no existe";
        } else {
            echo "<table border='1'>";
            echo "<tr><th>Datos del usuario</th><th>Acción</th></tr>";

            while ($resultado = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<td class='datos'>". 
                "<li style='color:black;'><b>ID usuario: </b>". $resultado['usuario_id'] ."</li>".
                "<li style='color:black;'><b>Nombre: </b>". $resultado['nombres'] ."</li>".
                "<li style='color:black;'><b>Correo: </b>". $resultado['correo'] ."</li>".
                "<li style='color:black;'><b>Clave: </b>". $resultado['clave'] ."</li>".
                "<li style='color:black;'><b>Tipo de usuario: </b>". $resultado['tipo_usuario'] ."</li>".
                "</td>";
                echo "<td class='anadir1'><form action='./usuarios/modificarusu.php' method='POST'>
                <input type='hidden' name='id_usuario' value='" . $resultado['usuario_id'] . "'>
                <button type='submit'>Modificar usuario</button></form><br>
                <form action='./usuarios/borrarusu.php' method='POST'>
                <input type='hidden' name='id_usuario' value='" . $resultado['usuario_id'] . "'>
                <button type='submit'>Borrar usuario</button></form>
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
