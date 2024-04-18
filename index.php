<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"admin/application/config/koneksi.php";
$module="module";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LECTUREHUB - Exchange ideas. Share knowledge.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="LECTUREHUB - Exchange ideas. Share knowledge." name="keywords">
    <meta content="LECTUREHUB - Exchange ideas. Share knowledge." name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0"><span class="text-primary">LECTURE</span>HUB</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Office and Operations</h6>
                        <small>123 Street, Moskow, Russia</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>info@example.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>+012 345 6789</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="d-flex align-items-center justify-content-between w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;background-color: #ffffff;">
                    <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Categories</h5>
                    <i class="fa fa-angle-down text-primary"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                    <div class="navbar-nav w-100">
                        <!--
						<div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Computer Science <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">HTML</a>
                                <a href="" class="dropdown-item">CSS</a>
                                <a href="" class="dropdown-item">jQuery</a>
                            </div>
                        </div>
						-->
						
						<?php
      $query = mysqli_query($koneksi, "SELECT * FROM tbkategori order by id_kategori asc") or die (mysqli_error());
      if(mysqli_num_rows($query) == 0){
    
      }else{

		$no=1;
      while($r = mysqli_fetch_array($query)){
		 
		  
		  
		  ?>
		  
		  
		                <a href="index.php?module=videokat&idk=<?php echo $r['id_kategori'];?>" class="nav-item nav-link"><?php echo $r['nama_kategori']; ?></a>
                       
		  
		  <?php
		  
	  }
	  }


	  ?>
						
						
						
						
						
						
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span class="text-primary">LECTURE</span>HUB</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <!--
						
						-->
						<a href="index.php" class="nav-item nav-link active">&nbsp;</a>
						<div class="navbar-nav py-0">
                          <?php
							$id_masuk=$_SESSION['id_masuk'];
							$level=$_SESSION['level_masuk'];
							if($id_masuk==""){
								?> 
                            
                            <a href="index.php?module=signin" class="nav-item nav-link">Sign In</a>
                            <a href="index.php?module=signup" class="nav-item nav-link">Sign Up</a>
							
							<?php
							}
							else{
							?>
                             <a href="index.php" class="nav-item nav-link">Home</a>
                             <a href="index.php?module=profile" class="nav-item nav-link">Profile</a>
                             <a href="index.php?module=video" class="nav-item nav-link">Video</a>
							 <a href="index.php?module=history" class="nav-item nav-link">History</a>
							 <a href="index.php?module=logout" class="nav-item nav-link">Logout</a>
							<?php
							}
							
							?>
                        </div>
						
                       <!--
					    <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="">Sign In</a>
						<a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="">Sign Up</a>
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="">Sign Up</a>
					   -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



