<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Carrito</title>
  </head>
  <body>

  <?php echo $cabecera;?>
      <br>
  <div class="container-fluid">
    <div class="row">

          <div class="col-md-12">
              
          <br>
                  
                  <?php if(!$pedido){ ?>
                      <div class="alert alert-warning" role="alert">
                          <h3> No hay articulos en su carrito! </h3>
                      </div>
                    
                      <?php }else{ ?>
                        <h3>PEDIDO NUMERO:
                          <?php echo str_pad($pedido["pedido_id"],5,"0",STR_PAD_LEFT); ?>
                        </h3>
                  <ul class="list-unstyled">
                    <?php foreach($pedido["items"] as $a ){ ?>
                    <li class="media">
                      <?php if(file_exists(FCPATH."catalogo".DIRECTORY_SEPARATOR.$a["articulo_id"].".png")){ ?>
                      <img src="<?php echo base_url("catalogo/".$a["articulo_id"].".png");  ?>" class="mr-3">
                      <?php }else{ ?>
                      <img src="<?php echo base_url("images/sinfoto.png");  ?>" class="mr-3">
                      <?php } ?>
                      <div class="media-body">

                        <h5 class="mt-0 mb-1"><?php echo $a["descripcion"] ?></h5>

                        <p class="text-right"> importe: $ <?php echo $a["importe"]?> / cantidad: <?php echo $a["cant"];?>
                          &nbsp;<a class="btn btn-danger btn-sm" href="<?php echo site_url("carrito/quitar/".$a["pedidos_item_id"]); ?>">
                            <i class="bi bi-trash-fill"></i>
                          <a> 
                        </p>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                  <hr>
                  <p class="text-right"><a href="<?php echo site_url("carrito/cerrar_pedido"); ?>" class="btn btn-primary btn-lg">cerrar pedido </a></p>
                    
                    <?php } ?>
      </div>
    </div>

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>                    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>