<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
<?php
$team =  CarpetaData::getById($_GET["id_carpeta"]);
$carpetas = CarpetaArchivoData::getAllByTeamId($_GET["id_carpeta"]);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa fa-file-text-o"></i> 
        DOCUMENTS APPARTENANT AU DOSSIER: <B style="color:blue;"><?php echo $team->nombre; ?></B> 
        <!-- <small> CMJ</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=periodo">Carpetas</a></li>
        <li class="active">Actif</li>
      </ol> -->
    </section>
    <?php if($u->admin):?>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations correctement mises à jour</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
          <h3 class="box-title"><b>Documents enregistrés</b></h3>
          <div class="box-tools pull-left">
            <!-- <a href="index.php?view=periodo&id_periodo=$_GET[id_periodo]" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-file-word-o"></i> Retornar</a> -->
            <a href="index.php?view=nuevodocumento&carpeta_id=<?php echo $_GET["id_carpeta"]; ?>&tid=<?php echo $team->id_carpeta;?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-file-word-o"></i> Nouveau document</a>
            <!-- <a href="index.php?view=documento&tid=<?php echo $team->id_carpeta;?>" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> -->
          </div>
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>

              <table id="example1" class="table table-bordered table-hover">
              <thead>
              <th>Numero dossier</th>
              <th> Emplacement</th>
              <th> Objet</th>
              <th>Actif</th>
              <th>Vérifier</th>
              <th><center><i class="fa fa-hourglass-start"></i> Action</center></th>
              <th><center><i class="fa fa-list"></i> Détail</center></th>
              </thead>
              <?php
              foreach($carpetas as $ver){
                $car = $ver->getDocumento();
                ?>
                <tr>
                <td><i class="fa fa-file-pdf-o"></i> <?php echo $car->nombre_documento; ?></td>
                <td> <i class="fa fa-file-pdf-o"></i>  <?php echo $car->ubicacion; ?></td>
                <td><!-- <i class="fa fa-file-pdf-o"></i> --> <?php echo $car->responsable; ?></td>
                <td style="width:10px;"><center><?php if($car->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                <td style="width:10px;"><a href="index.php?view=mostrardocumento&id_archivo=<?php echo $car->id_archivo;?>"<i class="fa fa-eye"></i> Voir</a></td>
                <td style="width:180px;">
                  <a href="index.php?view=configuraciondocumento&id_archivo=<?php echo $car->id_archivo;?>&tid=<?php echo $team->id_carpeta;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cloud'></i>Modifier</a>
                  <!--a href="#" id="deleteDocumentoLink" class="btn btn-danger btn-sm btn-flat">
                      <i class="fa fa-trash-o"></i> Supprimer
                  </a-->
                 
                  <a href="#" class="btn btn-danger btn-sm btn-flat delete_document" data-id-archivo="<?php echo $car->id_archivo;?>" data-tid="<?php echo $team->id_carpeta;?>">
                  <i class="fa fa-trash-o"></i> Supprimer
                  </a>



                 

                </td>
                 <td style="width:90px;"><center><a href="index.php?view=detalledocumento&id_archivo=<?php echo $car->id_archivo;?>&tid=<?php echo $team->id_carpeta;?>" class="btn btn-info btn-sm btn-flat"><i class='fa fa-list'></i> Détail</a></center></td>
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>Aucun document n'est enregistré dans ce classeur</p>";
            }


            ?>
        </div>
      </div>
    </section>
    <?php endif;?>
    <?php if($u->jefe):?>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations correctement mises à jour</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
          <h3 class="box-title"><b>Documents enregistrés</b></h3>
          <div class="box-tools pull-left">
            <a href="index.php?view=nuevodocumento&carpeta_id=<?php echo $_GET["id_carpeta"]; ?>&tid=<?php echo $team->id_carpeta;?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-file-word-o"></i> Nouveau document</a>
            <!-- <a href="index.php?view=documento&tid=<?php echo $team->id_carpeta;?>" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> -->
          </div>
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>

              <table id="example1" class="table table-bordered table-hover">
              <thead>
              <th>Nom du Document</th>
              <th>Code</th>
              <th>Étagère</th>
              <th>Module</th>
              <th>Actif</th>
              <th>Vérifier</th>
              <th><center>Action</center></th>

              </thead>
              <?php
              foreach($carpetas as $ver){
                $car = $ver->getDocumento();
                ?>
                <tr>
                <td><i class="fa fa-file-pdf-o"></i> <?php echo $car->nombre_documento; ?></td>
                <td><!-- <i class="fa fa-file-pdf-o"></i> --> <?php echo $car->codigo; ?></td>
                <td><!-- <i class="fa fa-file-pdf-o"></i> --> <?php echo $car->estante; ?></td>
                <td><!-- <i class="fa fa-file-pdf-o"></i>  --><?php echo $car->modulo; ?></td>
                <td style="width:10px;"><center><?php if($car->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                <td style="width:10px;"><a href="index.php?view=mostrardocumento&id_archivo=<?php echo $car->id_archivo;?>"<i class="fa fa-eye"></i> Voir</a></td>
                <td style="width:70px;">
                  <a href="index.php?view=configuraciondocumento&id_archivo=<?php echo $car->id_archivo;?>&tid=<?php echo $team->id_carpeta;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cloud'></i>Modifier</a>
                  <!-- <a href="index.php?action=eliminardocumento&id_archivo=<?php echo $car->id_archivo;?>&tid=<?php echo $team->id_carpeta;?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i> Supprimer</a> -->
                </td>
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>Aucun document n'est enregistré dans ce classeur</p>";
            }


            ?>
        </div>
      </div>
    </section>
    <?php endif;?>
    <?php if($u->encargado):?>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <?php
             if(isset($_SESSION["actualizar_datos"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Informations correctement mises à jour</p>
            <?php 
            unset($_SESSION["actualizar_datos"]);
            endif; ?>
          <h3 class="box-title"><b>Documents enregistrés</b></h3>
          <div class="box-tools pull-left">
            <a href="index.php?view=nuevodocumento&carpeta_id=<?php echo $_GET["id_carpeta"]; ?>&tid=<?php echo $team->id_carpeta;?>" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> <i class="fa fa-file-word-o"></i> Nouveau document</a>
            <!-- <a href="index.php?view=documento&tid=<?php echo $team->id_carpeta;?>" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a> -->
          </div>
        </div>
        <div class="box-body">
          <?php

            if(count($carpetas)>0){
              // si hay usuarios
              ?>

              <table id="example1" class="table table-bordered table-hover">
              <thead>
              <th>Numéro de dossier</th>
              <th>n° boite archive</th>
              <th>Objet</th>
              <th>Actif</th>
              <th>Vérifier</th>
              <th><center><i class="fa fa-hourglass-start"></i> Action</center></th>

              <!-- <th><center><i class="fa fa-list"></i> Detalle</center></th> -->
              </thead>
              <?php
              foreach($carpetas as $ver){
                $car = $ver->getDocumento();
                ?>
                <tr>
                <td><i class="fa fa-file-pdf-o"></i> <?php echo $car->nombre_documento; ?></td>
                <td><!-- <i class="fa fa-file-pdf-o"></i> --> <?php echo $car->folio; ?></td>
                <td><!-- <i class="fa fa-file-pdf-o"></i> --> <?php echo $car->responsable; ?></td>
                <td style="width:10px;"><center><?php if($car->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                <td style="width:10px;"><a href="index.php?view=mostrardocumento&id_archivo=<?php echo $car->id_archivo;?>"<i class="fa fa-eye"></i> Voir</a></td>
                <td style="width:80px;">
                  <a href="index.php?view=configuraciondocumento&id_archivo=<?php echo $car->id_archivo;?>&tid=<?php echo $team->id_carpeta;?>" class="btn btn-success btn-sm btn-flat"><i class='fa fa-cloud'></i>Modifier</a>
                </td>
                <!-- <td style="width:90px;"><center><a href="index.php?view=detalledocumento&id_archivo=<?php echo $car->id_archivo;?>&tid=<?php echo $team->id_carpeta;?>" class="btn btn-info btn-sm btn-flat"><i class='fa fa-list'></i> Detalle</a></center></td> -->
                </tr>
                <?php

              }

        echo "</table>";

            }else{
              echo "<p class='alert alert-danger'>Aucun document n'est enregistré dans ce classeur</p>";
            }


            ?>
        </div>
      </div>
    </section>
    <?php endif;?>
  </div>
  <?php else:?>
    <?php endif;?>

     <!-- Bootstrap Modal -->
     <div class="modal fade" id="confirmDeleteDocumentoModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteDocumentoModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="confirmDeleteDocumentoModalLabel">Confirmer suppression document</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                              Etes vous sur de supprimer ce document?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                  <button type="button" id="confirmDeletionDocumento" class="btn btn-danger">Oui</button>
                              </div>
                          </div>
                      </div>
                  </div>

        <script>
                  $(document).ready(function() {
                              $('.delete_document').click(function(e) {
                                  e.preventDefault();
                                  var idArchivo = $(this).data('id-archivo');
                                  var tid = $(this).data('tid');

                                  $('#confirmDeleteDocumentoModal').modal('show');
                  
                  $('#confirmDeletionDocumento').on('click', function() {
                      $.ajax({
                          url: 'index.php?action=eliminardocumento',
                          method: 'GET',
                          data: {id_archivo: idArchivo, tid: tid},
                          success: function(response) {
                              location.reload(); // Reload the page after successful deletion
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