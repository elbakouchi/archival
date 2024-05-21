<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
        $u = UserData::getById($_SESSION["admin_id"]);
        // $user = $u->nombre." ".$u->apellido;
    }?>
    <?php
    $cliente = UserData::getById($_GET["id_usuario"]);
    $url = "storage/personal/admin/".$cliente->imagen;
    ?>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-pied-piper-alt"></i>
                Modifier PRIVILÈGES:
                <small><?php echo $cliente->nombre." ".$cliente->apellido; ?></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <?php
                    // print_r($_SESSION);
                    if(isset($_SESSION["actualizar_datos"])):?>
                        <p class="alert alert-info"><i class="fa fa-check"></i> Informations mises à jour avec succès</p>
                        <?php 
                        unset($_SESSION["actualizar_datos"]);
                    endif; ?>
                    <h3 class="box-title"><b>M./Mme:</b></h3>
                    <small style="color: blue;"><?php echo $u->nombre." ".$u->apellido; ?>,</small>
                    <small style="color: red;">Vous êtes le seul responsable de cette modification</small>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Réduire">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Supprimer">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!-- Début de la phase DEUX -->
                    <div class="col-md-7">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-lock"></i> Sécurité</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="index.php?action=acceso1">
                                    <div class="form-group has-success">
                                        <label for="inputEmail1" class="col-lg-4 control-label"><i class="fa fa-check"></i> Utilisateur</label>
                                        <div class="col-lg-8">
                                            <input type="usuario" class="form-control" id="usuario" name="usuario" placeholder="Mot de passe actuel" value="<?php echo $cliente->usuario;?>">
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="inputEmail1" class="col-lg-4 control-label"><i class="fa fa-check"></i> Mot de passe aléatoire</label>
                                        <div class="col-lg-8">
                                            <input type="usuario" class="form-control" value="<?php $Random_code=rand(); echo $Random_code; ?> : Sélectionner et Glisser ou DNI <?php echo $cliente->dni; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="inputEmail1" class="col-lg-4 control-label"><i class="fa fa-check"></i> Nouveau mot de passe</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Entrez le nouveau mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="inputEmail1" class="col-lg-4 control-label"><i class="fa fa-check"></i> Mot de passe actuel</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" value="<?php echo $cliente->password; ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-lg-offset-4 col-lg-8">
                                            <input type="hidden" name="id_usuario" value="<?php echo $cliente->id_usuario;?>">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-lock fa-spin fa-1x fa-fw"></i> Changer le mot de passe</button>
                                            <button type="reset" class="btn btn-info"><i class="fa fa-lock fa-spin fa-1x fa-eraser"></i> Effacer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de la phase DEUX -->
                    
                    <!-- Début de la phase QUATRE -->
                    <div class="col-md-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user-secret"></i> Privilèges</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="index.php?action=privilegio1" role="form">
                                    <div class="form-group has-warning">
                                        <label for="inputEmail1" class="col-lg-3 control-label"><i class="fa fa-times-circle-o"></i> Actif</label>
                                        <div class="col-lg-1">
                                            <td style="width:10px;"><center><?php if($cliente->activo):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                                        </div>
                                        <label for="inputEmail1" class="col-lg-4 control-label"><i class="fa fa-times-circle-o"></i> Administrateur</label>
                                        <div class="col-lg-1">
                                            <td style="width:10px;"><center><?php if($cliente->admin):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                                        </div>
                                    </div>
                                    <div class="form-group has-warning">
                                        <label for="inputEmail1" class="col-lg-3 control-label"><i class="fa fa-times-circle-o"></i> Public</label>
                                        <div class="col-lg-1">
                                            <td style="width:10px;"><center><?php if($cliente->publico):?><i class="fa fa-check" style="color: blue;"></i><?php else: ?><i class="fa fa-remove" style="color: red;"></i><?php endif; ?></center> </td>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="publico" id="publico" <?php if($cliente->publico){ echo "checked";} ?>> Public
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="admin" id="admin" <?php if($cliente->admin){ echo "checked";} ?>> Admin
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="activo" id="activo" <?php if($cliente->activo){ echo "checked";} ?>> Actif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-12">
                                            <input type="hidden" name="id_usuario" value="<?php echo $_GET["id_usuario"];?>">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Modifier les données</button>
                                            <button type="reset" class="btn btn-info"><i class="fa fa-eraser fa-spin fa-1x fa-fw"></i> Effacer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de la phase QUATRE -->
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php else:?>
<?php endif;?>
