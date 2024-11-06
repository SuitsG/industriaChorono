<?php

// Configuración de conexión
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'choronoIndustry';
$nameTable = 'employee';

try {
    // Conexión al servidor de MySQL (sin especificar una base de datos aún)
    $conexion = new PDO("mysql:host=$host", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la base de datos si no existe
    $conexion->exec("CREATE DATABASE IF NOT EXISTS $dbname");
   

    // Conectarse a la base de datos recién creada
    $conexion->exec("USE $dbname");

    // Crear la tabla si no existe
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

} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

?>



