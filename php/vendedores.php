<?php
    session_start();
    
    // Verificar si el usuario no está autenticado
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        // Redirigir a la página de inicio de sesión
        header("Location: ../index.php");
        exit;
    }
    $username = $_SESSION['name'];
    $usuid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vendedores.css">
    <link rel="icon" href="../img/logo.ico" type="image/x-icon">
    <title>Vendedores</title>
   <script>
        window.onload = function() {
        alert("Bienvenido/a, <?php echo $username; ?>!");
        }
        function validar(){
            var calle = document.getElementById('calle').value.trim().length;
            var num = document.getElementById('num').value.trim().length;
            var piso = document.getElementById('piso').value.trim().length;
            var puerta = document.getElementById('puerta').value.trim().length;
            var cp = document.getElementById('CP').value.trim().length;
            var metros = document.getElementById('metros').value.trim().length;
            var precio = document.getElementById('precio').value.trim().length;
            var imagen = document.getElementById('imagen').value.trim(),length;
            if (calle == 0){
                alert("Debe introducir una calle");
                document.getElementById('calle').focus();
                return false;
            }
            if (num == 0){
                alert("Debe introducir un número");
                document.getElementById('calle').focus();
                return false;
            }
            if (piso == 0){
                alert("Debe introducir un piso");
                document.getElementById('piso').focus();
                return false;
            }
            if (puerta == 0){
                alert("Debe introducir una puerta");
                document.getElementById('pùerta').focus();
                return false;
            }
            if (cp == 0){
                alert("Debe introducir un código postal");
                document.getElementById('CP').focus();
                return false;
            }
            if (metros == 0){
                alert("Debe introducir el número de metros");
                document.getElementById('metros').focus();
                return false;
            }
            if (precio == 0){
                alert("Debe introducir el precio");
                document.getElementById('precio').focus();
                return false;
            }
            if (imagen == 0){
                alert("Debe introducir una imagen");
                document.getElementById('imagen').focus();
                return false;
            }
            return true;
        }
</script>

</head>
<body>
<div id="titulo">
        <a href="../index.php" class="nada"> <img src="../img/logoinmo.png" id="logo"></a>
     </div>
    <div id="menu1">
        <ul>    
            <li>
                <a href="./vendedores.php">AÑADIR PISO</a>
            </li>
    
            <li>
                <a href="./pisos/listarpisovendedor.php">MOSTRAR PISOS</a>
            </li>
  
            <li>
              <a href="./pisos/borrarpisosvendedor.php">BORRAR PISO</a>
            </li>
            <li>
                <a href="../index.php" class="nada"><img src="../img/cerrar_sesion.png" alt="" class="cerrar_sesion"></a>
            </li>
        </ul>
	</div>
    <div id="formulario">
        <form action="pisos/añadirpiso.php" method="POST" enctype="multipart/form-data" onsubmit="return validar()">
            <fieldset>
                <legend><span>Añadir piso</span></legend>
                <input type="text" placeholder="Calle" name="textcalle" id="calle" class="usu" required><br><br>
                <input type="text" placeholder="Número" name="textnumero" id="num" class="usu" required ><br><br>
                <input type="text" placeholder="Piso" name="textpiso" id="piso" class="usu" required><br><br>
                <input type="text" placeholder="Puerta" name="textpuerta" id="puerta" class="usu" required><br><br>
                <input type="text" placeholder="Codigo postal" name="textcp" id="CP" class="usu" required><br><br>
                <input type="text" placeholder="Metros" name="textm2" id="metros" class="usu" required><br><br>
                <input type="text" placeholder="Zona" name="textzona" id="zona" class="usu"><br><br>
                <input type="text" placeholder="Precio" name="textprecio" id="precio" class="usu" required><br><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="9999999">
                <input type="file" placeholder="Imagen" name="img" id="imagen" class="usu" required><br><br>
                <input type="submit" value="Añadir" name="entrar" class="boton">
                <input type="reset" value="Borrar" class="boton">
            </fieldset>
        </form>
    </div>
    
</body>
</html>