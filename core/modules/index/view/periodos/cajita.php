 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<?php if($u->admin):?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1><i class="fa fa-server"></i>
        LISTE DES PÉRIODES
        <small></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="index.php?view=home"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="#">Periodo</a></li>
        <li class="active">Actif</li>
      </ol> -->
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
          <h3 class="box-title"><b>Toutes les périodes enregistrées</b></h3>
          <div class="box-tools pull-left">
            <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouvel exercice</a>
            <a href="index.php?view=periodos" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
                <?php
                $periodos = PeriodoData::getAll();
                if(count($periodos)>0){
                  ?>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <th></th>
                    <th>Période</th>
                    <th> Gérer</th>
                  </thead>
                  <?php
                  foreach($periodos as $periodo){
                    ?>
                  <tbody>
                    <tr>
                      <td style="width:10px;"><a href="index.php?action=seleccionperiodo&id_periodo=<?php echo $periodo->id_periodo;?>" class="btn btn-success btn-xs">Exercice <i class="fa fa-arrow-right"></i></a></td>
                      <td><a href=""><a href="./?view=periodo&id_periodo=<?php echo $periodo->id_periodo;?>"><?php echo $periodo->nombre; ?></a></td>       
                      <td style="width:10px;">
                        <a data-toggle="modal" href="#edit-<?php echo $periodo->id_periodo;?>" class="btn btn-warning btn-xs"> <i class="fa fa-cog"></i> Paramètre</a>
                        <!-- Actualizacion del Periodo -->
                        <div class="modal fade" id="edit-<?php echo $periodo->id_periodo;?>">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <center><h4 class="modal-title"><i class="fa fa-arrows-h"></i><b> Mise à jour de l'Exercice <?php echo $periodo->nombre ?></b></h4></center>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="index.php?action=actualizarperiodo">
                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-sm-3 control-label">Exercice</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $periodo->nombre; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-sm-3 control-label">Description</label>

                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $periodo->descripcion; ?>" >
                                          </div>
                                      </div>
                                      <div class="form-group">
                                      <div class="col-lg-offset-12 col-lg-12">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="activo"<?php if($periodo->activo){ echo "checked";} ?>> Actif
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                    <input type="hidden" name="id_periodo" value="<?php echo $periodo->id_periodo; ?>">
                                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Sauvegarder</button>
                                  </div>  
                                </form>
                              </div>
                          </div>
                      </div>
                      </div>
                       <!-- Final de Actualizacion -->
                      </td>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-arrows-h"></i><b> Registre d'un Nouvel Période du Gouvernement</b></h4>
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
                    <label for="inputEmail1" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="descripcion" name="descripcion" required onkeypress="return sololetras(event)" onpaste="return false" >
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
<?php endif; ?> 
<!-- SOLO PARA JEFES DEL AREA -->
<?php if($u->jefe):?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-server"></i>
       LISTE DES PÉRIODES
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?view=home"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="#">Periodo</a></li>
        <li class="active">Actif</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <?php
            // print_r($_SESSION);
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations mises à jour avec succès</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
          <h3 class="box-title"><b>Toutes les périodes enregistrées</b></h3>
          <!-- <small style="color: blue;">INICIO</small> -->
          <!-- <small style="color: red;">Usted es el único responsables de realizar este cambio</small> -->
          <div class="box-tools pull-left">
            <!-- <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo Periodo</a> -->
            <a href="index.php?view=periodos" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
                <?php
                $periodos = PeriodoData::getAll();
                if(count($periodos)>0){
                  // si hay usuarios
                  ?>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <th></th>
                    <th>Période</th>
                    <!-- <th>Gérer</th> -->
                  </thead>
                  <?php
                  foreach($periodos as $periodo){
                    ?>
                  <tbody>
                    <tr>
                      <td style="width:10px;"><a href="index.php?action=seleccionperiodoo&id_periodo=<?php echo $periodo->id_periodo;?>" class="btn btn-success btn-xs">Exercice <i class="fa fa-arrow-right"></i></a></td>
                      <td><?php echo $periodo->nombre; ?></td>       
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-user"></i><b> Registro de un Nuevo Periodo del  Gobierno</b></h4>
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
                    <label for="inputEmail1" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="descripcion" name="descripcion" required onkeypress="return sololetras(event)" onpaste="return false" >
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
<?php endif; ?>
<?php if($u->encargado):?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1><i class="fa fa-server"></i>
        LISTE DES PÉRIODES
        <small></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="index.php?view=home"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="#">Periodo</a></li>
        <li class="active">Actif</li>
      </ol> -->
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
          <h3 class="box-title"><b>Toutes les périodes enregistrées</b></h3>
          <div class="box-tools pull-left">
            <a href="#" title="Estimado encargado no puedes Registrar" alert="Estimado encargado no puedes Registrar" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouvel exerciceo</a>
            <a href="index.php?view=periodos" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
                <?php
                $periodos = PeriodoData::getAll();
                if(count($periodos)>0){
                  ?>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <th></th>
                    <th>Période</th>
                    <th> Gérer</th>
                  </thead>
                  <?php
                  foreach($periodos as $periodo){
                    ?>
                  <tbody>
                    <tr>
                      <td style="width:10px;"><a href="index.php?action=seleccionperiodo&id_periodo=<?php echo $periodo->id_periodo;?>" class="btn btn-success btn-xs">Exercice <i class="fa fa-arrow-right"></i></a></td>
                      <td><a href=""><a href="./?view=periodo&id_periodo=<?php echo $periodo->id_periodo;?>"><?php echo $periodo->nombre; ?></a></td>       
                      <td style="width:10px;">
                        <a data-toggle="modal" href="#" title="Estimado encargado no puedes modificar" class="btn btn-warning btn-xs"> <i class="fa fa-cog"></i> Paramètre</a>
                        <!-- Actualizacion del Periodo -->
                        <div class="modal fade" id="edit-<?php echo $periodo->id_periodo;?>">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <center><h4 class="modal-title"><i class="fa fa-arrows-h"></i><b> Mise à jour de l'Exercice <?php echo $periodo->nombre ?></b></h4></center>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="index.php?action=actualizarperiodo">
                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-sm-3 control-label">Exercice</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $periodo->nombre; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-sm-3 control-label">Description</label>

                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $periodo->descripcion; ?>" >
                                          </div>
                                      </div>
                                      <div class="form-group">
                                      <div class="col-lg-offset-12 col-lg-12">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="activo"<?php if($periodo->activo){ echo "checked";} ?>> Actif
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                                    <input type="hidden" name="id_periodo" value="<?php echo $periodo->id_periodo; ?>">
                                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Sauvegarder</button>
                                  </div>  
                                </form>
                              </div>
                          </div>
                      </div>
                      </div>
                       <!-- Final de Actualizacion -->
                      </td>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-arrows-h"></i><b> Registro de un Nuevo Periodo del  Gobierno</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="index.php?action=nuevoperiodo">
                <div class="form-group">
                    <label for="inputEmail1" class="col-sm-3 control-label">Exercice</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return sololetras(event)" placeholder="2010 - 2015" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="descripcion" name="descripcion" required onkeypress="return sololetras(event)" onpaste="return false">
                    </div>
                </div>
                <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="activo"> Actif
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Sauvegarder</button>
            </div>  
          </form>
        </div>
    </div>
</div>
<?php endif; ?> 
<?php else:?>
    <?php endif;?>