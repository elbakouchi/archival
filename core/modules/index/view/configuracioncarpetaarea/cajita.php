 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
    <?php 
    $carpetas = CarpetaData::getById($_GET["id_carpeta"]);
     ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-folder-open-o"></i> 
        Actualizacion del Archivador <?php echo $carpetas->nombre; ?>
        <small></small>
      </h1>
    </section>
    <div class="box">
      <?php if($u->encargado):?><p class='alert alert-danger'><b><i class="fa fa-exclamation-triangle"></i> Estimado Encargado <b style="color: blue;"><?php echo $u->nombre." ".$u->apellido; ?></b>, ten en cuenta que los cambios que va realizar figurará a nombre de Usted, !tenga mucho cuidado!</b></p><?php endif; ?>
        <div class="row">
          <div class="col-md-9">
            <section class="content">
              <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=actualizarcarpetaarea" role="form">
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Catégorie de document</label>
                <div class="col-lg-8">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Catégorie de document" value="<?php echo $carpetas->nombre; ?>">
                  <span class="fa fa-user fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Codigo</label>
                <div class="col-lg-8">
                 <input type="text" name="codigo"  class="form-control" id="codigo" placeholder="Codigo del Archivador" value="<?php echo $carpetas->codigo; ?>">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Estante</label>
                <div class="col-lg-8">
                  <input type="text" name="estante"  class="form-control" id="estante" placeholder="Estante donde que se encuentra" value="<?php echo $carpetas->estante; ?>">
                  <span class="fa fa-list-alt fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Modulo</label>
                <div class="col-lg-8">
                  <input type="text" name="modulo"  class="form-control" id="modulo" placeholder="en que modulo se encuentra" value="<?php echo $carpetas->modulo; ?>">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Descripcion</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="descripcion" id="descripcion"><?php echo $carpetas->descripcion; ?></textarea>
                  <span class="fa fa-user fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <!-- <div class="form-group has-feedback has-error">
              <div class="col-lg-offset-3 col-lg-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="activo" id="activo" <?php if($archivos->activo){ echo "checked";} ?> > Activo
                    </label>
                  </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="col-lg-offset-4 col-lg-8">
                <input type="hidden" name="id_carpeta" value="<?php echo $_GET["id_carpeta"];?>">
                <input type="hidden" name="tid" value="<?php echo $_GET["tid"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-open-o"></i>  Guardar</button>
              </div>
            </div>
          </form>
        </div>
            </section>
          </div>
          <div class="col-md-3">
            <section class="content">
              <img src="storage/institucion/carpeta1.png" alt="" class="img-responsive">
            </section>
          </div>
        </div>
    </div>
  </div>
  <?php else:?>
    <?php endif;?>