<div class="content-wrapper">
    <section class="content-header">
      <h1> <i class="fa  fa-bar-chart"></i> 
      RAPPORT DE TOUS LES DOCUMENTS EXISTANTS
      </h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
                <a href="<?php echo 'api/export/documents.php?category='.$_GET['category'].'&sd='.$_GET["sd"].'&ed='.$_GET["ed"]; ?>" target="_blank" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-file-excel-o"></i> Exporter par date et catégorie</a>
                <a href="<?php echo 'api/export/documents.php?sd='.$_GET["sd"].'&ed='.$_GET["ed"]; ?>" target="_blank" class="btn btn-info btn-sm btn-flat"><i class="fa fa-file-excel-o"></i> Exporter par date</a>
                <!--a href="<#?php echo '/export/documents.php' ?#>" target="_blank" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-file-excel-o"></i> Exporter tout</a-->
            </div>
        </div>
        <hr/>
        <div class="box-body">
          <form>
            <input type="hidden" name="view" value="reportedocumento">
            <div class="row">
              <div class="col-md-2">
                <select name="id_periodo" id="id_periodo" class="form-control">
                  <option value="0">--  Périodes --</option>
                  <?php $periodos = PeriodoData::getAll(); ?>
                  <?php if(count($periodos)>0) :?>
                    <?php  foreach($periodos as $periodo): ?>
                      <option value="<?php echo $periodo->id_periodo;?>" <?php if(isset($_GET['id_periodo']) && $_GET['id_periodo'] == $periodo->id_periodo) echo 'selected=true';?> ><?php echo $periodo->nombre; ?></option>
                    <?php endforeach; ?>
                    <?php endif;?>
                  </select>
              </div>  
              <div class="col-md-2">
              <select name="category" id="category" class="form-control">
                <?php if(!isset($_GET["category"])):?>
                <option value="">--  Choisir une catégorie --</option>
                <?php else:?>
                <?php echo '<option value="' . $_GET["category"] .'">' . $_GET["categoryName"] . '</option>' ; ?>
                <?php endif;?>
              </select>
              <input type="hidden" id="categoryName" name="categoryName" value="<?php if (isset($_GET['categoryName'])) echo $_GET["categoryName"];?>"/>
            </div>
           
            <div class="col-md-2">
              <input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
            </div>
            <div class="col-md-2">
              <input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
            </div>

            <div class="col-md-2">
            <input type="submit" class="btn btn-success btn-block" value="Envoyer">
            </div>

            </div>
            </form>
            <div class="row">
  <div class="col-md-12 table-responsive">
    <?php if(isset($_GET["sd"]) && isset($_GET["ed"] && !empty($_GET["sd"]) && !empty($_GET["ed"]) ):?>
      <?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>
      <?php 
          $operations = array();
          if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category']!="0" &&  $_GET['category']!="undefined"){
            $operations = DocumentoData::getAllByDateAndCarpeta($_GET['category'],$_GET["sd"],$_GET["ed"],2);
          }
          elseif( !isset($_GET["id_archivo"]) || $_GET["id_archivo"]==""){
            $operations = DocumentoData::getAllByDateOfficialll($_GET["sd"],$_GET["ed"],2);
          }
          else{
            $operations = DocumentoData::getAllByDateOfficialBP($_GET["id_archivo"],$_GET["sd"],$_GET["ed"],2);
          } 
       ?>
       <?php if(count($operations)>0):?>
    <?php $supertotal = 0; ?>
<table class="table table-bordered">
  <thead>

    <!-- <th>Code</th> -->
    <th>Document</th>
    <th>Description</th>
    <th>Emplacement</th>
    <th>n° boite archive</th>
    <th>Objet</th>
    <th>Assisté</th>
    <th>Voir</th>
    <th>État</th>
    <th>Date</th>
    <th>Détail</th>

  </thead>
<?php foreach($operations as $operation):?>
  <tr>
    <!-- <td> <#?php echo ($operation->codigo); ?#></td> -->
    <td> <?php echo ($operation->nombre_documento); ?></td>
    <td> <?php echo ($operation->descripcion); ?></td>
    <td><?php echo $operation->ubicacion; ?></td>
    <td><?php echo $operation->folio; ?></td>
    <td><?php echo $operation->responsable; ?></td>
    <td><?php if($operation->usuario_id!=null){echo $operation->getUsuario()->nombre." ".$operation->getUsuario()->apellido;}else{ echo ""; }  ?></td>
    <td><a target="_blank" href="index.php?view=mostrardocumento&id_archivo=<?php echo $operation->id_archivo;?>"<i class="fa fa-eye"></i> Voir</a></td>
    <!-- visualizardocumento -->
    <td><center><?php if($operation->activo):?><b style="color: blue;">Actif</b><?php else: ?><?php if($operation->perdido):?><b style="color: red;">Perdu</b><?php else: ?><b style="color: orange;">Inactif</b><?php endif; ?><?php endif; ?></center></td>
    <!-- <td><center><?php if($operation->activo=1):?><b style="color: blue;">Actif</b><?php else: ?>h<?php if($operation->perdido=1):?><b style="color: red;">Perdu</b><?php else: ?>b<?php if($operation->publico=1):?><b style="color: orange;">Public</b><?php else: ?>d<?php endif; ?><?php endif; ?><?php endif; ?></center></td> -->
    <td><?php echo $operation->fecha; ?></td>
    <td width="70px"><a href="index.php?view=detalledocumento&id_archivo=<?php echo $operation->id_archivo;?>" class="btn btn-info btn-sm btn-flat"><i class='fa fa-list'></i> Détail</a></td>
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

    function fetchCategories(periodId) {
        fetch('api/category/get.php?period_id=' + periodId)
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