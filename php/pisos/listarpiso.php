<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/listarpiso.css">
    <link rel="icon" href="../../img/logo.ico" type="image/x-icon">
    <title>Pisos</title>
</head>
<body>
    <div id="titulo">
       <a href="../../index.php" class="nada" > <img src="../../img/logoinmo.png" id="logo"></a>
    </div>
    <div id="menu1">
        <ul>
            <li>
                <a href="./listarpiso.php">INICIO</a>
            </li>
    
            <li>
                <a href="../../buscarpisos.html">BUSCAR</a>
            </li>
            <li>
                <a href="./carrito.php">CARRITO</a>
            </li>
            <li>
                <a href="../../index.php" class="nada"><img src="../../img/cerrar_sesion.png" alt="" class="cerrar_sesion"></a>
            </li>
        </ul>
    </div>

    <div id='tabla'>
        <?php

        //conectar con el sercvidor de base de datos
        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar con el servidor");
        
        //seleccionar base de datos
        
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

        $query="SELECT * from pisos";
        

        $consulta = mysqli_query($conexion, $query) or die ("Fallo de la consulta");
        
        //Mostrar el resultado de la consulta
        $nfilas = mysqli_num_rows($consulta); //devuelve el numero de filas

        if($nfilas == 0)
        {
            echo "<p class='error-message'>No hay pisos disponibles para comprar</p>";
        }  
         else
        {
            echo "<table border='1'>";
            echo "<tr><th>Calle</th><th>Imagen</th><th>Añadir al carrito</th></tr>";

            while ($resultado = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<td class='datos'>". "<ul style='color:black; font-size:1.2em;'><b>Ubicado en</b></ul>". 
                "<li style='color:black;'><b>Calle: </b>". $resultado['calle'] ."</li>".
                "<li style='color:black;'><b>Número: </b>". $resultado['numero'] ."</li>".
                "<li style='color:black;'><b>Piso: </b>". $resultado['piso'] ."</li>".
                "<li style='color:black;'><b>Puerta: </b>". $resultado['puerta'] ."</li>".
                "<li style='color:black;'><b>Código Postal: </b>". $resultado['cp'] ."</li>".
                "<li style='color:black;'><b>Metros: </b>". $resultado['metros'] ."</li>".
                "<li style='color:black;'><b>Zona: </b>". $resultado['zona'] ."</li>".
                "<li style='color:black;'><b>Precio: </b>". $resultado['precio'] . ' €'."</li>".
                "</td>";
                echo "<td class='imgpiso'><img class='imgpiso' src='img/" . $resultado['imagen'] . "'/></td>";
                echo "<td class='anadir'><form action='añadircarrito.php' method='POST'>
                        <input type='hidden' name='id_piso' value='" . $resultado['codigo_piso'] . "'> 
                        <button type='submit' name='submit'>Añadir</button> </form></td>";
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
