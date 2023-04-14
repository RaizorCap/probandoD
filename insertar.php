<?php
    include 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $mensaje = insertRegistro($dni, $nombre, $apellido);

        echo "<p>$mensaje</p>";
    }
?>
