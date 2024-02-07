<?php


session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");
include_once(DATA."baglanti.php");

define("SITE" ,$siteURL);

if(@$_SESSION["kullanici"]==""){
  echo "<script>location='http://localhost/yonetim-paneli/login.php';</script>";
  exit;
}

/*if(!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]) ){

}else{
  ?>
  <meta http-equiv="refresh" content="0; url=index.php/giris-yap">
  <?php
  exit(); 
}*/




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$sitebaslik?></title>
  <meta http-equiv="keywords" content="<?$siteanahtar?>">
  <meta http-equiv="description" content="<?$siteaciklama?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href ="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href ="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href= "plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href= "plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href= "dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href= "plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href= "plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href= "plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<?php

include_once(DATA."ust.php"); 
include_once(DATA."menu.php");

if($_GET && !empty($_GET["sayfa"]))
{   
  $sayfa=$_GET["sayfa"].".php";
  //echo "<script>alert('$sayfa');</script>";
  if(file_exists("include/$sayfa"))
  {
    include_once("include/$sayfa");
    
  }
 else
 {
   include_once(SAYFA."home.php");
 }
}
else{
  include_once(SAYFA."home.php");

}

include_once(DATA."footer.php");


?>

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
<!-- jQuery -->
<script src=" plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src=" plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src=" plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src=" plugins/jqvmap/jquery.vmap.min.js"></script>
<script src=" plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src=" plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src=" plugins/moment/moment.min.js"></script>
<script src=" plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src=" plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src=" plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- AdminLTE App -->
<script src=" dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" dist/js/demo.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

   
  })

  
  
  // DropzoneJS Demo Code End
</script>
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

   
  })
</script>



</body>
</html>
