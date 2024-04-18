<?php
 $query = mysqli_query($koneksi, "SELECT * FROM tbuser") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_user="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_user=$r;   }

   
 $query = mysqli_query($koneksi, "SELECT * FROM tbvideo") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_cus="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_cus=$r;   }

   $query = mysqli_query($koneksi, "SELECT * FROM tbriwayat") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_pro="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_pro=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbkategori") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_pen="0";
   }
	else{  $r = mysqli_num_rows($query); $rekap_pen=$r;   }
	
	
	
   
   
   ?>

 <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">
                  <?php echo $rekap_user;?>
                 
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Member</span>
                <span class="info-box-number"><?php echo $rekap_cus;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		   <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-table"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kategori</span>
                <span class="info-box-number"><?php echo $rekap_pen;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-video"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Video</span>
                <span class="info-box-number"><?php echo $rekap_pro;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		 
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

        

        
        <!-- /.row -->
      </div><!--/. container-fluid -->