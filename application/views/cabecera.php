<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <?php echo TITULO; ?> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url("catalogo"); ?>">Catalogo <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
      </ul>

    

    <form class="form-inline my-2 my-lg-0" method="post" action= "<?php echo site_url("catalogo/index");?>" >
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="busqueda">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="nav navbar-nav vanbar-rigth">
      <?php if($usuario){ ?>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url ("carrito"); ?>"><i class="bi bi-cart"></i> Pedido</a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person"></i> <?php echo ucfirst ($usuario); ?>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url ("auth/logout"); ?> ">Salir</a>
          </div>
        </li>

      <?php }else{ ?>
      
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url ("auth"); ?>"><i class="bi bi-box-arrow-in-right"></i> Ingresar</a>
        </li>
      

      <?php } ?>
      
    </ul>
    
  </div>
</nav>