<!DOCTYPE html>
<html>
<head>
	<title>Resultados de búsqueda de DNI</title>
</head>
<body>
	<h1>Resultados de búsqueda de DNI</h1>

	<?php
		require_once 'conexion.php';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$dni = $_POST["dni"];
			$resultado = getRegistroByDNI($dni);
			if (count($resultado) > 0) {
				echo "<h2>Resultados:</h2>";
				echo "<table>";
				echo "<tr><th>DNI</th><th>Nombre</th><th>Apellido</th><th>Dirección</th></tr>";
				foreach ($resultado as $row) {
					echo "<tr>";
					echo "<td>".$row["DNI"]."</td>";
					echo "<td>".$row["Nombres"]."</td>";
					echo "<td>".$row["Apellidos"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "<p>No se encontraron resultados para el DNI ".$dni."</p>";
			}
		}
	?>
	<a href="agregar.php">Agregar nuevo registro</a>
</body>
</html>
