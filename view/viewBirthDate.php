<?php
session_start();
$employees = $_SESSION['employees'] ?? [];
$sexM = $_SESSION['sexM'] ?? [];
$sexF = $_SESSION['sexF'] ?? [];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/viewBirthDate.css">

</head>

<body>
    <header class="header">
        <a href="/index.php">Inicio</a>
        <div>    
            <h1 class="header__h1">INDUSTRIA CHRONO</h1>
        </div>
    </header>
    <main class="main">
        <section class="main__section">
            <div>
                <p class="main__section__p">PERSONAS QUE CUMPLEN EN MAYO</p>
                <table class="main__section__table">
                    <tbody>
                        <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($employee['nameEmployee']); ?></td>
                                <td><?php echo htmlspecialchars($employee['dia']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </section>
        <section class="main__section">
            <div>
                <p class="main__section__p">TOTAL CORBATAS</p>
                <p class="main__section__p"><?= $sexM[0]['masculino']; ?></p>
                <p class="main__section__p">TOTAL DE RAMOS DE ROSAS</p>
                <p class="main__section__p"><?= $sexF[0]['femenino']; ?></p>
            </div>
        </section>


    </main>
    <footer class="footer"></footer>
</body>

</html>