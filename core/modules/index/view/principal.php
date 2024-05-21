<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Management archive | StratusWeb</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
  $organiz = OrganizacionData::getAll();
  if(count($organiz)>0){
  ?>
  <?php
        foreach($organiz as $organ){ ?>
  <title><?php echo $organ->texto1;?></title>
  <link rel="icon" type="icon" href="storage/sis/admin/<?php echo $organ->logo;?>">
  <?php
  }
  }else{}
  ?>  
  <link href="res/stylos/bootstrap.min.css" rel="stylesheet">
  <!-- font-awesome.min.css -->
  <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
  <link href="res/stylos/ionicons.min.css" rel="stylesheet">
  <link href="res/stylos/AdminLTE.min.css" rel="stylesheet">
  <link href="res/stylos/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="res/stylos/daterangepicker.css" rel="stylesheet">
  <link href="res/stylos/bootstrap-timepicker.min.css" rel="stylesheet">
  <link href="res/stylos/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="res/stylos/_all-skins.min.css" rel="stylesheet">
  <link href="res/stylos/css.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="res/font-awesome-4.6.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
<!-- este escript es para el mensaje cuando se realiza la venta -->
  <script src="res/alerta/jquery-2.1.4.min.js"></script>
    <!-- <script src="plugins/jquery/jquery-2.1.4.min.js"></script> -->
<!-- -------------------------------------------------------------------------------------------- -->
<!-- <script>
    function disabletext(e){
    return false
    }
    function reEnable(){
    return true
    }
    document.onselectstart=new Function ("return false")
    if (window.sidebar){
    document.onmousedown=disabletext
    document.onclick=reEnable
    }
    </script>
    <script language="JavaScript">
    function deshabilitar(){
    alert ("No Intente  Forzar ...!Atentamente Personal del Municipio!")
    return false
    }
    document.oncontextmenu=deshabilitar
    </script> -->
    <style type="text/css">
      .mt20{
        margin-top:20px;
      }
      .bold{
        font-weight:bold;
      }

     /* chart style*/
      #legend ul {
        list-style: none;
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
        border-radius: 5px;
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
      }

      #legend li span {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
        border-radius: 5px;
      }

     
    </style>
</head>
<!-- <body class="hold-transition skin-blue sidebar-mini"> -->
  <body class="<?php if(isset($_SESSION["admin_id"]) || isset($_SESSION["id_usuario"])):?> hold-transition skin-yellow sidebar-mini<?php else:?>login-page<?php endif; ?>">
<?php 
$u=null;
if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):
$u = UserData::getById($_SESSION["admin_id"]);
$org = OrganizacionData::getAll();
?>
<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
            <?php 
            $u=null;
            if($_SESSION["admin_id"]!=""){
              $u = UserData::getById($_SESSION["admin_id"]);
              $url = "storage/personal/admin/".$u->imagen;
              $org = OrganizacionData::getAll();
              $user = $u->nombre." ".$u->apellido;
              }?>   
              <?php

  $timezone = 'America/Bogota';
  date_default_timezone_set($timezone);

  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
