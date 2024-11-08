<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $consulta = $_POST['consulta'];
  switch ($consulta) {

    case 'fechaCumpleaños':
      $sql = "SELECT nameEmployee, DAY(birthDate) AS dia FROM employee WHERE MONTH(birthDate) = 05";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['employees'] = $employees;
      
      /*Cantidad de corbatas*/
      $sql = "SELECT COUNT(sex) AS masculino FROM employee WHERE sex = 'Masculino' AND MONTH(birthDate) = 05";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $sexM = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['sexM'] = $sexM;

      /*Cantidad de rosas*/
      $sql = "SELECT COUNT(sex) AS femenino FROM employee WHERE sex = 'Femenino' AND MONTH(birthDate) = 05";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $sexF = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['sexF'] = $sexF;

      header("Location: /view/viewBirthDate.php");
      exit();
     
      break;

    case 'totalEmpleados':

      /*Contar cantidad de empleaso*/
      $sql = "SELECT COUNT(idEmployee) AS totalEmployee FROM employee";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $totalEmployee = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['totalEmployee'] = $totalEmployee;

      /*Contar cantidad de empleados mujeres*/
      $sql = "SELECT COUNT(sex) AS totalWomen FROM employee WHERE sex = 'Femenino'";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $totalWomen = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['totalWomen'] = $totalWomen;
      
      /*Contar cantidad de empleados Hombres*/
      $sql = "SELECT COUNT(sex) AS totalMen FROM employee WHERE sex = 'Masculino'";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $totalMen = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['totalMen'] = $totalMen;

      header("Location: /view/viewTotalEmployees.php");
      exit();
      break;

    case 'totalNomina':

      // Acción para mostrar el total de la nómina
      $sql = "SELECT SUM(basicSalary) AS totalPayroll FROM employee";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $totalPayroll = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['totalPayroll'] = $totalPayroll;

      header("Location: /view/viewTotalPayroll.php");
      exit();
      break;

    case 'empleadosMinino':
      // Acción para mostrar los empleados que ganan el mínimo
      $sql = "SELECT nameEmployee, basicSalary FROM employee WHERE basicSalary = (SELECT MIN(basicSalary) FROM employee)";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $empleadosMinino = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo "Empleados que ganan el mínimo:";
      foreach ($empleadosMinino as $empleado) {
        echo "<br>" . $empleado['nameEmployee'] . " - " . $empleado['basicSalary'];
      }
      break;

    case 'empleadosMasMinino':
      // Acción para mostrar los empleados que ganan más del mínimo
      $sql = "SELECT nameEmployee, basicSalary FROM employee WHERE basicSalary > (SELECT MIN(basicSalary) FROM employee)";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $empleadosMasMinino = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo "Empleados que ganan más del mínimo:";
      foreach ($empleadosMasMinino as $empleado) {
        echo "<br>" . $empleado['nameEmployee'] . " - " . $empleado['basicSalary'];
      }
      break;

    case 'tablaEmpleados':
      
      $sql = "SELECT * FROM employee ORDER BY nameEmployee ASC";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['employees'] = $employees;
      header("Location: /view/viewTablaEmpleados.php");
      exit();
      break;

    default:
      echo "No se ha seleccionado una opción válida.";
      break;
  }
} else {
  echo "Error: No se han enviado datos del formulario.";
}
