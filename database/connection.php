<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'choronoIndustry';
$nameTable = 'employee';

$puertos = [3306, 3307, 3308, 3309, 3310, 3311, 3312, 3313, 3314, 3315];  // Priorizar puerto 3306
$puerto_encontrado = null;

// Intentar conectarse a cada puerto en el rango con conexión persistente
foreach ($puertos as $puerto) {
    try {
        // Usamos una conexión persistente para mejorar la velocidad
        $conexion = new PDO("mysql:host=$host;port=$puerto;dbname=$dbname", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,  // Habilitar conexión persistente
        ]);
        $puerto_encontrado = $puerto;
        break;  // Salimos si logramos conectar
    } catch (PDOException $e) {
        // Si la conexión falla, continúa con el siguiente puerto
        continue;
    }
}



try {
    // Verificamos si la base de datos existe antes de crearla
    $stmt = $conexion->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :dbname");
    $stmt->execute(['dbname' => $dbname]);
    if (!$stmt->fetch()) {
        // Si la base de datos no existe, la creamos
        $conexion->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    }

    // Conectarse a la base de datos recién creada
    $conexion->exec("USE $dbname");

    // Verificamos si la tabla existe antes de crearla
    $stmt = $conexion->prepare("SHOW TABLES LIKE :table");
    $stmt->execute(['table' => $nameTable]);
    if (!$stmt->fetch()) {
        // Si la tabla no existe, la creamos
        $sqlCrearTabla = "CREATE TABLE IF NOT EXISTS $nameTable (
            idEmployee INT AUTO_INCREMENT PRIMARY KEY,
            nameEmployee VARCHAR(50) NOT NULL,
            sex VARCHAR(50) NOT NULL,
            document VARCHAR(20) NOT NULL UNIQUE,
            domicile VARCHAR(50) NOT NULL,
            entryDate DATE NOT NULL,
            birthDate DATE NOT NULL,
            basicSalary INT NOT NULL
        )";
        $conexion->exec($sqlCrearTabla);
    }
} catch (PDOException $e) {
    die("Error en la conexión o creación de la base de datos o tabla: " . $e->getMessage());
}

?>