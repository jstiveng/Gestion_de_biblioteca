<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteca Municipal</title>
        <link rel="stylesheet" type="text/css" href="./css/dj.css">
    </head>
<?php 
    include('../shared/header.php');
    include('../util/conexion.php');
?>
    <body>
    <div class="tabla">
                                <table>
                                    <tr>
                                        <th>Identificación</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                    </tr>
        <?php include('../shared/menu.php'); ?>
            <main>
                <h3 class="subtituloh3">SANCIONES</h3>
                <?php
$registros = mysqli_query($con, "SELECT * FROM usuarios WHERE usuEstado='Sancionado'");
while($reg = mysqli_fetch_array($registros)){
    echo "<tr>
            <td>$reg[usuDocumento]</td>
            <td>$reg[usuNombre]</td>
            <td>$reg[usuDireccion]</td>
            <td>$reg[usuTelefono]</td>
            <td>$reg[usuCorreo]</td>
            <td>$reg[usuEstado]</td>
        </tr>";
}
                ?>
            </main>
        </div>
    </body>
    </html>
    <div class="footer">
        <footer.>
            <h5>TODOS LOS DERECHOS RESERVADOS</h5>
            <p>John Jairo Bernal Sierra - Jaider Stievn Garcia Jimenez</p>
            <p>3008598085  - 3155913563</p>
            <p>johnbernalsierrra@gmail.com - stiven001garcia@gmail.com</p> <br>
            
            <a href="mapa.html">Mapa del sitio</a>
        </footer>
    </div> 