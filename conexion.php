<?php
// Obtener información de un DNI
try {
    $conn = new PDO("sqlsrv:server = tcp:dato.database.windows.net,1433; Database = dni", "roly", "989893469/Rz");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM Registros WHERE DNI = :dni";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
    catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
function getRegistroByDNI($dni) {
    try {
        $conn = new PDO("sqlsrv:server = tcp:dato.database.windows.net,1433; Database = dni", "roly", "989893469/Rz");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT DNI, Nombres, Apellidos FROM Registros WHERE DNI = :dni";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
}
function insertRegistro($dni, $nombre, $apellido){
    try {
        $conn = new PDO("sqlsrv:server = tcp:dato.database.windows.net,1433; Database = dni", "roly", "989893469/Rz");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO Registros (DNI, Nombres, Apellidos) VALUES (:dni, :nombre, :apellido)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
}

