<?php
$id_video=$_GET['idv'];
      $query = mysqli_query($koneksi, "SELECT * FROM tbvideo,tbuser,tbjenis where tbvideo.id_user=tbuser.id_user and tbvideo.id_jenis=tbjenis.id_jenis and tbvideo.id_video='$id_video' order by tbvideo.id_video") or die (mysqli_error());
      if(mysqli_num_rows($query) == 0){
    
      }else{

		$no=1;
      $r = mysqli_fetch_array($query);
	  
	  
	  
	  
	  }
		  
		  
		  ?>


<form role="form" name="form1" class="contact-form row" method="post" action="" enctype="multipart/form-data">
 <!-- About Start -->
    <div class="container-fluid py-5" style="border-top-style:solid;border-color: #f3f4f6;">
        <div class="container py-5" style="padding-top: 0 !important;">
		<div class="text-center mb-5">
                
            </div>
            <div class="row align-items-center">
			<video  autoplay="true" width="100%" controls><source src="img/<?php echo $r['berkas']; ?>" type="video/mp4"></video>
                
                
				
            </div>
			<br>
			<b><?php echo $r['judul']; ?></b><br>
			Published on <?php echo $r['waktu']; ?>,  <?php echo $r['tampil']; ?> Views <hr>
			<b><?php echo $r['nama']; ?></b><br>
			<?php echo $r['deskripsi']; ?>
        </div>
		
    </div>
    <!-- About End -->
 </form>		
	
<?php
$id_video=$_GET['idv'];
$id_user=$_SESSION['id_masuk'];
$waktu=date('Y-m-d h:i:s');
$tampil=$r['tampil'];

$hit=$tampil+1;
$querytambah = mysqli_query($koneksi, "INSERT INTO tbriwayat VALUES('', '$id_user', '$id_video', '$waktu')") or die(mysqli_error());
$queryupdate = mysqli_query($koneksi, "UPDATE tbvideo SET tampil='$hit' WHERE id_video = '$id_video'");



?>