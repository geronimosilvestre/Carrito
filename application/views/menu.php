<div class="list-group">
    <?php foreach($rubros as $r){?>
        <a href="<?php echo site_url("catalogo/index/".$r["rubro_id"]) ?>" class="list-group-item list-group-item-action <?php echo ($rubro_actual==$r["rubro_id"])?"active":""; ?> ">
        <i class="bi bi-basket"></i>&nbsp;
            <?php echo $r["nombre"]; ?>
        </a>
    <?php } ?>
</div>