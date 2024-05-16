 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>

<?php
$team =  AreaOficinaData::getById($_GET["id_area_oficina"]);
$carpetas = CarpetaAreaOficina::getAllByCarpetaId($_GET["id_area_oficina"]);
?>
<?php if($u->admin):?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-laptop"></i> 
        AREA - OFICINA <b><?php echo $team->nombre; ?></b>
        <small> </small>
      </h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Información actualizada correctamente</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
            <small>
              <div class="box-tools pull-left">
                <a href="index.php?view=carpetaarea&area_oficina_id=<?php echo $_GET["id_area_oficina"]; ?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-folder-open"></i> Crear Archivador</a>
                <!-- <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> -->
              </div>
            </small>
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>



              <table class="table table-bordered table-hover" id="example1">
              <thead>
              <th>Nombre del Archivador</th>
              <th>Modulo</th>
              <th>Estante</th>
              <th>Descripcion</th>
              <th><center><i class="fa fa-hourglass-start"></i> Acción</center></th>
              </thead>
              <?php
              foreach($carpetas as $ver){
                $car = $ver->getCarrpeta();
                ?>
                <tr>
                <td><i class="fa fa-folder-open"></i> <a href="./?view=documento&id_carpeta=<?php echo $car->id_carpeta;?>"> <?php echo $car->nombre; ?></a></td>
                <td> <?php echo $car->modulo; ?></td>
                <td> <?php echo $car->estante; ?></td>
                <td> <?php echo $car->descripcion; ?></td>
                <td style="width:180px;">
                  <a href="index.php?view=configuracioncarpetaarea&id_carpeta=<?php echo $car->id_carpeta;?>&tid=<?php echo $team->id_area_oficina;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cog'></i>Modifier</a>
                  <a href="index.php?action=eliminarcarpetaarea&id_carpeta=<?php echo $car->id_carpeta;?>&tid=<?php echo $team->id_area_oficina;?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i> Supprimer</a>
                </td>
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>No hay Archivador Creada</p>";
            }


            ?>
        </div>
      </div>
    </section>
  </div>
  <?php endif; ?> 
 <?php if($u->encargado):?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-laptop"></i> 
        AREA - OFICINA <b><?php echo $team->nombre; ?></b>
        <small> </small>
      </h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Información actualizada correctamente</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
            <small>
              <div class="box-tools pull-left">
                <a href="index.php?view=carpetaarea&area_oficina_id=<?php echo $_GET["id_area_oficina"]; ?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-folder-open"></i> Crear Archivador</a>
                <!-- <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> -->
              </div>
            </small>
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>

              <table class="table table-bordered table-hover" id="example1">
              <thead>
              <th>Nombre del Archivador</th>
              <th>Modulo</th>
              <th>Estante</th>
              <th>Descripcion</th>
              <th><center><i class="fa fa-hourglass-start"></i> Acción</center></th>
              </thead>
              <?php
              foreach($carpetas as $ver){
                $car = $ver->getCarrpeta();
                ?>
                <tr>
                <td><i class="fa fa-folder-open"></i> <a href="./?view=documento&id_carpeta=<?php echo $car->id_carpeta;?>"> <?php echo $car->nombre; ?></a></td>
                <td> <?php echo $car->modulo; ?></td>
                <td> <?php echo $car->estante; ?></td>
                <td> <?php echo $car->descripcion; ?></td>
                <td style="width:80px;">
                  <a href="index.php?view=configuracioncarpetaarea&id_carpeta=<?php echo $car->id_carpeta;?>&tid=<?php echo $team->id_area_oficina;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cog'></i>Modifier</a>
                  <!-- <a href="#" title="Usted se encuentra en modo Encargado y no puede Eliminar" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i> Supprimer</a> -->
                </td>
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>No hay Archivador Creada</p>";
            }


            ?>
        </div>
      </div>
    </section>
  </div>
  <?php endif; ?> 
  <!-- JEFE -->
  <?php if($u->jefe):?>
    <?php
// $team =  AreaOficinaData::getById($_GET["id_area_oficina"]);
// $carpetas = CarpetaAreaOficina::getAllByCarpetaIdd($_GET["id_area_oficina"]);
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-cubes"></i> 
        PERIODO <?php echo $team->nombre; ?>
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?view=administrador">Administrador</a></li>
        <li class="active">Activo</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Información actualizada correctamente</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
          <small>
            <div class="box-tools pull-left">
              <a href="index.php?view=carpetaarea&area_oficina_id=<?php echo $_GET["id_area_oficina"]; ?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-folder-open"></i> Nuevo</a>
            </div>
          </small>
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>

              <table class="table table-bordered table-hover">
              <thead>
              <th>Nombre del Carpeta</th>
              <th></th>
              </thead>
              <?php
              foreach($carpetas as $ver){
                // $car = $ver->getCarrrpeta($_SESSION["usuario_id"]);
                $car = $ver->getCarrrpeta();
                ?>
                <tr>
                <td><i class="fa fa-folder-open"></i> <a href="./?view=documento&id_carpeta=<?php echo $car->id_carpeta;?>"> <?php echo $car->nombre; ?></a></td>
                <td style="width:180px;">
                  <a href="index.php?view=configuracioncarpetaarea&id_carpeta=<?php echo $car->id_carpeta;?>&tid=<?php echo $team->id_area_oficina;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cog'></i>Modifier</a>
                  <a href="#" title="Usted se encuentra en modo Encargado y no puede Eliminar" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i> Supprimer</a>
                </td>
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>No hay Archivador Creada</p>";
            }


            ?>
        </div>
      </div>
    </section>
  </div>
  <?php endif; ?> 
  <?php else:?>
    <?php endif;?>