<?php $fech_actual=date("y-m-d H:i:s a"); ?>
<?php
        foreach($org as $orgs)
          $url = "storage/sis/admin/$orgs->logo";?>
  <div class="wrapper">
    <header class="main-header">
      <a href="index.php?view=home" class="logo">
        <span class="logo-mini">PH</span>
        <span class="logo-lg" style="font-size: 14px;">PROVINCE D'AL HOUZ</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only"> Toggle navigation></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <!-- <p class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><?php echo $u->nombre." ".$u->apellido; ?></span> 
              </p> -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="storage/personal/admin/<?php echo $u->imagen; ?>"class="user-image" alt="User Image">
                 <span class="hidden-xs"><?php echo $u->nombre." ".$u->apellido; ?></span> 
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="storage/personal/admin/<?php echo $u->imagen; ?>"class="img-circle" alt="User Image">
                    <p>
                       <small>Membré depuis <?php echo $u->fecha; ?></small>
                    </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <?php if($u->admin):?>
                      <a href="#perfil" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Profil</a>
                    <?php endif;?>
                    <?php if($u->jefe):?>
                      <a href="index.php?view=perfil" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Profil</a>
                    <?php endif;?>
                    <?php if($u->encargado):?>
                      <a href="index.php?view=perfil" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Profil</a>
                    <?php endif;?>
                  </div>
                  <div class="pull-right">
                    <a href="salir.php" class="btn btn-default btn-flat">Fermer la session</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php if( $orgs->imagen!="" && file_exists($url)):?>
            <img src="<?php echo $url; ?>"class="img-circle" alt="User Image">                        <?php endif; ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $u->nombre; ?></p> 
          <!-- <p><?php echo $orgs->texto1; ?></p> -->
            <a><i class="fa fa-circle text-success"> En ligne</i></a>
          </div>
        </div>
        <?php 
      $u=null;
      if(Session::getUID()!=""):
        $u = UserData::getById(Session::getUID());
      ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><i class="fa fa-windows"></i> MENU DE NAVIGATION</li>
          <li>
            <a href="index.php?view=home">
              <i class="fa fa-home"></i> <span>ACCUEIL</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">Principale</small>
              </span>
            </a>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Exercice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=periodos"><i class="fa fa-arrows-h"></i>Période</a></li>
           </ul>
        </li>
        <!-- <?php if($u->jefe):?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>AREAS / OFICINAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=area&id_periodo=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-laptop"></i> Areas / Oficinas</a></li>
            <li><a href="index.php?view=jefes"><i class="fa fa-graduation-cap"></i> Jefes del Area</a></li>
          </ul>
        </li>
        <?php endif; ?> --> 
          <?php if(isset($_SESSION["selected_id"])):?>
         <?php if($u->admin):?>
     <!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>AREAS / OFICINAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=area&id_periodo=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-laptop"></i> Areas / Oficinas</a></li>
           <li><a href="index.php?view=jefes"><i class="fa fa-graduation-cap"></i> Jefes del Area</a></li>
          </ul>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>UTILISATEURS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=encargados"><i class="fa fa-user"></i> Gestionnaires</a></li>
            <li><a href="index.php?view=administrador"><i class="fa fa-user-secret"></i> Administrateur</a></li>
            <!-- <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li> -->
          </ul>
        </li>
        <li class="header"><i class="fa fa-line-chart"></i> RAPPORTS</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span>RAPPORTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=reportedocumento"><i class="fa fa-bar-chart-o"></i> Documents</a></li>
            <li><a href="index.php?view=reportedocumentos"><i class="fa fa-bar-chart-o"></i> Documents actifs</a></li>
            <li><a href="index.php?view=reportedocumentosnoactivos"><i class="fa fa-bar-chart-o"></i> Documents non actifs</a></li>
            <li><a href="index.php?view=reportedocumentoperdido"><i class="fa fa-bar-chart-o"></i> Documents perdus</a></li>
            <!-- <li><a href="index.php?view=reportejefe"><i class="fa fa-bar-chart-o"></i> Reporte de Jefe</a></li> -->
            <li><a href="index.php?view=reporteencargado"><i class="fa fa-bar-chart-o"></i> Rapport du gestionnaire</a></li>
            <li><a href="index.php?view=reporteadministrador"><i class="fa fa-bar-chart-o"></i> Rapport de l'administrateur</a></li>
          </ul>
        </li>
        <li class="header">PARAMÈTRE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-institution"></i> <span>Etablissement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=institucion"><i class="fa fa-gear"></i> Configuration générale</a></li>
            <li><a href="index.php?view=perfil"><i class="fa fa-street-view"></i>Profil personnel</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <!-- JEFE -->
        <?php if($u->jefe):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>AREAS / OFICINAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=area&id_periodo=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-laptop"></i> Areas / Oficinas</a></li>
            <li><a href="index.php?view=jefes"><i class="fa fa-graduation-cap"></i> Jefes del Area</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if($u->encargado):?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>AREAS / OFICINAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=area&id_periodo=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-laptop"></i> Areas / Oficinas</a></li>
            <!-- <li><a href="index.php?view=jefes"><i class="fa fa-graduation-cap"></i> Jefes del Area</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>USUARIOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=encargados"><i class="fa fa-user"></i> Encargados</a></li>
            <li><a href="index.php?view=administrador"><i class="fa fa-user-secret"></i> Administrador</a></li>
            <!-- <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li> -->
          </ul>
        <!-- </li>
        <li class="header"><i class="fa fa-line-chart"></i> REPORTES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span>REPORTE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=reportedocumento"><i class="fa fa-bar-chart-o"></i> Documentos</a></li>
            <li><a href="index.php?view=reportedocumentos"><i class="fa fa-bar-chart-o"></i> Documentos Activos</a></li>
            <li><a href="index.php?view=reportedocumentosnoactivos"><i class="fa fa-bar-chart-o"></i> Documentos No Activos</a></li>
            <li><a href="index.php?view=reportedocumentoperdido"><i class="fa fa-bar-chart-o"></i> Documentos Perdidos</a></li>
            <li><a href="index.php?view=reportejefe"><i class="fa fa-bar-chart-o"></i> Reporte de Jefe</a></li>
            <li><a href="index.php?view=reporteencargado"><i class="fa fa-bar-chart-o"></i> Reporte de Encargado</a></li>
            <li><a href="index.php?view=reporteadministrador"><i class="fa fa-bar-chart-o"></i> Reporte de Administrador</a></li>
          </ul>
        </li> -->
          <?php endif; ?>
        <!-- FINAL -->
               <?php endif; ?> 
        <?php endif;?>
      <!--   <li>
            <a href="index.php?view=ayuda">
              <i class="fa fa-question-circle fa-1x" ></i> <span>AIDE</span>
              <span class="pull-right-container">-->
                <!-- <small class="label pull-right bg-green">Principal</small> -->
             <!--  </span>
            </a>
          </li>-->
 
      </section>
    </aside>
    <?php else:?>
        <?php endif; ?>
    <?php else:?>
    <?php endif;?>
    <div>

                <?php 
                if(isset($_SESSION["admin_id"])){
                  View::load("index");
                }else{
                  Action::execute("login",array());
                }?>
    </div>
    <?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    $user = $u->nombre." ".$u->apellido;
    }?> 
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version 1.2</b>
      </div>
      <strong><b><?php echo $orgs->footer1; ?></b>  &copy; <b>Développé par <B>StartusWeb</B><?php echo $orgs->footer2; ?></b>  <a href="https://www.stratusweb.info/" target="_blank"> <b><?php echo $orgs->footer3; ?></b></a></strong>
    </footer>
    <?php else:?>
    <?php endif;?>
  </div>
