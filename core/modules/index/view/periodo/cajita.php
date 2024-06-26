<?php
$team =  PeriodoData::getById($_GET["id_periodo"]);
$carpetas = PeriodoCarpetaData::getAllByTeamId($_GET["id_periodo"]);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-cubes"></i> 
        Exercice <?php echo $team->nombre; ?>
        <small> </small>
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
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations correctement mises à jour</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
            <h3 class="box-title"><b>Classeurs qui correspondent à cette période</b></h3>
            <!-- <small style="color: blue;">, Se recomienda crear carpetas con nombre de areas o oficinas</small> -->
          <div class="box-tools pull-left">
            <a href="index.php?view=carpeta&periodo_id=<?php echo $_GET["id_periodo"]; ?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-folder-open"></i> CRÉER UN NOUVEAU CLASSEUR </a>
            <!-- <a href="index.php?view=proyecto" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> -->
          </div>
<!--           <div class="box-tools pull-right">
            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>

              <table id="example1" class="table table-bordered table-hover">
              <thead>
              <th>Catégorie de document</th>
              <th>Couleur de la boîte d'archives</th>
              <th>Armoire</th>
              <th>Types de classement</th>
              <th>Description</th>
              <th><center><i class="fa fa-hourglass-start"></i> Action</center></th>
              </thead>
              <?php
              foreach($carpetas as $ver){
                $car = $ver->getCarrpeta();
                ?>
                <tr>
                <td><i class="fa fa-folder-open"></i> <a href="./?view=documento&id_carpeta=<?php echo $car->id_carpeta;?>"> <?php echo $car->nombre; ?></a></td>
                <td><?php echo $car->modulo; ?></td>
                <td><?php echo $car->estante; ?></td>
                <td><?php echo $car->codigo; ?></td>
                <td><?php echo $car->descripcion; ?></td>
                <td style="width:170px;">
                <a href="index.php?view=configuracioncarpeta&id_carpeta=<?php echo $car->id_carpeta;?>&tid=<?php echo $team->id_periodo;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cog'></i>Modifier</a>
                <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
                  <?php 
                  $u=null;
                  if($_SESSION["admin_id"]!=""){
                  $u = UserData::getById($_SESSION["admin_id"]);
                  }?>
                  <a href="#" class="btn btn-danger btn-sm btn-flat delete_document" data-id-carpeta="<?php echo $car->id_carpeta;?>">
                    <i class="fa fa-trash-o"></i> Supprimer
                  </a>
                <?php else:?>
                <?php endif;?>
                </td>
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>Aucune archive n'a été créée pendant cette période</p>";
            }


            ?>
        </div>
      </div>
      <!-- Bootstrap Modal -->
      <div class="modal fade" id="confirmDeleteDocumentoModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmer la suppression</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Etes vous sur de supprimer cette catégorie?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                      <button type="button" id="confirmDeletion" class="btn btn-danger">Oui</button>
                  </div>
              </div>
          </div>
      </div>
</section>
    <script>
      $(document).ready(function() {
        $('.delete_document').click(function(e) {
            e.preventDefault();
            var idCarpeta = $(this).data('id-carpeta');
            $('#confirmDeleteDocumentoModal').modal('show');
            $('#confirmDeletion').on('click', function() {
                $.ajax({
                    url: 'index.php?action=eliminarcarpetas',
                    method: 'GET',
                    data: {id_carpeta: idCarpeta},
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting documento:", error);
                    }
                });
                $('#confirmDeleteDocumentoModal').modal('hide');
            });
          });
        });

        </script>

  </div>