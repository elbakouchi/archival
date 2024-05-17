<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      
      <!-- <small> FOLDERFILE Municipalidad Distrital de ACORIA</small> -->
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12" style="display: none;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-laptop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Areas</span>
              <span class="info-box-number"><small><?php echo count(AreaOficinaData::getAll());?></small></span>
              <!-- <a href="./?view=detalleproceso" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!--div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-folder-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dossiers</span>
              <span class="info-box-number"><?#php echo count(CarpetaData::getAll());?></span-->
              <!-- <a href="./?view=detalleproceso" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a> -->
            <!--/div-->
            <!-- /.info-box-content -->
          <!--/div-->
          <!-- /.info-box -->
      <!--/div-->
      <!-- /.col -->
      <!-- fix for small devices only -->
      <!--div class="clearfix visible-sm-block"></div-->
      <!--div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box"-->
            <!-- <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span> -->
            <!--span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Documents</span>
              <span class="info-box-number"><?#php echo count(DocumentoData::getAll());?></span-->
              <!-- <a href="./?view=cliente" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a> -->
            <!--/div-->
            <!-- /.info-box-content -->
          <!--/div-->
          <!-- /.info-box -->
      <!--/div-->
      <!-- /.col -->
      <!--div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Utilisateurs</span>
              <span class="info-box-number"><?#php echo count(UserData::getAll());?></span-->
              <!-- <a href="./?view=administrador" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a> -->
            <!--/div-->
            <!-- /.info-box-content -->
          <!--/div-->
          <!-- /.info-box -->
      </div-->
      <!-- /.col -->
    </div>
    <!-- ---------------------------------------INICIO DE LA PRIMERA CLUMNA------------- -->
    <!-- /.row -->
    <?php if($u->admin):?>
    <div class="row">
    
 <!-- ------------------------------------------------------TERMINA LA PRIMERA COLUMNA -------->
 <!-- ------------------------------------------------INICIA LA SEGUNDA COLUMNA------------ -->
      <section class="col-xs-8">
        <!-- Map box -->
          <div class="box box-solid">
            <div class="box-header">
              <!-- <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a> -->
              <div class="table-responsive">
                <?php
                $periodos = PeriodoData::getAll();
                if(count($periodos)>0){
                  // si hay usuarios
                  ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <th></th>
                    <th>Période</th>
                   <!--   <th><a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a></th>  -->
                  </thead>
                  <?php
                  foreach($periodos as $periodo){
                    ?>
                  <tbody>
                    <tr>
                      <td style="width:10px;"><a href="index.php?action=seleccionperiodo&id_periodo=<?php echo $periodo->id_periodo;?>" class="btn btn-success btn-xs">Exercice <i class="fa fa-arrow-right"></i></a></td>
                      <td style="width:150px;"><a href=""><a href="./?view=periodo&id_periodo=<?php echo $periodo->id_periodo;?>"><?php echo $periodo->nombre; ?></a></td>       
                    
                    </tr>
                  </tbody>
                <?php
                        }
                        echo "</table>";
                      }else{
                        echo "<p class='alert alert-danger'>No hay Ningun Periodo Registrado</p>";
                      }
                      ?>
              </div>
            </div>
          </div>
          <!-- /.box -->
      </section>
      <!--section class="col-xs-4"-->
        <!-- Map box -->
          <!--div class="box box-danger">
            <div class="box-header">
              <img src="storage/institucion/logolobosinfondo.png" class="img-responsive" alt="">
            </div>
          </div-->
          <!-- /.box -->
      <!--/section-->
  <!-- ---------------------------------------------------------FINAL DE LA SEGUNDA COLUMNA--- -->
    </div>
  </section>
</div>
<?php endif; ?> 
<?php if($u->jefe):?>
  <section class="content">
      <div class="box">
        <div class="box-body">
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-user-secret"></i> EL SISTEMA DE REPOSITORIO FOLDERFILE  TE DA LA BIENVENIDA, <B>SR.</B> <?php echo $u->nombre." ".$u->apellido; ?>
            </div>
            <img src="storage/institucion/orde.jpg" class="img-responsive" alt="" width="2000">
          </div>
        </div>
      </div>
    </section>
<?php endif; ?> 
<?php if($u->encargado):?>
  <section class="content">
      <div class="box">
        <div class="box-body">
          <div class="box box-info">
            <div class="box-header">
              <hr>
              <h1><i class="fa fa-user-secret"> ESTAS EN MODO ENCARGADO</i></h1>
              <hr>
              <i class="fa fa-institution"></i> EL SISTEMA DE REPOSITORIO FOLDERFILE TE DA LA BIENVENIDA, <B>SR.</B> <?php echo $u->nombre." ".$u->apellido; ?> <b +><i class="fa fa-smile-o"></i></b>
            </div>
            <img src="storage/institucion/a.jpg" class="img-responsive" alt="" width="2000">
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?> 
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-user"></i><b> Registro de un Nuevo Gobierno</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="index.php?action=nuevoperiodo">
                <div class="form-group">
                    <label for="inputEmail1" class="col-sm-3 control-label">Periodo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return sololetras(event)" placeholder="2010 - 2015" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-sm-3 control-label">Descripcion</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="descripcion" name="descripcion"  onpaste="return false">
                    </div>
                </div>
                <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="activo"> Activo
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
            </div>  
          </form>
        </div>
    </div>
</div>
<?php else:?>
    <?php endif;?>