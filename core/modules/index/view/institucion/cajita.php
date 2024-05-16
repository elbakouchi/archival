
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1><i class='fa fa-cog'></i>
        CONFIGURACIÓN DE LA ORGANIZACIÓN <i class="fa fa-institution"></i>
      </h1>
<!--       <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Usuarios</li>
        <li class="active">Lista de Usuario</li>
      </ol> -->
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <?php
               $users = OrganizacionData::getAll();
                if(count($users)>0){
                  // si hay usuarios
                  ?>
                  <br>
                  <br>
              <table  class="table table-bordered">
                <thead>
                  <!-- <th><center>Id</center> </th> -->
                  <th><center>Municipalidad</center></th>
                  <th><center>Alcalde</center></th>
                  <th><center>Gestion</center></th>
                  <th><center>Direccion</center></th>
                  <th><center>Logo</center></th>
                  <?php 
                  $u=null;
                  if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):
                    $u = UserData::getById($_SESSION["admin_id"]);
                  ?>
                  <?php if($u->admin):?>
                  <th><center>Acción</center></th>
                  <?php endif;?>
                  <?php else:?>
                  <?php endif;?>
                </thead>
                <tbody>
                   <?php
                    foreach($users as $user){
                      $url = "storage/sis/admin/$user->logo";
                    ?>
                  <tr>
                  <td><?php echo $user->nombre; ?></td>
                  <td><?php echo $user->texto3; ?></td>
                  <td><?php echo $user->texto4; ?></td>
                  <td><?php echo $user->direccion; ?></td>  
                  <td><?php if( $user->logo!="" && file_exists($url)):?>
                  <img src="<?php echo $url; ?>"class="img-circle" alt="User Image" style="width:50px;">
                  <?php endif;?>
                  </td>
                  <?php 
                  $u=null;
                  if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):
                    $u = UserData::getById($_SESSION["admin_id"]);
                  ?>
                  <?php if($u->admin):?>
                  <td style="width:30px;">
                    <a href="index.php?view=configuracion&id_institucion=<?php echo $user->id_institucion;?>" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="fa fa-refresh"> </i> Configurar</a>
                  <!--  <a href="#edit" data-toggle="modal" class="btn btn-success btn-sm btn-flat" id="<?php echo $row['user']; ?>"><i class="fa fa-edit"></i> Editar</a> -->
              <!--       <a href="index.php?action=eliminardocumento&id_documento=<?php echo $user->id_documento;?>" class="btn btn-danger btn-sm btn-flat"><i class='fa fa-trash'></i>Eliminar</a> -->
                  </td>
                  <?php endif;?>
                  <?php else:?>
                  <?php endif;?>
                  </tr>
                <?php
                }
                }else{
                  echo "<p class='alert alert-danger'>No hay Ninguna Informacion para realiza el cambio</p>";
                }
                ?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>