<?php
$module=$_GET["module"];
if(($module=="")||($module=="home")){

?>







    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/carousel-1.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            
                            <h1 class="display-3 text-white mb-md-4">Best Education Video From Your Home</h1>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/carousel-2.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                           <h1 class="display-3 text-white mb-md-4">Best Education Video From Your Home</h1>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/carousel-3.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h1 class="display-3 text-white mb-md-4">Best Education Video From Your Home</h1>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    


    <!-- Category Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3" style="padding-top: 0 !important;">
		<div class="text-center mb-5">
		 <form name="form1" method="post" action="" enctype="multipart/form-data">
                <input type="text" class="form-control border-light" style="padding: 30px;" name="txtcari" placeholder="Search">
				<input type="hidden" name="Simpan">
				</form>
            </div>
<?php 
if(isset($_POST['Simpan'])){
  $txtcari=$_POST['txtcari'];
  
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=cari&word=$txtcari';</script>";
   
   
   
  }
 ?>				
			
			
			
            <div class="text-center mb-5">
			
                <!--
				<h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
				-->
                <h1>Explore Categories
				Video</h1>
            </div>
            <div class="row">
			
			
			<?php
      $query = mysqli_query($koneksi, "SELECT * FROM tbkategori order by id_kategori asc") or die (mysqli_error());
      if(mysqli_num_rows($query) == 0){
    
      }else{

		$no=1;
      while($r = mysqli_fetch_array($query)){
		   $id_kategori=$r['id_kategori'];
		   $q22 = mysqli_query($koneksi, "SELECT * FROM tbvideo where id_kategori='$id_kategori'") or die (mysqli_error());
		   $jum = mysqli_num_rows($q22);
		  
		  
		  ?>
		  
		  
		  <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="admin/dist/img/<?php echo $r['gambar'];?>" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="index.php?module=videokat&idk=<?php echo $r['id_kategori'];?>">
                            <h4 class="text-white font-weight-medium"><?php echo $r['nama_kategori'];?></h4>
                            <span><?php echo $jum;?> Videos</span>
                        </a>
                    </div>
                </div>
		  
		  <?php
		  
	  }
	  }


	  ?>
			
			
                
                
            </div>
        </div>
    </div>
    <!-- Category Start -->

<!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5" style="padding-top: 0 !important;">
		
            <div class="row align-items-center">
			
                <div class="col-lg-5">
				
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="img/about.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
                        <h1>LectureHub</h1>
                    </div>
                    <p>Aliquyam accusam clita nonumy ipsum sit sea clita ipsum clita, ipsum dolores amet voluptua duo dolores et sit ipsum rebum, sadipscing et erat eirmod diam kasd labore clita est. Diam sanctus gubergren sit rebum clita amet, sea est sea vero sed et. Sadipscing labore tempor at sit dolor clita consetetur diam. Diam ut diam tempor no et, lorem dolore invidunt no nonumy stet ea labore, dolor justo et sit gubergren diam sed sed no ipsum. Sit tempor ut nonumy elitr dolores justo aliquyam ipsum stet</p>
                    <a href="index.php?module=about" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
	
    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Videos</h5>
                <h1>Our Popular Videos</h1>
            </div>
            <div class="row">
			
			<?php
      $query = mysqli_query($koneksi, "SELECT * FROM tbvideo,tbuser,tbjenis where tbvideo.id_user=tbuser.id_user and tbvideo.id_jenis=tbjenis.id_jenis order by tbvideo.id_video desc limit 6") or die (mysqli_error());
      if(mysqli_num_rows($query) == 0){
    
      }else{

		$no=1;
      while($r = mysqli_fetch_array($query)){
		   
		  
		  ?>
			
			
			
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="rounded overflow-hidden mb-2">
                         
						  <video width="100%" controls><source src="img/<?php echo $r['berkas']; ?>" type="video/mp4"></video>
                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i><?php echo $r['tampil'];?> Views</small>
                                <small class="m-0"><i class="far fa-user text-primary mr-2"></i><?php echo $r['nama'];?></small>
                            </div>
                            <a class="h5" href="index.php?module=detail&idv=<?php echo $r['id_video'];?>"><?php echo $r['judul']; ?></a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-clock text-primary mr-2"></i><small><?php echo $r['waktu'];?></small></h6>
                                    <h5 class="m-0"><a href="index.php?module=detail&idv=<?php echo $r['id_video'];?>"><input type="button" value="<?php echo $r['jenis'];?>"></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<?php
		  
	  }
	  }


	  ?>
				
                
            </div>
        </div>
    </div>
    <!-- Courses End -->



<?php
}else{
	
	
	$module=$_GET["module"];
	//-----------------------------------------
	 if($module=="signin"){include"module/signin.php";}
	else if($module=="signup"){include"module/signup.php";}
	else if($module=="profile"){include"module/profile.php";}
	else if($module=="video"){include"module/video.php";}
	else if($module=="history"){include"module/histori.php";}
	else if($module=="detail"){include"module/detail.php";}
	else if($module=="videokat"){include"module/videokat.php";}
	else if($module=="cari"){include"module/cari.php";}
	else if($module=="about"){include"module/about.php";}
	else if($module=="disclosure"){include"module/disclosure.php";}
	else if($module=="privacy"){include"module/privacy.php";}
	
	else if($module=="logout"){
	
	
	session_destroy();
	echo"<script>location.href='index.php';</script>";  
	
	}
	
	
	else {include"module/home.php";}
	
}
	?>
    


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Moskow, Russia</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">LECTURE HUB</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="index.php?module=about"><i class="fa fa-angle-right mr-2"></i>About</a>
                            <a class="text-white mb-2" href="index.php?module=privacy"><i class="fa fa-angle-right mr-2"></i>Privacy & Terms of Use</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; All Rights Reserved. Designed by Lecture Hub
                </p>
            </div>
            
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>