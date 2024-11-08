<?php
session_start();
$totalPayroll = $_SESSION['totalPayroll'] ?? [];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total nómina</title>
    <link rel="stylesheet" href="/css/viewTotalPayroll.css">
</head>

<body>
    <header class="header">
        <h1 class="header__h1">INDUSTRIA CHRONO</h1>
    </header>
    <main class="main">
    <section class="main__section">
        <div>
    <p class="main__section__p">El total de la nómina es:</p>
    <p class="main__section__p"> <?= $totalPayroll[0]['totalPayroll']; ?> Pesos</p> 
    </div>
    </section>
    </main>
    <footer class="footer"></footer>
</body>

</html>