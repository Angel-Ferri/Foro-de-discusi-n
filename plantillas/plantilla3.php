<?php
$fecha =date('d,m,y');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo/estilo3.css">
    <title>Principal</title>
</head>

<script src="partes/evitavacios.js"></script>
<body>
    <div class="conte">
        <div class="barra">
            
                <?php
            if (isset($creatitulo) && !empty($creatitulo)) {
                echo '<h1 class="titulo">';
                echo htmlspecialchars($creatitulo);
                echo '</h1>';

            } else {
                echo "NO SE PUDO CARGAR EL TITULO"; // Mensaje por defecto si no está definido
            }
            
                // Verificar si $creanombre está definida antes de usarla
                if (isset($creanombre) && !empty($creanombre)) {
                    echo htmlspecialchars($creanombre);
                } else {
                    echo "by:Nombre del autor"; // Mensaje por defecto si no está definido
                }
            ?>
            <a href="foro.php"><h2 class="boton">Inicio</h2></a>
        </div>
        <div class="cuerpo">
            <article class="div1">
                <form method="post">
                    <p class="text">CARGAR NOMBRE</p>
                    <input class="nombre" type="text" name="name">
                    <p class="text">CARGAR COMENTARIO</p>
                    <input class="comenta" type="text" name="comentario">
                    <input class="enviar" type="submit" value="Enviar">
                </form>
            </article>
            
            <article class="div2">
                <?php
                if ($cometemas) {
                    foreach ($cometemas as $datotema)
                    {   
                        echo '<h4 class="sopa"> User:';
                        echo $datotema['Usuario'];  // Mostramos el usuario
                        echo"</h4>";
                        echo "<br>"; 
                        echo "<h5> Comento:";
                        echo $datotema['comentario'];  // Mostramos el comentario
                        echo "</h5> <br>";
                        echo "<h6>";
                        echo $datotema['fecha'];  // Mostramos la fecha
                        echo "</h6>";
                    }
                }
                ?>
            </article>
        </div>
    </div>
</body>
</html>