<script src="res/crip/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="res/crip/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="res/crip/jquery.dataTables.min.js"></script>
<script src="res/crip/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="res/crip/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="res/crip/raphael.min.js"></script>
<script src="res/crip/morris.min.js"></script>
<!-- ChartJS -->
<script src="res/crip/Chart.js"></script>
<!-- Sparkline -->
<script src="res/crip/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="res/crip/jquery-jvectormap-1.2.2.min.js"></script>
<script src="res/crip/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="res/crip/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="res/crip/moment.min.js"></script>
<script src="res/crip/daterangepicker.js"></script>
<!-- datepicker -->
<script src="res/crip/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="res/crip/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="res/crip/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="res/crip/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="res/crip/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="res/crip/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="res/crip/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="res/crip/demo.js"></script>
<script>
                //jQuery.noConflict();

                $(document).ready(function(){
                  $("#searchp").on("submit",function(e){
                    e.preventDefault();
                    
                    $.get("./?action=searchpension",$("#searchp").serialize(),function(data){
                      $("#show_search_results").html(data);
                    });
                    $("#product_code").val("");

                  });
                  });

                $(document).ready(function(){
                    $("#product_code").keydown(function(e){
                        if(e.which==17 || e.which==74){
                            e.preventDefault();
                        }else{
                            console.log(e.which);
                        }
                    })
                });
                </script>
