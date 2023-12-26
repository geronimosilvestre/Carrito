<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <h1 class="text-center display 4">Ingresar al sistema</h1>
                <br>
            
            
              <div class="card">
                <div class="card-body">

                  <form action="" method="post">
                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input type="text" name="usuario" id="usuario" class="form-control">
                      <?php echo form_error("usuario","<small class='form_text text-danger'>","</small>"); ?>
                    </div>

                    <div class="form-group">
                    <label for="password">Contraseña:</label>
                      <input type="password" name="password" id="password" class="form-control">
                      <?php echo form_error("password","<small class='form_text text-danger'>","</small>"); ?>
                    </div>

                    <button type="submit" name="boton" class="btn btn-primary">Entrar</button>
                  </form>

                </div>
              </div>

            
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </body>
</html>