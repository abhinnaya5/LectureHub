<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"application/config/koneksi.php";
$module="module";
$module=$_GET["module"];
$id_masuk=$_SESSION['id_masuk'];
if($id_masuk==""){echo "<script>location.href='index.php';</script>";}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DASHBOARD ADMINISTRATOR LECTUREHUB</title>
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<script src="https://cdn.tiny.cloud/1/g8vgw4v9t5y9uji5onasd5i127exvpe5p9wtoj1zs3jnl886/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script src="jquery-1.3.2.min.js"></script>
<script>
$(document).ready(function() {
$("#responsecontainer").load("application/views/response.php");
var refreshId = setInterval(function()
{
$("#responsecontainer").load('application/views/response.php?randval='+ Math.random());
}, 1000);
});
</script>
<script>
$(document).ready(function() {
$("#responsecontainer2").load("application/views/response2.php");
var refreshId = setInterval(function()
{
$("#responsecontainer2").load('application/views/response2.php?randval='+ Math.random());
}, 1000);
});
</script>
<script>
$(document).ready(function() {
$("#responsecontainer3").load("application/views/response3.php");
var refreshId = setInterval(function()
{
$("#responsecontainer3").load('application/views/response3.php?randval='+ Math.random());
}, 1000);
});
</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!--
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
	 -->
    </ul>

    <!-- SEARCH FORM -->
    <!--
	<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
	-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
	 <?php
	$level=$_SESSION['level_masuk'];
	$id=$_SESSION["id_masuk"];
	if($level=="XX"){
		?>
		<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"> <div id="responsecontainer"></div></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          
         
          <div class="dropdown-divider"></div>
          <a href="dashboard.php?module=invoice_kategori&stt=baca" class="dropdown-item dropdown-footer">Lihat Balasan</a>
        </div>
      </li>	
		
		<?php
	}
	
	else if($level=="ss"){
	?>
	<!--
	<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"> <div id="responsecontainer3"></div></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          
         
          <div class="dropdown-divider"></div>
          <a href="dashboard.php?module=pembayaran&stt=baca" class="dropdown-item dropdown-footer">Lihat Pembayaran Masuk</a>
        </div>
      </li>	
	-->
	<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"> <div id="responsecontainer2"></div></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          
         
          <div class="dropdown-divider"></div>
          <a href="dashboard.php?module=pesanan&stt=baca" class="dropdown-item dropdown-footer">Lihat Pesanan Masuk</a>
        </div>
      </li>	
      
	  <?php
	}
	else{}
	  ?>
      <!-- Notifications Dropdown Menu -->
      
      <!--
	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
          
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
	  -->
	   <li class="nav-item">
	   
       
      </li>
	   <li class="nav-item">
	  
        <a href="dashboard.php?module=logout">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<?php
$level=$_SESSION['level_masuk'];
$id=$_SESSION["id_masuk"];
if($level=="Admin"){
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $nama_user=$d["nama"];
    $gambar_user=$d["gambar"];
	$t="Administrator";

}
else if($level=="X"){


}

?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #202c45;">
    <!-- Brand Logo -->
    <a href="dashboard.php?module=home" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo"$t";?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #202c45;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo"dist/img/$gambar_user";?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="dashboard.php?module=home" class="d-block"><?php echo"$nama_user";?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
       
      </div>

      <!-- Sidebar Menu -->
       <?php include"application/views/menu.php"; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         <?php
$level_masuk=$_SESSION['level_masuk'];
$module=$_GET["module"];

if($module=="home"){
	
	
	if($level_masuk=="Admin") {	$judul_masuk="Selamat Datang Admin";}
if($level_masuk=="Pengguna") {	$judul_masuk="Selamat Datang Pengguna";}
	}
	else if($module=="user"){$judul_masuk="Halaman User";}
	else if($module=="member"){$judul_masuk="Halaman Member";}
	else if($module=="kategori"){$judul_masuk="Halaman Kategori";}
	else if($module=="video"){$judul_masuk="Halaman Video";}
	else if($module=="jenis"){$judul_masuk="Halaman Jenis";}

	else {$judul_masuk="Selamat Datang Admin";}
			  
?>	  
            <h1 class="m-0 text-dark"><?php echo"$judul_masuk"; ?>  </h1>
          </div><!-- /.col -->
          <!-- 
		  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
		  
		  /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
	 <?php


	//-----------------------------------------
	if($module=="utama"){include"application/views/home.php";}
	else if($module=="member"){include"application/views/member.php";}
    else if($module=="user"){include"application/views/user.php";}
	else if($module=="kategori"){include"application/views/kategori.php";}
	else if($module=="video"){include"application/views/video.php";}
	else if($module=="jenis"){include"application/views/jenis.php";}
	
	else if($module=="logout"){
	$terakhir=date('d-m-Y h:i:s');
	$id_masuk=$_SESSION['id_masuk'];
	#$queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET terakhir_login='$terakhir' WHERE id_user = '$id_masuk'");
	
	session_destroy();
	
	
	if($level_masuk=="Admin")
		{		echo"<script>location.href='index.php';</script>";  }
		else{		echo"<script>location.href='../index.php';</script>";  }
	#alert('Akses anda Telah Berakhir.');

	}
	
	
	else {
		if($level_masuk=="Admin")
		{		include"application/views/home.php";}
		else{		include"application/views/home_pengguna.php";}
		
		
		
		}
	
	
	?>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>COPYRIGHT ADMINISTRATOR CAREERHUB &copy; <?php $tahun=date('Y'); echo $tahun; ?> </strong>

    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
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
</body>
</html>
<?php
}
?>