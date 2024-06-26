<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-file-pdf-o"></i> 
        Nouveau document
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=administrador">Administrateur</a></li>
        <li class="active">Actif</li>
      </ol> -->
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <div class="box box-info">
          </div>
          <form class="form-horizontal" method="post" action="index.php?action=nuevodocumento" role="form" enctype="multipart/form-data">
            <?php if($u->encargado):?><small class='alert alert-success'><b><i class="fa fa-exclamation-triangle"></i> Rappelez-vous qu'une fois enregistré le <b style="color: red;">Document</b>, il ne pourra pas être <b style="color: red;">Supprimé</b>, il pourra seulement être <b style="color: red;">Modifié</b>.</b></small><?php endif; ?> 
            <hr>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Sélectionner un document</label>
                <div class="col-lg-9">
                  <input type="file" name="otros" required>
                  <!-- <input type="file" name="imagen" id="imagen"> -->
                  <!-- <span class="fa fa-user fa fa-instirution form-control-feedback"></span> -->
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Numéro dossier</label>
                <div class="col-lg-9">
                  <input type="text" name="nombre_documento" required class="form-control" id="nombre_documento" placeholder="Exemple:1-2023">
                  <span class="fa fa-file-text fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> N° boîte archive</label>
                <div class="col-lg-9">
                  <input type="text" name="folio" class="form-control" id="folio" placeholder="">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Objet</label>
                <div class="col-lg-9">
                 <input type="text" name="responsable" class="form-control" id="responsable" placeholder="Objet">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Emplacement</label>
                <div class="col-lg-9">
                 <input type="text" name="ubicacion"  class="form-control" id="ubicacion" placeholder="Armoire 1 , 2 , BA : 12">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Description"></textarea>
                  <span class="fa fa-file-text-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
<!--             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Dossier Public</label>
                <div class="col-lg-8">
                  <input type="checkbox" name="publico" id="publico">
                </div>
            </div> -->
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="carpeta_id" value="<?php echo $_GET["carpeta_id"];?>">
              <input type="hidden" name="tid" value="<?php echo $_GET["tid"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Télécharger un document</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
   <?php else:?>
    <?php endif;?>
