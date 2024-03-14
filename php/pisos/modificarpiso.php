<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mensajes.css">
    <title>Modificar piso</title>
</head>
<body>
    <div id="titulo">
       <a href="../../index.php" class="nada" > <img src="../../img/logoinmo.png" id="logo"></a>
    </div>
    <?php
        $id_piso = $_POST['id_piso']; //más controles
        //conectar con el sercvidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        $query="select * from pisos where Codigo_piso='$id_piso'";
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
            echo "<div class='uno'><form action='modificarpiso2.php' enctype='multipart/form-data' method='POST'>";
            echo "<input type='hidden' name='textcodigo' value=".$resultado['Codigo_piso']."><br>";
            echo "<b>Calle:</b> <pre><input type='text' name='textcalle' value=".$resultado['calle']."></pre>";
            echo "<b>Número:</b> <pre><input type='text' name='textnumero' value=".$resultado['numero']."></pre>";
            echo "<b>Piso:</b> <pre><input type='text' name='textpiso' value=".$resultado['piso']."></pre>";
            echo "<b>Puerta:</b> <pre><input type='text' name='textpuerta' value=".$resultado['puerta']."></pre>";
            echo "<b>CP:</b> <pre><input type='text' name='textcp' value=".$resultado['cp']."></pre>";
            echo "<b>Metros:</b> <pre><input type='text' name='textm2' value=".$resultado['metros']."></pre>";
            echo "<b>Zona:</b> <pre><input type='text' name='textzona' value=".$resultado['zona']."></pre>";
            echo "<b>Precio:</b> <pre><input type='text' name='textprecio' value=".$resultado['precio']."></pre>";
            echo "<b>Imagen:</b> <input type='hidden' name='MAX_FILE_SIZE' value='9999999'>";
            echo "<pre><input type='file' placeholder='Imagen' name='img' id='imagen' class='usu' required></pre>";
            echo "<input type='hidden' name='textusuario' value=".$resultado['usuario_id']."><br>";
            echo "<input type='submit' name='Actualizar' class='boton' value='Actualizar' <br>";
            echo "</form></div>";
        }
        //cerrrar
            mysqli_close($conexion);
    ?>
</body>