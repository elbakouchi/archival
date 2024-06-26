<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<?php if($u->admin):?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-folder-open-o"></i> 
    Créer un nouveau Classeurs  
        <small> </small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=periodo">Dossiers</a></li>
        <li class="active">Actif</li>
      </ol>  
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations mises à jour avec succès <i class="fa fa-hand-o-right"></i></p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
            <i class="fa fa-gg"></i><small style="color: blue;">Il est recommandé de créer le <b>Classeur</b> au nom des <b>Zones / Bureaux</b>. </small>
          <!-- <div class="box-tools pull-left">
            <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div> -->
        </div>
        <br>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=nuevacarpeta" role="form">
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Catégorie de document </label>
                <div class="col-lg-9">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Catégorie de document">
                  <span class="fa fa-folder-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Couleur de la boîte d'archives</label>
                <div class="col-lg-9">
                 <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Couleur Bleu – Jaune – Rouge – Vert">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Armoire</label>
                <div class="col-lg-9">
                  <input type="text" name="estante" class="form-control" id="estante" placeholder="Armoire A">
                  <span class="fa fa-list-alt fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Types de classement</label>
                <div class="col-lg-9">
                  <input type="text" name="modulo" class="form-control" id="modulo" placeholder="Chronologique, Alphabétique, Numérique">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Description"></textarea>
                  <span class="fa fa-file-text fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <!-- <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Carpeta Publico</label>
                <div class="col-lg-8">
                  <input type="checkbox" name="publico" id="publico">
                </div>
            </div> -->
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-5">
              <input type="hidden" name="periodo_id" value="<?php echo $_GET["periodo_id"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-open"></i> Créer une catégorie</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php endif; ?> 
  <?php if($u->jefe):?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-folder-open-o"></i> 
        CREAR NUEVA CARPETA
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=periodo">Dossier</a></li>
        <li class="active">Actif</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations mises à jour avec succès</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
             
          <!-- <div class="box-tools pull-left">
            <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div> -->
        </div>
        <br>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=nuevacarpeta" role="form">
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Nom du <b>Classeur</b></label>
                <div class="col-lg-9">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nom de fichier">
                  <span class="fa fa-folder-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Code</label>
                <div class="col-lg-9">
                 <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Code du déclarant">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Etagère</label>
                <div class="col-lg-9">
                  <input type="text" name="estante" class="form-control" id="estante" placeholder="Etagère où il se trouve">
                  <span class="fa fa-list-alt fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Module</label>
                <div class="col-lg-9">
                  <input type="text" name="modulo" class="form-control" id="modulo" placeholder="C'est dans quel module ?">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Description"></textarea>
                  <span class="fa fa-file-text fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <!-- <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Carpeta Publico</label>
                <div class="col-lg-8">
                  <input type="checkbox" name="publico" id="publico">
                </div>
            </div> -->
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-5">
              <input type="hidden" name="periodo_id" value="<?php echo $_GET["periodo_id"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-open"></i> Créer Archive</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php endif; ?> 
 <?php if($u->encargado):?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-folder-open-o"></i> 
        Créer nouvelle Archive
        <small> </small>
      </h1>
<!--       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=periodo">Dossier</a></li>
        <li class="active">Actif</li>
      </ol> -->
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations mises à jour avec succès <i class="fa fa-hand-o-right"></i></p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
            <i class="fa fa-gg"></i><small style="color: blue;">Il est recommandé de créer le <b>Classeur</b> au nom des <b>Zones / Bureaux</b>. </small>
          <!-- <div class="box-tools pull-left">
            <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div> -->
        </div>
        <br>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=nuevacarpeta" role="form">
            <?php if($u->encargado):?><small class='alert alert-success'><b><i class="fa fa-exclamation-triangle"></i> N'oubliez pas qu'une fois le <b style="color: red;">Classeur</b> créé, il ne pourra pas être <b style="color: red;">Supprimé</b>, il ne pourra être que <b style="color: red;">Modifié</b>.</small><?php endif; ?> 
            <hr>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Nom du <b>Classeur</b></label>
                <div class="col-lg-9">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nom de fichier">
                  <span class="fa fa-folder-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Code</label>
                <div class="col-lg-9">
                 <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Code du déclarant">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Etagère</label>
                <div class="col-lg-9">
                  <input type="text" name="estante" class="form-control" id="estante" placeholder="Etagère où il se trouve">
                  <span class="fa fa-list-alt fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Module</label>
                <div class="col-lg-9">
                  <input type="text" name="modulo" class="form-control" id="modulo" placeholder="C'est dans quel module ?">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Description"></textarea>
                  <span class="fa fa-file-text fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <!-- <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Carpeta Publico</label>
                <div class="col-lg-8">
                  <input type="checkbox" name="publico" id="publico">
                </div>
            </div> -->
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-5">
              <input type="hidden" name="periodo_id" value="<?php echo $_GET["periodo_id"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-open"></i> Créer Archive</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php endif; ?> 
  <?php else:?>
    <?php endif;?>