<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de registros</title>
</head>
<body>
    <h1>Consulta de registros</h1>
    <form method="post" action="buscar.php">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni">
        <button type="submit">Buscar</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = $_POST['dni'];
            $registro = getRegistroByDNI($dni);
            if ($registro) {
                echo '<h2>Información del registro</h2>';
                echo '<ul>';
                echo '<li>DNI: '.$registro[0]['DNI'].'</li>';
                echo '<li>Nombres: '.$registro[0]['Nombres'].'</li>';
                echo '<li>Apellidos: '.$registro[0]['Apellidos'].'</li>';
                echo '</ul>';
            } else {
                echo '<p>No se encontró ningún registro con el DNI ingresado</p>';
            }
        }
    ?>
    <h1>Formulario de registro</h1>
    <form action="insertar.php" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni"><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

