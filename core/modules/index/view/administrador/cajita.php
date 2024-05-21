 <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-user-circle"></i> 
        Lista de los Administradores Administrador <small> </small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=administrador">Administrador</a></li>
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
          <small>
            <div class="box-tools pull-left">
             <?php if ($u->admin):?><a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Nouvel Administrador</a>
              <!-- <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> --><?php endif; ?>
            </div>
          </small>
        </div>
        <div class="box-body">
          <?php
                $users = UserData::getAdministrador();
                if(count($users)>0){
                  // si hay usuarios
                  ?>
              <table id="example1" class="table table-bordered table-dark" style="width:100%">
                <thead>
                  <!-- <th>ID</th> -->
                  <th>Nom</th>
                  <th>Dni</th>
                  <th>Télephone</th>
                  <th>E-mail</th>
                  <th>Actif</th>
                  <!-- <th>Pagado</th> -->
                  <?php if($u->admin):?><th><center>Action</center></th><?php endif; ?>
                </thead>
                <tbody>
                   <?php
                    foreach($users as $user){
                    ?>
                  <tr>
                    <!-- <td width="10px"><?php echo $user->fecha; ?></td> -->
                  <td><?php echo $user->nombre." ".$user->apellido; ?></td>
                  <td><?php echo $user->dni ?></td>
                  <td><?php echo $user->telefono ?></td>
                  <td><?php echo $user->email ?></td>
                  <!-- <td><?php echo $user->nombre ?></td> -->
                  <td style="width:10px;"><center><?php if($user->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                  <!-- <td><?php echo $user->descripcion; ?></td> -->
                  <?php if($u->admin):?>
                  <td style="width:170px;">
                  <a href="index.php?view=actualizaradministrador&id_usuario=<?php echo $user->id_usuario;?>" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="fa fa-cog"></i> Configurer</a>
                  <a href="index.php?action=eliminaradmin&id_usuario=<?php echo $user->id_usuario;?>" class="btn btn-danger btn-sm btn-flat"><i class='fa fa-trash-o'></i> Supprimer</a>
                  </td>
                  <?php endif; ?>
                  </tr>
                <?php
                }
                }else{
                  echo "<p class='alert alert-danger'>No hay Administrador Registrado</p>";
                }
                ?>
                </tbody>
              </table>

        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-user"></i><b> Registro de un Nuevo Gobierno</b></h4>
            </div>
            <div class="modal-body has-feedback has-warning">
              <form class="form-horizontal" method="POST" action="index.php?action=nuevoadministrador">
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">Nom</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return sololetras(event)" placeholder="Nombre del Jefe" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                      <span class="fa fa-child form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">Apellido</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="apellido" name="apellido" required onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                      <span class="fa fa-check-circle form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">DNI</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dni" name="dni" required onkeypress="return solonumeros(event)" onpaste="return false" maxlength="8">
                      <span class="fa fa-credit-card form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">Télephone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="telefono" name="telefono" maxlength="9">
                      <span class="fa fa-phone form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">E-mail</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email">
                      <span class="fa fa-google-plus form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">Usuario</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="usuario" name="usuario" required>
                      <span class="fa fa-user-secret form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback has-warning">
                    <label for="inputEmail1" class="col-sm-3 control-label">Contraseña</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                      <span class="fa fa-expeditedssl form-control-feedback"></span>
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
</div
<?php else:?>
    <?php endif;?>