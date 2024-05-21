 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-folder-open-o"></i> 
        Crear Nuevo Archivador
        <small></small>
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=administrador">Administrador</a></li>
        <li class="active">Actif</li>
      </ol> -->
    </section>
    <div class="box">
      <?php if($u->encargado):?>
            <p class='alert alert-success'><b><i class="fa fa-exclamation-triangle"></i> N'oubliez pas qu'une fois le <b style="color: red;">Classeur</b> créé, il ne pourra pas être <b style="color: red;">Supprimé</b>, il ne pourra être que <b style="color: red;">Modifié</b>.</p>
           <?php endif;?>
        <div class="row">
          <div class="col-md-2">
            <section class="content">
              <img src="storage/institucion/carpeta.jpg" alt="">
            </section>
          </div>
          <div class="col-md-10">
            <section class="content">
              <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=nuevacarpetaarea" role="form">
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Nombre del Archivador</label>
                <div class="col-lg-8">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre - Organización">
                  <span class="fa fa-user fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Code</label>
                <div class="col-lg-8">
                 <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Code del Archivador">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Etagère</label>
                <div class="col-lg-8">
                  <input type="text" name="estante" class="form-control" id="estante" placeholder="Etagère donde que se encuentra">
                  <span class="fa fa-list-alt fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Module</label>
                <div class="col-lg-8">
                  <input type="text" name="modulo" class="form-control" id="modulo" placeholder="en que modulo se encuentra">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Description</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Description  para mayor informacion"></textarea>
                  <span class="fa fa-user fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label"> Publico</label>
                <div class="col-lg-8">
                  <input type="checkbox" name="publico" id="publico">
                </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-4 col-lg-8">
              <input type="hidden" name="area_oficina_id" value="<?php echo $_GET["area_oficina_id"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-open-o"></i> Créer Archive</button>
              </div>
            </div>
          </form>
        </div>
            </section>
          </div>
        </div>
    </div>
  </div>
    <?php else:?>
    <?php endif;?>