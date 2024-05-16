 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
    <?php 
    $archivos = DocumentoData::getById($_GET["id_archivo"]);
     ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-file-pdf-o"></i> 
         <B><?php echo $archivos->nombre_documento ?></B>
      </h1>
    </section>
    <div class="row">
      <section class="content">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <div>
                <div class="form-group has-feedback has-error">
                  <div class="col-lg-12">
                    <iframe src="storage/documentos/<?php echo $archivos->otros; ?>"  width="100%" height="400"></iframe> 
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <div>
                <!-- <section class="content"> -->
      <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=actualizardocumento" role="form">
            <br>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Numero dossier</label>
                <div class="col-lg-9">
                  <input type="text" name="nombre_documento" required class="form-control" id="nombre_documento"value="<?php echo $archivos->nombre_documento ?>">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Nombre pieces</label>
                <div class="col-lg-9">
                  <input type="text" name="folio"  class="form-control" id="folio" value="<?php echo $archivos->folio ?>">
                  <span class="fa fa-barcode fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
             <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label"> Objet</label>
                <div class="col-lg-9">
                 <input type="text" name="responsable"  class="form-control" id="responsable" value="<?php echo $archivos->responsable ?>">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Emplacement</label>
                <div class="col-lg-9">
                 <input type="text" name="ubicacion"  class="form-control" id="ubicacion" value="<?php echo $archivos->ubicacion ?>">
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <?php if($u->admin):?>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" rows="3" name="descripcion" id="descripcion"><?php echo $archivos->descripcion ?></textarea>
                  <span class="fa fa-file-text-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <hr>
            <?php endif;?>
            <?php if($u->encargado):?>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-3 control-label">Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" rows="1" name="descripcion" id="descripcion"><?php echo $archivos->descripcion ?></textarea>
                  <span class="fa fa-file-text-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <?php endif;?>
            <div class="form-group has-feedback has-error">
              <div class="col-lg-offset-3 col-lg-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="publico" id="publico" <?php if($archivos->publico){ echo "checked";} ?> > Publique
                    </label>
                  </div>
              </div>
              <div class="col-lg-offset-1 col-lg-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="activo" id="activo" <?php if($archivos->activo){ echo "checked";} ?> > Actif
                    </label>
                  </div>
              </div>
              <div class="col-lg-offset-1 col-lg-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="perdido" id="perdido" <?php if($archivos->perdido){ echo "checked";} ?> > Perdu
                    </label>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <!-- <div class="col-lg-offset-6 col-lg-6"> -->
                <center>
                  <input type="hidden" name="id_archivo" value="<?php echo $_GET["id_archivo"];?>">
                  <input type="hidden" name="tid" value="<?php echo $_GET["tid"];?>">
                  <button type="reset" class="btn btn-info"><i class="fa fa-eraser"></i> Delete</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-cog"></i>Modifier</button>
                </center>
              <!-- </div> -->
            </div>
          </form>
        </div>
      </div>
      <!--  <?php if($u->encargado):?><small><b class='alert alert-danger'><i class="fa fa-exclamation-triangle"></i> Estimado Encargado <b style="color: blue;"><?php echo $u->nombre." ".$u->apellido; ?></b>, ten en cuenta que los cambios que va realizar figurará a nombre de Usted, !tenga mucho cuidado!</b></small><?php endif; ?>  -->
     <?php if($u->encargado):?> <p class='alert alert-danger'><i class="fa fa-exclamation-triangle"></i> Soyez très prudent, tout changement sera à votre nom !</p><?php endif; ?>
    <!-- </section> -->
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>
    
  </div>
  <?php else:?>
    <?php endif;?>