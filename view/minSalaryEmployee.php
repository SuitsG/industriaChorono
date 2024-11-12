<?php
session_start();
$empleadosMinino = $_SESSION['empleadosMinino'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min Salary</title>
    <link rel="stylesheet" href="/css/minSalaryEmployee.css">
</head>

<body>
    <header class="header">
        <a href="/index.php">Inicio</a>
        <h1 class="header__h1">INDUSTRIA CHRONO</h1>
    </header>
    <main class="main">
        <section class="main__section">
            <p>Empleados que ganan el mínimo:</p>
            <div>
                <?php
                foreach ($empleadosMinino as $empleado) {
                    echo "<br>" . htmlspecialchars($empleado['nameEmployee']) . "  = " . htmlspecialchars($empleado['basicSalary']);
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>