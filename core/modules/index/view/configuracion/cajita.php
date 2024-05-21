<?php
$configuracion = OrganizacionData::getById($_GET["id_institucion"]);
$url = "storage/sis/admin/$configuracion->logo";
$url = "storage/sis/admin/$configuracion->imagen";
if($configuracion!=null):
?>
<div class="content-wrapper">
  <section class="content-header">
  <h1><li class="fa fa-refresh fa-spin fa-1x fa-left" ></li>
      <?php
        $config = OrganizacionData::getAll();
          if(count($config)>0){
            ?>
            <?php
            foreach($config as $configuracion){ ?>
              Configuración de <b><?php echo $configuracion->nombre;?></b> 
            <?php
            }
          }else{}
      ?>
    </h1>
    <?php
             if(isset($_SESSION["actualizar_configuracion"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Atualización Existosa</p>
            <?php 
            unset($_SESSION["actualizar_configuracion"]);
            endif; ?>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="form-responsive">
              <marquee><h1 style="color: blue"><b><?php echo $configuracion->nombre; ?></b></h1></marquee>
              <hr>
              <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="index.php?action=configuracion">
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-3 control-label"></label>
                  <div class="col-md-3">
                    
                  </div>
                  <label for="inputEmail1" class="col-lg-1 control-label"></label>
                  <div class="col-md-3">
                    <?php if($configuracion->imagen!=""):?>
                    <br>
                    <img src="storage/sis/admin/<?php echo $configuracion->imagen;?>"class="img-circle" alt="User Image" style="width:80px;">
                    <?php endif;?>
                  </div>
                  <label for="inputEmail1" class="col-lg-1 control-label"></label>
                  <div class="col-md-2">
                    <?php if($configuracion->logo!=""):?>
                     <br>
                     <img src="storage/sis/admin/<?php echo $configuracion->logo;?>"class="img-circle" alt="User Image" style="width:80px;">
                     <?php endif;?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Logo:</label>
                  <div class="col-md-4">
                   <input type="file" name="logo" id="logo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Nombre:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $configuracion->nombre; ?>" placeholder="Actualice el Nombre de la Pagina"  onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();" maxlength="55">
                    <span class="fa fa-institution form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Adresse:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $configuracion->direccion; ?>" placeholder="Mettre à jour l'adresse"  onkeypress="return sololetras(event)" onpaste="return false" maxlength="70">
                    <span class="fa fa-map-marker form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Téléphone:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo $configuracion->telefono; ?>" placeholder="Mettre à jour le numéro"  onkeypress="return solonumeros(event);" pattern=".{9,99}" onpaste="return false" maxlength="12">
                    <span class="fa fa-phone form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Responsable:</label>
                   <div class="col-md-4 form-group has-feedback">
                     <?php
                      $personales = UserData::getAdministrador();
                      if(count($personales)>0):?>
                        <select name="usuario_id" class="form-control">
                          <option value="">--------------- SELECCIONE ENCARGADO DE ESTE SISTEMA ----------------</option>
                          <?php foreach($personales as $personal):?>
                            <option value="<?php echo $personal->id_usuario; ?>" <?php if($configuracion->usuario_id==$personal->id_usuario){ echo "selected";} ?>><?php echo $personal->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php endif; ?>
                   </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Titulo:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="texto1" class="form-control" id="texto1" value="<?php echo $configuracion->texto1; ?>" placeholder="Actualice el Titulo del Icono de la Pagina" onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();" maxlength="10">
                    <span class="fa fa-file-text form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Titulo Login:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="texto2" class="form-control" id="texto2" value="<?php echo $configuracion->texto2; ?>" placeholder="Actualice el Titulo del Login"  onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();" maxlength="25">
                    <span class="fa fa-file-text form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Alcalde</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="texto3" class="form-control" id="texto3" value="<?php echo $configuracion->texto3; ?>" placeholder="Nombre del Alcalde Actual"  onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                    <span class="fa fa-file-text form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Gestion</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="texto4" class="form-control" id="texto4" value="<?php echo $configuracion->texto4; ?>" placeholder="Periodo Actual"  onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                    <span class="fa fa-file-text form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Mensaje Registro:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <textarea class="form-control" id="texto5" placeholder="Actualice el Mensaje del Registro " rows="2" name="texto5" maxlength="150" onkeypress="return sololetras(event)"><?php echo $configuracion->texto5;?></textarea>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Mensaje Inicio:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <textarea class="form-control" id="texto6" placeholder="Actualice el Mensaje del Inicio" rows="2" name="texto6"  maxlength="150" onkeypress="return sololetras(event)"><?php echo $configuracion->texto6; ?></textarea>
                   </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Marquee:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="red_social1" class="form-control" id="red_social1" value="<?php echo $configuracion->red_social1; ?>" placeholder="Actualice el Marquee" maxlength="50" onkeypress="return sololetras(event)">
                    <span class="fa fa-file-text form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Comentario Inicio:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="red_social2" class="form-control" id="red_social2" value="<?php echo $configuracion->red_social2; ?>" placeholder="Actualice el Comentario de Inicio" maxlength="200" onkeypress="return sololetras(event)">
                    <span class="fa fa-commenting-o form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Titulo Carroucel:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="red_social3" class="form-control" id="red_social3" value="<?php echo $configuracion->red_social3; ?>" placeholder="Actualice el Titulo del Carroucel"  onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();" maxlength="50">
                    <span class="fa fa-leaf form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Description 1 Carroucel :</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="red_social4" class="form-control" id="red_social4" value="<?php echo $configuracion->red_social4; ?>" placeholder="Actualice la Primera Description del Carroucel" maxlength="150" onkeypress="return sololetras(event)">
                    <span class="fa fa-leaf form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Description 2 Carroucel:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="red_social5" class="form-control" id="red_social5" value="<?php echo $configuracion->red_social5; ?>" placeholder="Actualice la Segunda Description del Carroucel"  maxlength="200" onkeypress="return sololetras(event)">
                    <span class="fa fa-leaf form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Description 3 Carroucel:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="red_social6" class="form-control" id="red_social6" value="<?php echo $configuracion->red_social6; ?>" placeholder="Actualice la Tercera Description del Carroucel"  maxlength="200" onkeypress="return sololetras(event)">
                    <span class="fa fa-leaf form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Comentario 1 Footer:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="footer1" class="form-control" id="footer1" value="<?php echo $configuracion->footer1; ?>" placeholder="Actualice el Primer Comentario del Footer"  maxlength="50" onkeypress="return sololetras(event)">
                    <span class="fa fa-copyright form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Comentario 2 Footer:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="footer2" class="form-control" id="footer2" value="<?php echo $configuracion->footer2; ?>" placeholder="Actualice el Segundo Comentario del Footer" maxlength="30">
                    <span class="fa fa-copyright form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 control-label">Comentario 2 Footer:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="footer3" class="form-control" id="footer3" value="<?php echo $configuracion->footer3; ?>" placeholder="Actualice el Tercero Comentario del Footer" maxlength="50">
                    <span class="fa fa-copyright form-control-feedback"></span>
                   </div>
                   <label for="inputEmail1" class="col-lg-2 control-label">Link Footer:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="text" name="gerente" class="form-control" id="gerente" value="<?php echo $configuracion->gerente; ?>" placeholder="Actualice el Link del Footer" onpaste="return true">
                    <span class="fa fa-copyright form-control-feedback"></span>
                   </div>
                </div>
                <div class="form-group">
                   <label for="inputEmail1" class="col-lg-2 control-label">Imagen Login:</label>
                   <div class="col-md-4 form-group has-feedback">
                    <input type="file" name="imagen" id="imagen">
                   </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-3">
                   <button type="submit" class="btn btn-success btn-block"><i class="fa fa-spinner fa-spin fa-1x fa-left"> </i> Guardar Datos</button>
                  </div>
                  <div class="col-lg-3">
                    <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-eraser"></i> Limpiar Campos</button>
                  </div>
                </div>
                <input type="hidden" name="id_institucion" value="<?php echo $_GET["id_institucion"];?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php endif; ?>