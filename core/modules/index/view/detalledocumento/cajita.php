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
      <h1><i class="fa fa-file-pdf-o"></i> DÉTAIL DE <b style="color: blue;"><?php echo strtoupper($archivos->nombre_documento) ; ?></b></h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <center><iframe src="storage/documentos/<?php echo $archivos->otros; ?>"  width="70%" height="400px"></iframe> </center>
          <center><h2>Numero dossier: <b><?php echo strtoupper($archivos->nombre_documento) ; ?></b></h2></center>
          <h3>Description:</h3>
                    <p><?php echo $archivos->descripcion ; ?></p>
          <h3>Détails:</h3>
                    <p>Informations pertinentes du document avec des données mises à jour.</p>
                    <ul>
                    <li><b> Nombre pieces</b>: <?php echo $archivos->folio ; ?>.</li>
                    <li><b>Objet</b>: <?php echo $archivos->responsable ; ?>.</li>
                    <li><b>Mis à jour par</b>: <?php if($archivos->usuario_id!=null){echo $archivos->getUsuario()->nombre." ".$archivos->getUsuario()->apellido;}else{ echo ""; }  ?>.</li>
                    <li><b>Nom de fichier</b>: <?php echo $archivos->otros ; ?>.</li>
                    <li><b>Date d'enregistrement du document</b>: <?php echo $archivos->fecha ; ?>.</li>
                    </ul>
          <h3>Statut du document:</h3>
                    <p>État dans lequel se trouve le Document.</p>
                    <ul>
                    <li><b>Publique</b>: <?php if($archivos->publico):?><b style="color: blue;">Si</b><?php else: ?><b style="color: blue;">No</b><?php endif; ?></li>
                    <li><b>Actif</b>: <?php if($archivos->activo):?><b style="color: blue;">Si</b><?php else: ?><b style="color: red;">No</b><?php endif; ?></li>
                    <li><b>Perdu</b>: <?php if($archivos->perdido):?><b style="color: blue;">Si</b><?php else: ?><b style="color: red;">No</b><?php endif; ?></li>
                    </ul>
        </div>
      </div>
    </section>
  </div>
  <?php else:?>
    <?php endif;?>