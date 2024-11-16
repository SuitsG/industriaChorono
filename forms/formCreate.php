<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear un usuario</title>
  <link rel="stylesheet" href="/css/formCreate.css">
  <link rel="shortcut icon" href="/assets/logoCreate.jpg" type="image/x-icon">
</head>

<body>
  <header class="header">
    <h1 class="header__h1">INDUSTRIA CHRONO</h1>
  </header>
  <main class="main">
    <section class="main__section">
      <form action="/action/create.php" method="POST" class="main__section__form">

        <h2 class="main__section__h2"> Formulario para crear <br> un nuevo empleado </h2>

        <div class="main__section__form__div">
          <label for="">Nombre</label>
          <input class="main__section__form__input" type="text" name="name" pattern="[a-zA-Z\s]+"
            title="Solo se permiten letras y espacios" required>
        </div>

        <div class="main__section__form__div">
          <label for="documento">Documento</label>
          <input class="main__section__form__input" type="number" name="document" pattern="\d{5,10}" maxlength="10" title="El documento debe tener entre 5 y 10 dígitos" required>
        </div>


        <div class="main__section__form__div">
          <label for="sex">Sexo</label>
          <select class="main__section__form__select" name="sex" required>
            <option value="">Seleccione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>

        <div class="main__section__form__div">
          <label for="">Domicilio</label>
          <input class="main__section__form__input" type="text" name="domicile"
            title="Campo obligatorio" required>
        </div>

        <div class="main__section__form__div">
          <label for="">Fecha ingreso</label>
          <input class="main__section__form__input" type="date" name="entryDate" id="" required>
        </div>

        <div class="main__section__form__div">
          <label for="">Fecha nacimiento</label>
          <input class="main__section__form__input" type="date" name="birthDate" id="" required>
        </div>

        <div class="main__section__form__div">
          <label for="">Sueldo básico</label>
          <input class="main__section__form__input" type="number" name="basicSalary" required>
        </div>

        <div class="main__section__form__div">
          <button class="main__section__form__button" type="submit">Enviar</button>
        </div>
    </section>
    </form>
  </main>
  <footer class="footer">
    <p>Hola mundo</p>
  </footer>
</body>

</html>