<?php
session_start();
$totalEmployee = $_SESSION['totalEmployee'] ?? [];
$totalWomen = $_SESSION['totalWomen'] ?? [];
$totalMen = $_SESSION['totalMen'] ?? [];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total empleados</title>
    <link rel="stylesheet" href="/css/viewTotalEmployees.css">

</head>

<body>
    <header class="header">
        <h1 class="header__h1">INDUSTRIA CHRONO</h1>
    </header>
    <main class="main">
        <section class="main__section">
            <div>
                <p class="main__section__p">TOTAL EMPLEADOS</p>
                <p class="main__section__p"><?= $totalEmployee[0]['totalEmployee']; ?></p>
            </div>
        </section>
        <section class="main__section">
            <div>
                <p class="main__section__p">TOTAL MUJERES</p>
                <p class="main__section__p"><?= $totalWomen[0]['totalWomen']; ?></p>
            </div>
        </section>
        <section class="main__section">
            <div>
                <p class="main__section__p">TOTAL HOMBRES</p>
               <p class="main__section__p"><?= $totalMen[0]['totalMen']; ?></p> 
            </div>
        </section>


    </main>
    <footer class="footer"></footer>
</body>

</html>