<?php
			$id_kategori=$_GET['idk'];
      $qq = mysqli_query($koneksi, "SELECT * FROM tbkategori where id_kategori='$id_kategori'") or die (mysqli_error());
	  $h = mysqli_fetch_array($qq);
	  
	  ?>
<!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Videos</h5>
                <h1>Categories <?php echo $h['nama_kategori'];?></h1>
            </div>
            <div class="row">
			
			<?php
			$id_kategori=$_GET['idk'];
      $query = mysqli_query($koneksi, "SELECT * FROM tbvideo,tbuser,tbkategori,tbjenis where tbvideo.id_user=tbuser.id_user and tbvideo.id_kategori=tbkategori.id_kategori and tbvideo.id_jenis=tbjenis.id_jenis and tbvideo.id_kategori='$id_kategori' order by tbvideo.id_video desc") or die (mysqli_error());
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