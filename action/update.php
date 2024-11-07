<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');


// Consulta para obtener todos los registros de la tabla `usuario`
$sql = "SELECT nameEmployee, basicSalary FROM employee ORDER BY nameEmployee ASC";
$stmt = $conexion->prepare($sql);
$stmt->execute();

// Obtenemos todos los registros como un arreglo asociativo
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $incremento = $_POST['incremento'] / 100;


  $sql = "UPDATE employee SET basicSalary = basicSalary + (basicSalary * :incremento)";
  $stmt = $conexion->prepare($sql);
  $stmt->bindParam(':incremento', $incremento, PDO::PARAM_STR);

  $stmt->execute();

  $sqlSelect = "SELECT nameEmployee, basicSalary FROM employee ORDER BY nameEmployee ASC";
  $stmtSelect = $conexion->prepare($sqlSelect);
  $stmtSelect->execute();

  $salaryUpdate = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

  $_SESSION['employees'] = $employees;
  $_SESSION['salaryUpdate'] = $salaryUpdate;
  
   header("Location: /view/viewUpdate.php");
   exit();
} else {
}

?>
