 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
    <?php 
    $area = AreaOficinaData::getById($_GET["id_area_oficina"]);
     ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-desktop"></i> 
       Modifier Area - Oficina
        <small></small>
      </h1>
      
    </section>
    <section class="content">
      <div class="box">
        <br>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=actualizarareaoficina" role="form">
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Nombre</label>
                <div class="col-lg-8">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre - Organización" onkeypress="return sololetras(event)" value="<?php echo $area->nombre; ?>">
                  <span class="fa fa-file-text-o fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Descripcion</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="detalle" id="detalle" value="<?php echo $area->detalle; ?>"><?php echo $area->detalle; ?></textarea>
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <div class="col-lg-offset-4 col-lg-8">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="activo" id="activo"<?php if($area->activo){ echo "checked";} ?>> Activo
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-4 col-lg-8">
              <input type="hidden" name="id_area_oficina" value="<?php echo $_GET["id_area_oficina"];?>">
              <input type="hidden" name="tid" value="<?php echo $_GET["tid"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-cog"></i>Modifier</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php else:?>
    <?php endif;?>