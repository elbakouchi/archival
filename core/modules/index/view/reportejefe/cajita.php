
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa  fa-bar-chart"></i> 
        REPORTE JEFES DEL AREA
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Début</a></li>
        <li><a href="index.php?view=administrador">Administrador</a></li>
        <li class="active">Actif</li>
      </ol>
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
            <input type="hidden" name="view" value="reportejefe">
            <div class="row">
            <div class="col-md-3">

            <select name="id_usuario" class="form-control">
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

      if($_GET["id_usuario"]==""){
      $operations = Userdata::getAllByJefe($_GET["sd"],$_GET["ed"],2);
      }
      else{
      $operations = Userdata::getAllByDateJefe($_GET["id_usuario"],$_GET["sd"],$_GET["ed"],2);
      } 
       ?>
       <?php if(count($operations)>0):?>
        <?php $supertotal = 0; ?>
<table class="table table-bordered">
  <thead>

    <th>Nom</th>
    <th>Apellido</th>
    <th>Dni</th>
    <th>Télephone</th>
    <th>Email</th>
    <th>Estado</th>
    <th>Area\Oficina</th>
    <th>Fecha</th>
  </thead>
<?php foreach($operations as $operation):?>
  <tr>
    <td> <?php echo ($operation->nombre); ?></td>
    <td> <?php echo ($operation->apellido); ?></td>
    <td> <?php echo ($operation->dni); ?></td>
    <td><?php echo $operation->telefono; ?></td>
    <td><?php echo $operation->email; ?></td>
    <td><center><?php if($operation->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center></td>
    <td><?php if($operation->area_oficina_id!=null){echo $operation->getAreaOficina()->nombre;}else{ echo ""; }  ?></td>
    <td><?php echo $operation->fecha; ?></td>
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
  <p>La plage de dates sélectionnée n'a fourni aucun résultat.</p>
</div>

       <?php endif; ?>
<?php else:?>
<script>
  $("#wellcome").hide();
</script>
<div class="jumbotron">
  <h2>Date incorrecte</h2>
  <p>Il se peut que je n'aie pas sélectionné de plage de dates ou que la plage sélectionnée soit incorrecte..</p>
</div>
<?php endif;?>

    <?php endif; ?>
  </div>
</div>
        </div>
      </div>
    </section>
  </div>