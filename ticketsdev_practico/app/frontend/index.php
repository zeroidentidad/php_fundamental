  <!DOCTYPE html>
  <html>

  <head>
      <title>Entrenamientos</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="./assets/estilo.css">
  </head>

  <body>
      <main class="container">
          <header>
              <a href="./admin.php" class="indigo-text right"><b>Admin</b></a>
              <p class="flow-text indigo-text header-phrase center">Bootcamp rondas Devs ⌨️ 🖥️</p>
          </header>
          <article class="center u-m1p1 white">
              <p class="flow-text grey-text text-darken-2">
                  Aprovecha a registrarte si aun hay cupos disponibles.
              </p>
              <p class="flow-text">
                  Se inicia el dia del mes de año X, en lugar XYZ.
              </p>
          </article>
          <form class="u-m1p1 white">
              <h4 class="center indigo-text">Entrenar en Bootcamp</h4>
              <h5 class="grey-text text-darken-2">Datos para registro</h5>
              <div class="input-field">
                  <input id="nombre" name="nombre" type="text" class="validate" required>
                  <label for="nombre">Nombre</label>
              </div>
              <div class="input-field">
                  <input id="apellido" name="apellido" type="text" class="validate" required>
                  <label for="apellido">Apellido(s)</label>
              </div>
              <div class="input-field">
                  <input id="email" name="email" type="email" class="validate" required>
                  <label for="email">E-mail</label>
              </div>
              <div class="input-field">
                  <select id="actividad" name="actividad" required>
                      <option value="" disabled selected>Seleccionar disciplina</option>
                      <option value="ANALISIS">ANALISIS</option>
                      <option value="BACKEND">BACKEND</option>
                      <option value="FRONTEND">FRONTEND</option>
                      <option value="DEMO">DEMO</option>
                  </select>
                  <label>Actividades</label>
              </div>
              <div id="horario"></div>
              <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                  <i class="material-icons right">send</i>
              </button>
              <div id="response"></div>
          </form>
      </main>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="./assets/script.js"></script>
  </body>

  </html>