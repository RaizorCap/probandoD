<!DOCTYPE html>
<html>
<head>
    <title>Información del DNI</title>
</head>
<body>
    <form action="" method="get">
        <label for="dni">Ingrese su DNI:</label>
        <input type="text" id="dni" name="dni">
        <input type="submit" value="Buscar">
    </form>
    <?php
    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];
        $result = getDni($dni);
        if (count($result) == 0) {
            echo "<p>No se encontró información para el DNI $dni</p>";
        } else {
            echo "<table>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<th>DNI</th>";
                echo "<td>" . $row['dni'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Nombres</th>";
                echo "<td>" . $row['nombres'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Apellidos</th>";
                echo "<td>" . $row['apellidos'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
