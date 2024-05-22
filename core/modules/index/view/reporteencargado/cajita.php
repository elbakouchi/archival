
<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa  fa-bar-chart"></i> 
        RAPPORT DU GESTIONNAIRE
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
            <input type="hidden" name="view" value="reporteencargado">
            <div class="row">
            
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
      $operations = Userdata::getAllByEncargado($_GET["sd"],$_GET["ed"],2);
      }
      else{
      $operations = Userdata::getAllByDateEncargado($_GET["id_usuario"],$_GET["sd"],$_GET["ed"],2);
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
    <th>Fecha</th>
    <th>Detalle</th>
  </thead>
<?php foreach($operations as $operation):?>
  <tr>
    <td> <?php echo ($operation->nombre); ?></td>
    <td> <?php echo ($operation->apellido); ?></td>
    <td> <?php echo ($operation->dni); ?></td>
    <td><?php echo $operation->telefono; ?></td>
    <td><?php echo $operation->email; ?></td>
    <td><center><?php if($operation->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center></td>
    <td><?php echo $operation->fecha; ?></td>
    <td width="70px"><a href="index.php?view=configuracioncarpetaarea&id_carpeta=<?php echo $car->id_carpeta;?>&tid=<?php echo $team->id_area_oficina;?>" class="btn btn-info btn-sm btn-flat"><i class='fa fa-list'></i> Detalle</a></td>
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


  <script>
    window.onload = function() {
      document.getElementById('id_periodo').addEventListener('change', function() {
      var selectedPeriodId = this.value;
      console.log(selectedPeriodId);
      // Assuming you have a way to fetch categories based on the selected period ID
      // This could involve AJAX call to a server-side script that returns the categories for the selected period
      fetchCategories(selectedPeriodId);
    });
    document.getElementById('category').addEventListener('change', getCategoryName);
    function getCategoryName(event) {
        // Log the selected option's text to the console
        console.log(event.target.options[event.target.selectedIndex].text);

        // Get the hidden input element by ID
        var selectedElement = document.getElementById("categoryName");

        // Set the hidden input's value to the selected option's text
        selectedElement.value = event.target.options[event.target.selectedIndex].text;
    }

    //document.getElementById('category').addEventListener('change', function() {
     //   var selectedCategoryName = this.text;
      //  console.log(selectedCategoryName);
        // Assuming you have a way to fetch categories based on the selected period ID
        // This could involve AJAX call to a server-side script that returns the categories for the selected period
        //var selectedElement = document.getElementById("categoryName");
        //selectedElement.value = selectedCategoryName;
    //});

    function fetchCategories(periodId) {
        // Example using Fetch API to get categories for the selected period
        // Replace '/path/to/script' with the actual path to your server-side script
        fetch('/fetch_categories.php?period_id=' + periodId)
          .then(response => response.json())
          .then(data => {
                var selectElement = document.getElementById('category');
                selectElement.innerHTML = ''; // Clear existing options
                // Populate the select element with new options
                var emptyOption = document.createElement('option');
                emptyOption.text = "-- Choisir une catégorie --";
                emptyOption.value = "0";
                selectElement.add(emptyOption);
                data.forEach(category => {
                    var option = document.createElement('option');
                    option.value = category.id_carpeta;
                    option.text = category.nombre;
                    selectElement.add(option);
                });
            })
       .catch(error => console.error('Error fetching categories:', error));
    }}
  </script>