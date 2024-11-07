<?php
session_start();

// Recuperar los datos antes y después del incremento
$employees = $_SESSION['employees'] ?? [];
$salaryUpdate = $_SESSION['salaryUpdate'] ?? [];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="/css/viewUpdate.css">
</head>

<body>
  <header class="header">
    <h1 class="header__h1">INDUSTRIA CHRONO</h1>
  </header>
  <main class="main">
    <section class="main__tableBefore">
      <div>
        <h2 class="main__section__h2">Salarios sin incremento</h2>
      </div>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Salario basico</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($employees as $employee): ?>
            <tr>
              <td><?php echo htmlspecialchars($employee['nameEmployee']); ?></td>
              <td><?php echo htmlspecialchars($employee['basicSalary']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
    <section class="main__tableAfter">
      <div>
        <h2 class="main__section__h2">Salarios con incremento </h2>
      </div>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Salario basico</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($salaryUpdate as $employee): ?>
            <tr>
              <td><?php echo htmlspecialchars($employee['nameEmployee']); ?></td>
              <td><?php echo htmlspecialchars($employee['basicSalary']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
</body>

</html>