<?php
$plantillabasic = 'plantillas/plantilla1.php'; // basic
$plantilla2 = 'plantillas/plantilla2.php'; // rojo y negro
$plantilla3 = 'plantillas/plantilla3.php'; // hecha por la ia
$plantilla4 = 'plantillas/plantilla4.php'; // MESSI

$aleatorio = rand(0, 3);

$toco = ($aleatorio == 0) ? $plantillabasic :
        (($aleatorio == 1) ? $plantilla2 :
        (($aleatorio == 2) ? $plantilla3 : $plantilla4));
?>
