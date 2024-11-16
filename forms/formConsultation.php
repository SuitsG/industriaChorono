<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas de datos</title>
  <link rel="stylesheet" href="/css/formConsultation.css">
  <link rel="shortcut icon" href="/assets/logoConsulta.png" type="image/x-icon">

</head>

<body>
  <header class="header">Consultas</header>
  <main class="main">
    <section class="main__section">
      <form action="/action/consultation.php" method="POST" class="main__section__form">

        <label class="label">
          <input
            type="radio"
            id="value-1"
            checked=""
            name="consulta"
            value="fechaCumpleaños" />
          <p class="text">Fechas de cumpleaños</p>
        </label>

        <label class="label">
          <input type="radio" id="value-2" name="consulta" value="totalEmpleados" />
          <p class="text">Total de empleados</p>
        </label>

        <label class="label">
          <input type="radio" id="value-3" name="consulta" value="totalNomina" />
          <p class="text">Total de la nómina</p>
        </label>

        <label class="label">
          <input type="radio" id="value-3" name="consulta" value="empleadosMinimo" />
          <p class="text">Empleados que ganan el mínimo</p>
        </label>

        <label class="label">
          <input type="radio" id="value-3" name="consulta" value="empleadosMasMinimo" />
          <p class="text">Empleados que ganan más del mínimo</p>
        </label>

        <label class="label">
          <input type="radio" id="value-3" name="consulta" value="tablaEmpleados" />
          <p class="text">Tabla de empleados</p>
        </label>
        <div class="consultas__button">
          <button type="submit" class="main__section__form__button">Enviar</button>
        </div>
      </form>
    </section>

  </main>
  <footer class="footer"></footer>
</body>

</html>