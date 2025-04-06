<?php 

if ( isset($_POST['enviarcomentarios'])) {
    if ($_POST) {
        $comenta = isset($_POST['comentario']) ? $_POST['comentario'] : ''; // Asigna el valor real o una cadena vacía si no está definida
        $name = isset($_POST['name']) ? $_POST['name'] : ''; // Lo mismo para el nombre  
        if (!empty($comenta) && !empty($name)) {
            $fecha = date('d,m,y'); // Fecha actual
            $conexion->query("INSERT INTO `comentarios` (`ID`, `Usuario`, `temas`, `comentario`, `fecha`) VALUES (NULL, '$name', 'inicio', '$comenta', '$fecha');");
            // Lo de arriba es la consulta que sube las cosas a la bs
            echo '<h2 class="alerta">SE LOGRO CON EXITO</h2>'; // yo nomas aviso que se logro :,D
        } else {
            echo '<h2 class="alerta">Problemas en la consulta de envio.php</h2>'; // Yo aviso que hubo un error en la consulta >:c
        }
    }
    else {
        echo'<h2 class="error">Las Casillas estan vacias</h2>'; // Aviso que 
    }
    if ($_POST) {
        $usu = isset($_POST['name']) ? $_POST['name'] : ''; //Verifica que hay algo en input que busca   
        if (!empty($usu)) {
            $conexion->query("INSERT INTO `usuarios` (`ID`, `nombre`) VALUES (NULL, '$usu')"); // Yo solo envio los datos a la bs de usuarioss 
            $user = NULL;
        }
        else {
            echo'<h2 class="error">el error es en la consulta que va a la bs de usuarios</h2>';
        }
    }
}
?>