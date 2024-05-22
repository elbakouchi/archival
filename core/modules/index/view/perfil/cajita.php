<?php 
  $configuracion=null;
  if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):

    // $url = "storage/products/$product->image";
   
  $configuracion = UserData::getById($_SESSION["admin_id"]);
  $url = "storage/personal/admin/".$configuracion->imagen;
  // $url = "storage/data/".$file->user_id."/".$file->filename;
  ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class='fa fa-users'></i>
     Modifier les Données du Profil
     <!-- <marquee> Liste des Médicaments</marquee> -->
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
<!--             <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Nouveau</a>
            </div> -->
          <div class="box-body">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-picture-o"></i> Profil</h3>
                </div>
                <div class="panel-body">
                  <form role="form" method="post" action="./?action=perfil1"  enctype="multipart/form-data">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                          <?php if( $configuracion->imagen!="" && file_exists($url)):?>
                              <a class="fancybox" href="<?php echo $url; ?>" target="_blank" data-fancybox-group="gallery" title="Smartphone Samsung Galaxy"><img class="fancyResponsive" src="<?php echo $url; ?>" alt="" width="120" height="150" /></a>
                              <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="form-group">
                          <!-- <label for="inputEmail1" class="col-lg-4 control-label"></label> -->
                          <div class="col-lg-12">
                            <input type="file" class="form-control" id="imagen" name="imagen">
                          </div>
                      </div>
                    <div class="form-group">
                      <div class="col-lg-offset-1 col-lg-4">
                        <button type="submit" class="btn btn-info ">Charger l'Image</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-user-o"></i> Données Personnelles</h3>
                </div>
                <div class="panel-body">
          <form class="form-horizontal" method="post" action="index.php?action=perfil2" role="form">
            <div class="form-group">
                  <label for="inputEmail1" class="col-lg-4 control-label">Nom</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Entrez votre Nom" value="<?php echo $configuracion->nombre;?>" onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-4 control-label">Prénom</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Entrez votre Prénom" value="<?php echo $configuracion->apellido;?>" onkeypress="return sololetras(event)" onpaste="return false" onKeyUP="this.value=this.value.toUpperCase();">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-4 control-label">Dni</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control"  id="dni" name="dni" placeholder="Entrez votre Numéro de Dni" value="<?php echo $configuracion->dni;?>" onkeypress="return solonumeros(event);"  onpaste="return false" maxlength="8">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-4 control-label">Téléphone</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Entrez votre Numéro de Téléphone" value="<?php echo $configuracion->telefono;?>" onkeypress="return solonumeros(event);" pattern=".{9,99}" onpaste="return false" maxlength="12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-4 control-label">Email</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre Email" value="<?php echo $configuracion->email;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-4 control-label">Sexe</label>
                  <div class="col-lg-8">
                    <select name="sexo" id="sexo"  class="form-control">
                      <option value="<?php echo $configuracion->sexo;?>"><?php echo $configuracion->sexo;?></option>
                      <option value="Homme">Homme</option>
                      <option value="Femme">Femme</option>
                      <option value="Je préfère ne pas dire">Je préfère ne pas dire</option>
                    </select>
                  </div>
                </div>
            <div class="form-group">
              <div class="col-lg-offset-4 col-lg-8">
                <button type="submit" class="btn btn-success "><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>Modifier</button>
              </div>
            </div>
          </form>
        </div>
      </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>   
</div>

        <?php endif;?>