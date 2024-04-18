<?php
$stt=$_GET["stt"];
?>

<style>	
@media screen and (max-width: 520px) {
    /*Tabel Responsive 2*/
    .responsive-2 {
        width: 100%;
    }
    .responsive-2 thead {
        display: none;
		
    }
	
    .responsive-2 td {
        display: block;
        text-align: right;
        border-right: 1px solid #e1edff;
    }
    .responsive-2 td::before {
        float: left;
        text-transform: uppercase;
        font-weight: bold;
        content: attr(data-header);
    }
}
</style>


 <!-- Category Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3" style="padding-top: 0 !important;">
		
            <div class="text-center mb-5">
			
                <!--
				<h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
				-->
                <h1>Watch History</h1>
            </div>
            <div class="row">
                
				
				
				
				


              <!-- Category List -->
                    <div class="mb-5" style="width: 100%;">
                        
                        <ul class="list-group list-group-flush">
						
						<?php
						$id_user=$_SESSION['id_masuk'];
      $query = mysqli_query($koneksi, "SELECT * FROM tbriwayat,tbuser,tbvideo where tbriwayat.id_user=tbuser.id_user and tbriwayat.id_video=tbvideo.id_video and tbuser.id_user='$id_user' order by tbriwayat.id_riwayat desc limit 20") or die (mysqli_error());
      if(mysqli_num_rows($query) == 0){
    
      }else{

		$no=1;
      while($r = mysqli_fetch_array($query)){
		   
		  
		  ?>
						
						
						
						
						
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="index.php?module=detail&idv=<?php echo $r['id_video'];?>" class="text-decoration-none h6 m-0"><?php echo $r['judul']; ?></a>
                                <span class="badge badge-primary badge-pill"><?php echo $r['masuk']; ?></span>
                            </li>
							
							
							
		<?php
		  
	  }
	  }


	  ?>					
                         
                        </ul>
                    </div>
         
				
				
            </div>
        </div>
    </div>
    <!-- Category Start -->
