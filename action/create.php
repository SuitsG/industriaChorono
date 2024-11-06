<?php

require_once($_SERVER['DOCUMENT_ROOT']. '/database/connection.php');


// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Recibir los datos del formulario
  $nameEmployee = $_POST['name'];
  $sex = $_POST['sex'];
  $document = $_POST['document'];
  $domicile = $_POST['domicile'];
  $entryDate = $_POST['entryDate'];
  $birthDate = $_POST['birthDate'];
  $basicSalary = $_POST['basicSalary'];

  // Preparar la consulta SQL para insertar los datos
  $sql = "INSERT INTO employee (nameEmployee, sex, document, domicile, entryDate, birthDate, basicSalary) 
            VALUES (:nameEmployee, :sex, :document, :domicile, :entryDate, :birthDate, :basicSalary)";
  $stmt = $conexion->prepare($sql);

  // Asignar los valores a los parámetros y ejecutar la consulta
  $stmt->bindParam(':nameEmployee', $nameEmployee);
  $stmt->bindParam(':sex', $sex);
  $stmt->bindParam(':document', $document);
  $stmt->bindParam(':domicile', $domicile);
  $stmt->bindParam(':entryDate', $entryDate);
  $stmt->bindParam(':birthDate', $birthDate);
  $stmt->bindParam(':basicSalary', $basicSalary);

  if ($stmt->execute()) {
    echo "Empleado registrado exitosamente.";
  } else {
    echo "Hubo un error al registrar al empleado.";
  }
} else {
  echo "Error: No se han enviado datos del formulario.";
}

?>