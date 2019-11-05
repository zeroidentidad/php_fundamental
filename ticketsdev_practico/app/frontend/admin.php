  <?php require_once './app.php'; ?>
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
              <p class="flow-text indigo-text header-phrase center">Participantes 👥</p>
          </header>
          <article class="center u-m1p1 white">
              <table class="responsive-table highlight">
                  <tr>
                      <th>Email</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Bloque</th>
                      <th>Disciplina</th>
                      <th>Horario</th>
                      <th>Fecha registro</th>
                      <th></th>
                  </tr>
                  <?=obtener_registros()?>
              </table>
          </article>
      </main>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="./assets/script.js"></script>
  </body>

  </html>