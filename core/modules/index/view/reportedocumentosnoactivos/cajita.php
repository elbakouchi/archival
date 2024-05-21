
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa  fa-bar-chart"></i> 
        REPORTE DE DOCUMENTOS QUE NO ESTAN ACTIVOS
      </h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <!-- <div class="box-tools pull-left">
            <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <a href="index.php?view=reportelavanderia" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></a>
          </div> -->
          <!-- <div class="box-tools pull-right">
            <a href="#PDF" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <a href="index.php?view=imprimircochera" target="_blank" data-toggle="modal" class="btn btn-info btn-sm btn-flat"><i class="fa fa-print"></i> IMPRIMIR</a>
          </div> -->
        </div>
        <div class="box-body">
          <form>
            <input type="hidden" name="view" value="reportedocumentosnoactivos">
            <div class="row">
            <div class="col-md-3">

            <select name="id_archivo" class="form-control">
              <option value="">--  REPORTE POR TODOS --</option>
              <!-- <?php foreach($clients as $p):?>
              <option value="<?php echo $p->cliente_id;?>"><?php if($p->cliente_id!=null){echo $p->getCliente()->nombre." ".$p->getCliente()->apellido;}else{ echo ""; }  ?></option>
              <?php endforeach; ?> -->
            </select>

            </div>
            <div class="col-md-3">
            <input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
            </div>
            <div class="col-md-3">
            <input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
            </div>

            <div class="col-md-3">
            <input type="submit" class="btn btn-success btn-block" value="Envoyer">
            </div>

            </div>
            <!--
            <br>
            <div class="row">
            <div class="col-md-4">

            <select name="mesero_id" class="form-control">
              <option value="">--  MESEROS --</option>
              <?php foreach($meseros as $p):?>
              <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
              <?php endforeach; ?>
            </select>

            </div>

            <div class="col-md-4">

            <select name="operation_type_id" class="form-control">
              <option value="1">VENTA</option>
            </select>

            </div>

            </div>
            -->
            </form>
            <div class="row">
  
  <div class="col-md-12 table-responsive">
    <?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
<?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>
      <?php 
      $operations = array();

      if($_GET["id_archivo"]==""){
      $operations = DocumentoData::getAllByDateOfficiall($_GET["sd"],$_GET["ed"],2);
      }
      else{
      $operations = DocumentoData::getAllByDateBCOppp($_GET["id_archivo"],$_GET["sd"],$_GET["ed"],2);
      } 
       ?>
       <?php if(count($operations)>0):?>
        <?php $supertotal = 0; ?>
<table class="table table-bordered">
  <thead>

    <th>Documento</th>
    <th>Description</th>
    <th>Ubicacion</th>
    <th>n° boite archive</th>
    <th>Dirigido a</th>
    <th>Asistido</th>
    <th>Ver</th>
    <th>Fecha</th>
    <th>Detalle</th>
  </thead>
<?php foreach($operations as $operation):?>
  <tr>
    <td> <?php echo ($operation->nombre_documento); ?></td>
    <td> <?php echo ($operation->descripcion); ?></td>
    <td><?php echo $operation->ubicacion; ?></td>
    <td><?php echo $operation->folio; ?></td>
    <td><?php echo $operation->responsable; ?></td>
    <td><?php if($operation->usuario_id!=null){echo $operation->getUsuario()->nombre." ".$operation->getUsuario()->apellido;}else{ echo ""; }  ?></td>
    <td><a target="_blank" href="index.php?view=mostrardocumento&id_archivo=<?php echo $operation->id_archivo;?>"<i class="fa fa-eye"></i> Ver</a></td>
    <td><?php echo $operation->fecha; ?></td>
    <td width="70px"><a href="index.php?view=detalledocumento&id_archivo=<?php echo $operation->id_archivo;?>" class="btn btn-info btn-sm btn-flat"><i class='fa fa-list'></i> Detalle</a></td>
  </tr>
<?php
 endforeach; ?>

</table>

       <?php else:
       // si no hay operaciones
       ?>
<script>
  $("#wellcome").hide();
</script>
<div class="jumbotron">
<h2>Il n'y a pas d'opérations</h2>
<p>La plage de dates sélectionnée n'a donné aucun résultat d'opérations.</p>
</div>

       <?php endif; ?>
<?php else:?>
<script>
  $("#wellcome").hide();
</script>
<div class="jumbotron">
<h2>Dates Incorrectes</h2>
<p>Il est possible que vous n'ayez pas sélectionné une plage de dates, ou que la plage sélectionnée soit incorrecte.</p>

</div>
<?php endif;?>

    <?php endif; ?>
  </div>
</div>
        </div>
      </div>
    </section>
  </div>