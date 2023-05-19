<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login de Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/Login/login.css"  type="text/css">
  </head>
  <body class="bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="form-container">
              <img src="images/usil.png" class="img-fluid" alt="usil">
              <form method="POST" action="index.php">
                <div class="form-group">
                  <input placeholder="Usuario" type="text" class="form-control" name="codigo_alumno" id="codigo_alumno" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <input placeholder="Contraseña" type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="btn-container text-center">
                  <input type="submit" class="btn btn-primary" value="Iniciar sesión">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
