<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mensajes.css">
    <title>Añadir piso</title>
</head>
<body>
    <div id="titulo">
       <a href="../../index.php" class="nada" > <img src="../../img/logoinmo.png" id="logo"></a>
    </div>  
        <?php
        session_start();
            $usuid = $_SESSION['userid'];
            $cod=$_REQUEST["textcodigo"];
            $calle= $_REQUEST["textcalle"];
            $numero = $_REQUEST["textnumero"];
            $piso= $_REQUEST["textpiso"];
            $puerta= $_REQUEST["textpuerta"]; 
            $codigop = $_REQUEST["textcp"];
            $metros= $_REQUEST["textm2"];
            $zona= $_REQUEST["textzona"]; 
            $precio = $_REQUEST["textprecio"];

            $copiarFichero = false;
            $errores = "";
            if (is_uploaded_file ($_FILES['img']['tmp_name']))
            {
                $nombreDirectorio = "img/";
                $nombreFichero = $_FILES['img']['name'];
                $copiarFichero = true;
            }

            // El fichero introducido supera el l�mite de tama�o permitido
            else if ($_FILES['img']['error'] == UPLOAD_ERR_FORM_SIZE)
            {
                $maxsize = $_REQUEST['MAX_FILE_SIZE'];
                $errores = $errores . "   <LI>El tama�o del fichero supera el límite permitido ($maxsize bytes)\n";
            }

            // No se ha introducido ning�n fichero
            else if ($_FILES['img']['name'] == "")
            $nombreFichero = '';
            // El fichero introducido no se ha podido subir
            else
            $errores = $errores . "   <LI>No se ha podido subir el fichero\n";

            // Mostrar errores encontrados
            if ($errores != "")
            {
                print ("<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>\n");
                print ("<UL>\n");
                print ($errores);
                print ("</UL>\n");
                print ("<P>[ <A HREF='javascript:history.back()'>Volver</A> ]</P>\n");
            }
            else
            {
                // Mover foto a su ubicaci�n definitiva
                if ($copiarFichero)
                move_uploaded_file ($_FILES['img']['tmp_name'], $nombreDirectorio . $nombreFichero);
                
            }
            

            //conectar con el sercvidor de base de datos
            $conexion = mysqli_connect("localhost", "root", "rootroot")
            or die ("No se puede conectar con el servidor");
            
            //seleccionar base de datos
            
            mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar a la base de datos");

            $query="insert into pisos (calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id) values ('$calle','$numero','$piso','$puerta','$codigop','$metros','$zona','$precio','$nombreFichero','$usuid')";
            //echo "$query.<br> ";

            
            if(mysqli_query($conexion,$query))
            {
                
                echo "<div class='borrado'>Piso añadido corectamente</div>";
                echo "<div class='mensaje'><img src='../../img/arriba1.png' class='ok'></div>";
            }   
            else
            {
                echo "<div class='borrado'>Piso NO añadido</div>";
                echo "<div class='mensaje'><img src='../../img/abajo.png' class='ok'></div>";
                
            }
            //cerrrar
                mysqli_close($conexion);
            ?>
        </div>
</body>
</html>
