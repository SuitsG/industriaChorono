<?php
try {
    $host = 'localhost';
    $port = 3306; 
    $username = 'root';
    $password = '';
    $dbname = 'choronoIndustry';

    $conexion = new PDO("mysql:host=$host;port=$port", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlVerificarDB = "SELECT COUNT(*) AS count FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :dbname";
    $stmt = $conexion->prepare($sqlVerificarDB);
    $stmt->bindParam(':dbname', $dbname);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado['count'] == 0) {
        // Crear la base de datos si no existe
        $sqlCrearDB = "CREATE DATABASE $dbname";
        $conexion->exec($sqlCrearDB);

        $conexion = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlCrearTabla = "
            CREATE TABLE employee (
                idEmployee INT AUTO_INCREMENT PRIMARY KEY,
                nameEmployee VARCHAR(50) NOT NULL,
                sex VARCHAR(50) NOT NULL,
                document VARCHAR(20) NOT NULL UNIQUE,
                domicile VARCHAR(50) NOT NULL,
                entryDate DATE NOT NULL,
                birthDate DATE NOT NULL,
                basicSalary INT NOT NULL
            );
        ";
        $conexion->exec($sqlCrearTabla);
       
    } else {
        $conexion = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
} catch (PDOException $e) {
    echo "Error de conexión o creación de base de datos/tablas: " . $e->getMessage();
}
