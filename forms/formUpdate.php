<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="/css/formUpdate.css">
  <link rel="shortcut icon" href="/assets/logoUpdate.png" type="image/x-icon">
</head>

<body>
<header class="header">
    <h1 class="header__h1">INDUSTRIA CHRONO</h1>
  </header>  
  <main class="main">
    <section class="main__section">
      <form class="main__section__form" action="/action/update.php" method="POST" >

        <div class="main__section__form__div">
          <p>Ingrese el porcentaje que desea  sumar al sueldo de los empleados</p>
        </div>
        <div class="main__section__form__div">
          <input class="main__section__form__input" type="number" pattern="[0-9]" 
            min="1"  name="incremento" required>
        </div>
        <div class="main__section__form__div">
          <button class="main__section__form__button" >ENVIAR</button>
        </div>

      </form>
    </section>
  </main>
</body>

</html>