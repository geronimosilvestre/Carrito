<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Catalogo</title>
  </head>
  <body>

  <?php echo $cabecera;?>
      <br>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">  
             <?php echo $menu;?>
        </div>
          <div class="col-md-9">

          
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php if(isset($busqueda)){ echo $busqueda;}else{ echo $rubro["nombre"];} ?> <li>
                </ol>
              </nav>
          <br>
                  
                  <?php if(!$articulos){ ?>
                      <div class="alert alert-warning" role="alert">
                          <h3> En este rubro no hay articulos </h3>
                      </div>
                    <ul class="list-unstyled">
                      <?php }else{ ?>
                    <?php foreach($articulos as $a ){ ?>
                    <li class="media">
                      <?php if(file_exists(FCPATH."catalogo".DIRECTORY_SEPARATOR.$a["articulo_id"].".png")){ ?>
                      <img src="<?php echo base_url("catalogo/".$a["articulo_id"].".png");  ?>" class="mr-3">
                      <?php }else{ ?>
                      <img src="<?php echo base_url("images/sinfoto.png");  ?>" class="mr-3">
                      <?php } ?>
                      <div class="media-body">

                        <h5 class="mt-0 mb-1"><?php echo $a["titulo"] ?></h5>

                        <p class="text-right"> $ <?php echo $a["precio"];?>
                          &nbsp;
                          
                          <?php if($usuario){ // compras
                            $dire=site_url("carrito/comprar/".$a["articulo_id"]);
                          }else{
                            $dire=site_url("auth");
                          }
                          ?>
                          <a class="btn btn-primary btn-sm" href="<?php echo $dire; ?>">
                            <i class="bi bi-cart-check"></i>
                          <a> 
                        </p>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                    
                    <?php } ?>
      </div>
    </div>

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>                    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>