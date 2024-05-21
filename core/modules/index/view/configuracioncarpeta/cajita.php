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
      <h1> <i class="fa fa-cubes"></i> 
        ACTUALIZACION DE DATOS DEL ARCHIVADOR: <B><?php echo $carpetas->nombre ?></B>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=administrador">Administrador</a></li>
        <li class="active">Actif</li>
      </ol> -->
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=actualizarcarpeta" role="form">
            <?php if($u->encargado):?><small class='alert alert-danger'><b><i class="fa fa-exclamation-triangle"></i> Estimado Encargado <b style="color: blue;"><?php echo $u->nombre." ".$u->apellido; ?></b>, ten en cuenta que los cambios que va realizar figurará a nombre de Usted, !tenga mucho cuidado!</b></small><?php endif; ?> 
            <hr>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Catégorie de document</label>
                <div class="col-lg-9">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Catégorie de document" value="<?php echo $carpetas->nombre; ?>">
                  <span class="fa fa-folder-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Types de classement</label>
                <div class="col-lg-9">
                 <input type="text" name="codigo"  class="form-control" id="codigo" placeholder="Chronologique, Alphabétique, Numérique" value="<?php echo $carpetas->codigo; ?>">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Armoire </label>
                <div class="col-lg-9">
                  <input type="text" name="estante"  class="form-control" id="estante" placeholder="Armoire A" value="<?php echo $carpetas->estante; ?>">
                  <span class="fa fa-list-alt fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Couleur de la boîte d'archives</label>
                <div class="col-lg-9">
                  <input type="text" name="modulo"  class="form-control" id="modulo" placeholder="Couleur Bleu  – Jaune – Rouge – Vert"  value="<?php echo $carpetas->modulo; ?>">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Description"><?php echo $carpetas->descripcion; ?></textarea>
                  <span class="fa fa-file-text fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-5">
                <input type="hidden" name="id_carpeta" value="<?php echo $_GET["id_carpeta"];?>">
                <input type="hidden" name="tid" value="<?php echo $_GET["tid"];?>">
                <button type="reset" class="btn btn-info"><i class="fa fa-eraser"></i> Supprimer</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-cog"></i> Mettre à jour</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php else:?>
    <?php endif;?>