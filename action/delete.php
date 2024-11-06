<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener el documento del formulario
  $document = $_POST['document'];

  // Preparar la consulta SQL para eliminar al empleado por su documento
  $sql = "DELETE FROM employee WHERE document = :document";
  $stmt = $conexion->prepare($sql);
  $stmt->bindParam(':document', $document);

  // Ejecutar la consulta
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    echo "Empleado con documento $document eliminado exitosamente.";
  } else {
    echo "No se encontró un empleado con el documento $document.";
  }
} else {
  echo "Por favor, ingresa el documento del empleado a eliminar.";
}

?>