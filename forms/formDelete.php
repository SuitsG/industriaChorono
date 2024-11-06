<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete</title>
  <link rel="stylesheet" href="/css/formDelete.css">

  <link rel="shortcut icon" href="/assets/logoDelete.png" type="image/x-icon">
</head>
<body>
<header class="header">
    <h1 class="header__h1">INDUSTRIA CHRONO</h1>
  </header>  
  <main class="main">
    <section class="main__section">
      <form action="/action/delete.php" method="POST" class="main__section__form">
          <label for="">Documento</label>
          <input name="document" type="text">
          <button class="main__section__form__button" type="submit">Eliminar empleado</button>
      </form>
    </section>
  </main>
  <footer class="footer"></footer>
</body>
</html>