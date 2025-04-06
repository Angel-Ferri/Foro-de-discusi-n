<?php
if ( isset($_POST['enviartema'])) {
    if ($_POST) {
        // Limpia el nombre del tema para evitar caracteres no permitidos
        $createma = isset($_POST['createma']) ? preg_replace('/[^A-Za-z0-9 ]/', '', $_POST['createma']) : '';
        // NOMBRES PROHIBIDOS
        strtolower($createma);
        if ($createma == 'foro' || $createma == 'conexion' || $createma == 'aleatorio') {
            echo '<h2 class="alerta">El tema no puede llamarse ' . $createma . '. Por favor, elige otro nombre.</h2>';
        }        
        else {
        // Verifica si se ha proporcionado un autor
        $autor = isset($_POST['autor']) ? trim($_POST['autor']) : '';
        // Verifica que el tema y el autor no estén vacíos
            if (!empty($autor) && !empty($createma)) {
                // Inserta el tema en la base de datos
                $conexion->query("INSERT INTO `temas` (`ID`, `autor`, `tema`) VALUES (NULL, '$autor', '$createma')");
                echo '<h2 class="alerta">SE LOGRÓ CON ÉXITO SALUDOS ENVIOS.PHP</h2>';
                
                // Crear archivo PHP basado en el tema
                $archivo = $createma . ".php"; // Crea el nombre del archivo
                $ar = fopen($archivo, 'w'); // Abre el archivo para escritura
                
                if ($ar) {
                    // Escribe el contenido PHP en el archivo
                    fputs($ar, "<?php\n");
                    fputs($ar, "include(\"conexion.php\");\n");
                    fputs($ar, "if (\$_POST) {\n");
                    fputs($ar, "\$fecha = date('d,m,y');\n");
                    fputs($ar, "\$comenta = isset(\$_POST['comentario']) ? trim(\$_POST['comentario']) : '';\n");
                    fputs($ar, "\$name = isset(\$_POST['name']) ? trim(\$_POST['name']) : '';\n");
                    fputs($ar, "\$autor = isset(\$_POST['autor']) ? trim(\$_POST['autor']) : '';\n");
                    fputs($ar, "\$conexion->query(\"INSERT INTO `comentarios` (`ID`, `Usuario`, `temas`, `comentario`, `fecha`) VALUES (NULL, '\$name', '$createma', '\$comenta', '\$fecha');\");\n");
                    fputs($ar, "}\n");
                    fputs($ar, "\$cometemas = \$conexion->query(\"SELECT * FROM `comentarios` WHERE `temas` = '$createma'\");\n");
                    fputs($ar, "\$creatitulo = \"$createma\";\n");
                    fputs($ar, "\$creanombre = \"$autor\";\n");
                    fputs($ar, "?>\n");
                    // LA PARTE QUE EVITA QUE SE REMANDAN COSAS
                    fputs($ar, "<script>\n");
                    fputs($ar, "window.addEventListener('keydown', function(event) {\n");
                    fputs($ar, "if (event.key === 'F5') {\n");
                    fputs($ar, "event.preventDefault(); // Evita la recarga de la página\n");
                    fputs($ar, "window.location.href = '$createma.php'; // Te manda a la parte principal\n");
                    fputs($ar, "}\n");
                    fputs($ar, "});\n");
                    fputs($ar, "</script>\n");
    
                    // Carga plantilla aleatoria
                    include("aleatorio.php");      
                    $plantilla = file_get_contents($toco);
    
                    if ($plantilla !== false) {
                        fputs($ar, $plantilla);
                    } else {
                        fputs($ar, '<h2 class="alerta">Error al cargar la plantilla.</h2>');
                    }
    
                    fputs($ar, "<hr>\n");
                    fclose($ar); // Cierra el archivo
                }} else {
                echo '<h2 class="alerta">El nombre del autor o el tema no pueden estar vacíos.</h2>';
            }   
        }

        
}    
}    
?>
