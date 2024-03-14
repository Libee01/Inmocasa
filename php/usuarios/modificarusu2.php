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
        $id = $_REQUEST["textid"];
        $nuevo_nombre = $_REQUEST["textusuario"]; //más controles
        $nuevo_correo = $_REQUEST["textcorreo"];
        $nuevo_pass = $_REQUEST["textpassword"];
        $password_hash = password_hash($nuevo_pass, PASSWORD_BCRYPT);
        //conectar con el sercvidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        $query="update usuario set nombres='$nuevo_nombre', correo='$nuevo_correo', clave='$password_hash' where usuario_id='$id'";
        //echo $query.<br> ; para comprobar errores de mysql

        if(mysqli_query($conexion,$query))
        {
            echo "<div class='borrado'>Usuario Actualizado</div>";
            echo "<div class='mensaje'><img src='../../img/arriba1.png' class='ok'></div>";
        }   else
        {
            echo "<div class='borrado'>Piso NO Borrado</div>";
            echo "<div class='mensaje'><img src='../../img/abajo.png' class='ok'></di>";
        }
        //cerrrar
            mysqli_close($conexion);
    ?>
</body>