<script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
              "sProcessing":    "Traitement en cours...",
              "sLengthMenu":    "Afficher _MENU_ enregistrements",
              "sZeroRecords":   "Aucun résultat trouvé",
              "sEmptyTable":    "Aucune donnée disponible dans ce tableau",
              "sInfo":          "Affichage des enregistrements de _START_ à _END_ sur un total de _TOTAL_ enregistrements",
              "sInfoEmpty":     "Affichage des enregistrements de 0 à 0 sur un total de 0 enregistrements",
              "sInfoFiltered":  "(filtré à partir d'un total de _MAX_ enregistrements)",
              "sInfoPostFix":   "",
              "sSearch":        "Rechercher :",
              "sUrl":           "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Chargement en cours...",
              "oPaginate": {
                  "sFirst":    "Premier",
                  "sLast":    "Dernier",
                  "sNext":    "Suivant",
                  "sPrevious": "Précédent"
              },
              "oAria": {
                  "sSortAscending":  ": Activer pour trier la colonne par ordre croissant",
                  "sSortDescending": ": Activer pour trier la colonne par ordre décroissant"
              }
          }
        });
      });
    </script>
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true,
      "language": idioma_french
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,

      "language": idioma_french
    })
  })
  var idioma_french = {
    "sProcessing":     "Traitement en cours...",
    "sLengthMenu":     "Afficher _MENU_ enregistrements",
    "sZeroRecords":    "Aucun résultat trouvé",
    "sEmptyTable":     "Aucune donnée disponible dans ce tableau",
    "sInfo":           "Affichage des enregistrements de _START_ à _END_ sur un total de _TOTAL_ enregistrements",
    "sInfoEmpty":      "Affichage des enregistrements de 0 à 0 sur un total de 0 enregistrements",
    "sInfoFiltered":   "(filtré à partir d'un total de _MAX_ enregistrements)",
    "sInfoPostFix":    "",
    "sSearch":         "Rechercher :",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Chargement en cours...",
    "oPaginate": {
        "sFirst":    "Premier",
        "sLast":     "Dernier",
        "sNext":     "Suivant",
        "sPrevious": "Précédent"
    },
    "oAria": {
        "sSortAscending":  ": Activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": Activer pour trier la colonne par ordre décroissant"
    }
};

  var idioma_español= {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Chercher:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
</script>
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>

<?php
  $timezone = 'America/Bogota';
  date_default_timezone_set($timezone);
?>
</body>
</html>
<div class="modal fade bs-example-modal-lg" id="javier" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><label><marquee> DATOS DEL ADMINISTRADOR</marquee></label></h4>
         </div>
        <div class="modal-body">
          <div class="contendor_kn">
            <div class="panel panel-default">
              <div class="panel-body">
                <!-- <div id="show_search_results"></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade bs-example-modal-lg" id="perfil" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"><label><marquee> MON PROFIL</marquee></label></h4>
      </div>

        <div class="modal-body">
          <div class="contendor_kn">
            <div class="panel panel-default">
              <div class="panel-body">
                <form method="POST" id="update-form-administrador">
                <div class="col-md-6">
                  <input type="text" id="personal_id" name="personal_id" hidden value="<?php echo $u->name; ?>" >
                  <label class="col-sm-4 control-label">Nom </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="nombres_personal" id="nombres_personal" placeholder="Entrez les prénoms" maxlength="" value="<?php echo $u->nombre; ?>">
                      <br>
                  </div>
                  <label class="col-sm-4 control-label">Noms de famille</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="apePate_personal" id="apePate_personal" placeholder="Entrez le nom de famille paternel" maxlength="" value="<?php echo $u->apellido; ?>">
                      <br>
                  </div>
                  <label class="col-sm-4 control-label">Nom de famille maternel </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="apeMate_personal" id="apeMate_personal" placeholder="Entrez le nom de famille maternel" maxlength="">
                      <br>
                  </div>
              </div>
              <div class="col-md-6">
              <div class="col-sm-12" style="text-align:center">
                  <label class="control-label">Image</label><br>
                  <div id="txtimagen2">
                      <img src="storage/personal/admin/<?php echo $u->imagen; ?>" class="user-image img-circle" alt="User Image">
                  </div>                   
              </div>                 
          </div>
          <div class="col-md-12">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-4">
                  <input type="email" class="form-control" style="width: 94%" name="email_personal" id="email_personal" placeholder="Entrez l'email" maxlength="100" value="<?php echo $u->email; ?>">
                  <br>
              </div> 
              <label class="col-sm-2 control-label">Téléphone</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control" onkeypress="return soloNumeros(event)" name="telefono_personal" id="telefono_personal" placeholder="Entrez le numéro de téléphone" maxlength="9" value="910122259">
                  <br>
              </div> 
              <label class="col-sm-2 control-label">GSM</label>
              <div class="col-sm-4">
                  <input type="text" style="width: 94%" class="form-control" name="movil_personal" id="movil_personal" onkeypress="return soloNumeros(event)" placeholder="Entrez le numéro de portable" maxlength="9" value="910122259">
                  <br>
              </div> 
              <label class="col-sm-2 control-label">Adresse</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="direccion_personal" id="direccion_personal" placeholder="Entrez l'adresse" maxlength="200" value="av. peru">
                  <br>
              </div> 
              <label class="col-sm-2 control-label">Date de création</label>
              <div class="col-sm-4">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" style="width: 94%; padding: 0px 12px;" id="fecha" name="fecha" class="form-control" value="<?php echo $u->fecha; ?>">
                  </div>
              </div>
              <label class="col-sm-2 control-label">DNI</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control" onkeypress="return soloNumeros(event)" name="dni_personal" id="dni_personal" placeholder="Entrez le DNI" maxlength="13" value="70933255">
                  <br>
              </div>
              <label class="col-sm-2 control-label">Administrateur</label>
              <div class="col-sm-4">
                  <label>
                      <input type="checkbox" name="is_admin" <?php if($u->admin){ echo "checked"; } ?>> 
                  </label>
                  <br>
              </div> 
              <label class="col-sm-2 control-label">Actif</label>
              <div class="col-sm-4">
                  <label>
                      <input type="checkbox" name="is_active" <?php if($u->activo){ echo "checked"; } ?>> 
                  </label>
                  <br>
              </div>
          </div>

                  <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;" >
                    <br>
                    <div class="col-md-4">
                    </div>
                    <!-- <div class="col-md-4" >
                       <button class="btn btn-success"  style="width: 100%" ><span class="glyphicon glyphicon-floppy-saved" ></span>&nbsp;<b>Modificar Datos</b></button><br>
                    </div> -->
                    <div class="col-md-4">
                    </div>
                  </div>
                </form> 
              </div>         
            </div>
          </div>  
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-close"></i><strong> Fermer</strong></button>
        </div> 
    </div>
  </div> 
</div>