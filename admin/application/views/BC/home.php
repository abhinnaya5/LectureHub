<?php
 $query = mysqli_query($koneksi, "SELECT * FROM tbuser") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_user="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_user=$r;   }

   
 $query = mysqli_query($koneksi, "SELECT * FROM tbtalent") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_cus="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_cus=$r;   }

   $query = mysqli_query($koneksi, "SELECT * FROM tbperusahaan") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_pro="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_pro=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbkategori") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_pen="0";
   }
	else{  $r = mysqli_num_rows($query); $rekap_pen=$r;   }
	
	$query = mysqli_query($koneksi, "SELECT * FROM tbloker") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_pem="0";
   }
	else{  $r = mysqli_num_rows($query); $rekap_pem=$r;   }
	
	$query = mysqli_query($koneksi, "SELECT * FROM tblamaran") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_kir="0";
   }
	else{  $r = mysqli_num_rows($query); $rekap_kir=$r;   }
	
	
   
   
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Talent</span>
                <span class="info-box-number"><?php echo $rekap_cus;?></span>
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Perusahaan</span>
                <span class="info-box-number"><?php echo $rekap_pro;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		 
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-th"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lowongan Kerja</span>
                <span class="info-box-number"><?php echo "$rekap_pem";?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lamaran</span>
                <span class="info-box-number"><?php echo "$rekap_kir";?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		
          <!-- /.col -->
        </div>
        <!-- /.row -->

        

        
        <!-- /.row -->
      </div><!--/. container-fluid -->