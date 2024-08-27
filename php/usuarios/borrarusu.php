<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mensajes.css">
    <title>Borrar usuario</title>
</head>
<body>
    <div id="titulo">
       <a href="../../index.php" class="nada" > <img src="../../img/logoinmo.png" id="logo"></a>
    </div>  
    <?php
        $id= $_POST["id_usuario"];
        //conectar con el servidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        $query="delete from usuario where usuario_id=$id";
        

        if(mysqli_query($conexion,$query))
        {
            echo "<div class='borrado'>Usuario borrado corectamente</div>";
            echo "<div class='mensaje'><img src='../../img/arriba1.png' class='ok'></div>";
        }   else
        {
            echo "<div class='borrado'>Usuario NO borrado</div>";
            echo "<div class='mensaje'><img src='../../img/abajo.png' class='ok'></div>";
        }
        //cerrrar
            mysqli_close($conexion);
            ?>
</div>
</body>
</html>
