<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');

// Verificamos que el formulario haya sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Recibir los datos del formulario
  $consulta = $_POST['consulta'];

  // Consulta SQL para obtener los empleados
  $sql = "SELECT nameEmployee, birthDate FROM employee WHERE MONTH(birthDate) = 11";
  $stmt = $conexion->prepare($sql);
  $stmt->execute();

  // Obtenemos todos los registros como un arreglo asociativo
  $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Construcción de la tabla HTML para los resultados
  $fechaCumpleaños = "
    <section>
      <div>
        <h2>Fechas de cumpleaños</h2>
      </div>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
          </tr>
        </thead>
        <tbody>";

  // Generamos las filas de la tabla para cada empleado
  foreach ($employees as $employee) {
    $fechaCumpleaños .= "<tr>
      <td>" . htmlspecialchars($employee['nameEmployee']) . "</td>
      <td>" . htmlspecialchars($employee['birthDate']) . "</td>
    </tr>";
  }

  // Cerramos el cuerpo y la tabla
  $fechaCumpleaños .= "
        </tbody>
      </table>
    </section>";

  // Utilizamos match para determinar qué mostrar
  $sot = match ($consulta) {
    'fechaCumpleaños' => $fechaCumpleaños,
    'totalEmpleados' => "Total de empleados: [aquí el número]",
    default => "No se ha seleccionado una opción válida",
  };

  // Mostramos el resultado
  echo $sot;
} else {
  echo "Error: No se han enviado datos del formulario.";
}
