<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mensajes.css">
    </style>
    <title>Borrar piso</title>
</head>
<body>
    <div id="titulo">
       <a href="../../index.php" class="nada" > <img src="../../img/logoinmo.png" id="logo"></a>
    </div>
    <?php
        $id_piso = $_POST['id_piso'];
        //conectar con el sercvidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        $query="delete from pisos where Codigo_piso='$id_piso'";
        //echo $query.<br> ; para comprobar errores de mysql

        if(mysqli_query($conexion,$query))
        {
            
            echo "<div class='borrado'>Piso Borrado</div>";
            echo "<div class='mensaje'><img src='../../img/arriba1.png' class='ok'></div>";
        }   
        else
        {
            echo "<div class='borrado'>Piso NO Borrado</div>";
            echo "<div class='mensaje'><img src='../../img/abajo.png' class='ok'></div>";
            
        }
        //cerrrar
            mysqli_close($conexion);
?>
</div>
</body>