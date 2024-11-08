<?php
session_start();
$employees = $_SESSION['employees'] ?? [];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla empleados</title>
  <link rel="stylesheet" href="/css/viewUpdate.css">
</head>

<body>
  <header class="header">
    <h1 class="header__h1">INDUSTRIA CHRONO</h1>
  </header>
  <main class="main">
    <section class="main__tableBefore">
      <div>
        <h2 class="main__section__h2">Tabla de empleados </h2>
      </div>
      <table>
        <thead>
          <tr>
            <th>Id empleado</th>
            <th>nombre</th>
            <th>sexo</th>
            <th>Documento de identifición</th>
            <th>domicilio</th>
            <th>Fecha de entrada</th>
            <th>Fecha cumpleaños</th>
            <th>Salario básico</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($employees as $employee): ?>
            <tr>
              <td><?php echo htmlspecialchars($employee['idEmployee']); ?></td>
              <td><?php echo htmlspecialchars($employee['nameEmployee']); ?></td>
              <td><?php echo htmlspecialchars($employee['sex']); ?></td>
              <td><?php echo htmlspecialchars($employee['document']); ?></td>
              <td><?php echo htmlspecialchars($employee['domicile']); ?></td>
              <td><?php echo htmlspecialchars($employee['entryDate']); ?></td>
              <td><?php echo htmlspecialchars($employee['birthDate']); ?></td>
              <td><?php echo htmlspecialchars($employee['basicSalary']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
</body>

</html>