<script>
    window.addEventListener('keydown', function(event) {
  if (event.key === 'F5') {
      event.preventDefault(); // Evita la recarga de la página
      window.location.href = 'foro.php'; // Te manda a la parte principal
  }
});
</script>
<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo/foro.css">
    <title>FORO</title>
</head>
<body>    
    <div class="cuerpo">
        <div class="barra">
            <div class="titulo">
                <p class="f">F</p>
                <p class="e">e</p>
                <p class="r">r</p>
                <p class="p">p</p>
                <p class="l">l</p>
                <p class="a">a</p>
                <p class="y">y</p>
            </div>
            <a href="index.html"><h2 class="boton">Inicio</h2></a>
        </div>
        <div class="conte">
            <div class="baraycome">
                <div class="barrita">
                    <form action="" method="post" class="forminf">
                        <div class="enline">
                            <p class="textfo">CARGAR NOMBRE</p>
                            <input class="nombrefo" type="text" name="name"> 
                        </div>
                        <div class="enline">
                            <p class="textfo">Comentario</p>
                            <input class="nombrefo" type="text" name="comentario">
                            <input class="enviarfo" name="enviarcomentarios" type="submit">
                        </div>
                    </form>
                    <?php include("partes/envios.php"); ?>
                </div>

                <div class="Cajadecomentarios">
                    <h1 class="textfo">Comentario globales</h1>
                    <?php
                    // Realizamos la consulta para obtener todos los comentarios con el usuario
                    $causuario = $conexion->query("SELECT * FROM `comentarios` WHERE `temas` = 'inicio';");
                    // Verificamos si la consulta fue exitosa
                    if ($causuario) {
                        foreach ($causuario as $dato) {   
                            echo '<div class="caja">';
                            echo '<div class="comenusuario">';
                            echo '<h4 class="User"> User:';
                            echo $dato['Usuario'];  // Mostramos el usuario
                            echo"</h4>";
                            echo '<h5 class="comentarico"> Comentario:';
                            echo $dato['comentario'];  // Mostramos el comentario
                            echo "</h5>";
                            echo '</div>';
                            echo '<h4 class="fechaco">Fecha de carga:';
                            echo $dato['fecha'];  // Mostramos la fecha
                            echo "</h4>";
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="barradetema">
                <h1>Lista de tema</h1>
                <div class="">
                    <form method="post">
                        <p class="textfo">Autor</p>
                        <input type="text" name="autor">
                        <p class="textfo">Crea una pagina</p>
                        <input type="text" name="createma">
                        <br>
                        <input class="enviar" name="enviartema" type="submit">
                    </form>
                </div>
                <?php
                include("partes/creo.php");
                $temabs = $conexion->query("SELECT * FROM `temas`");
                // Verificamos si la consulta fue exitosa
                if ($temabs) {
                    foreach ($temabs as $da) {   
                        echo '<a href="';
                        echo $da['tema'];
                        echo '.php"';
                        echo '><h2 class="botonfor"><li>';
                        echo $da['tema'];  // Mostramos el comentario
                        echo '</li></h2></a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
