<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mensajes.css">
    <title>Modificar usuario</title>
</head>
<body>
    <div id="titulo">
       <a href="../../index.php" class="nada" > <img src="../../img/logoinmo.png" id="logo"></a>
    </div>
    <?php
        $id= $_POST["id_usuario"];
        //conectar con el sercvidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        $query="select * from usuario where usuario_id='$id'";
        //echo $query.<br> ; para comprobar errores de mysql

        $consulta = mysqli_query($conexion,$query) or die ("Fallo de la consulta");
        //Mostrar el resultado de la consulta
        $nfilas = mysqli_num_rows($consulta); //devuelve el numero de filas

        if($nfilas <> 1)
        {
            echo "Error";
        }  
         else
        {
            
            $resultado = mysqli_fetch_array($consulta);
            //echo "Usuario correcto";
            echo "<div class='uno'><form action='modificarusu2.php' method='GET'>";  
            echo "<b>Nuevo nombre de usuario:</b> <pre><input type='text' name='textusuario' value=".$resultado['nombre']."></pre>";
            echo "<b>Correo:</b> <pre><input type='text' name='textcorreo' value=".$resultado['correo']."></pre>";
            echo "<b>Conraseña:</b> <pre><input type='text' name='textpassword' value=".$resultado['clave']."></pre>";
            echo "<input type='hidden' name='textid' value=".$resultado['usuario_id']."><br>";
            echo "Usuario: <input type='submit' name='Actualizar' class='boton1' value='Actualizar'>";
            echo "</form></div>";
        }
        //cerrrar
            mysqli_close($conexion);
            ?>
</body>