
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
            <input type="submit" class="btn btn-success btn-block" value="Procesar">
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
    <th>Descripcion</th>
    <th>Ubicacion</th>
    <th>Folio</th>
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
  <h2>No hay operaciones</h2>
  <p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
</div>

       <?php endif; ?>
<?php else:?>
<script>
  $("#wellcome").hide();
</script>
<div class="jumbotron">
  <h2>Fecha Incorrectas</h2>
  <p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
</div>
<?php endif;?>

    <?php endif; ?>
  </div>
</div>
        </div>
      </div>
    </section>
  </div>