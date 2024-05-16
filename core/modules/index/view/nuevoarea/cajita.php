<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-laptop"></i> 
        Nueva Area / Oficina
        <small></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?view=administrador">Administrador</a></li>
        <li class="active">Activo</li>
      </ol> -->
    </section>
    <section class="content">
      <div class="box">
        <br>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="index.php?action=nuevaareaoficina" role="form">
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Nombre del Area/Oficina</label>
                <div class="col-lg-8">
                  <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre del Are/Oficina">
                  <span class="fa fa-desktop fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label">Descripcion</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="detalle" id="detalle" placeholder="Dar un Pequeño detalle"></textarea>
                  <span class="fa fa-list fa fa-instirution form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback has-error">
              <label for="inputEmail1" class="col-lg-4 control-label"> Publico</label>
                <div class="col-lg-8">
                  <input type="checkbox" name="publico" id="publico">
                </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-10">
              <input type="hidden" name="periodo_id" value="<?php echo $_GET["periodo_id"];?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Registro</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>