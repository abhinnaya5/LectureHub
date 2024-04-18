<?php
$level=$_SESSION['level_masuk'];
if($level=="Admin"){
?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
		 <li class="nav-item">
            <a href="dashboard.php?module=home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>	   
		  
          
          
          
		  <li class="nav-item">
            <a href="dashboard.php?module=user" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                User
                
              </p>
            </a>
          </li>	 
		  <li class="nav-item">
            <a href="dashboard.php?module=kategori" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kategori
                
              </p>
            </a>
          </li>	 
		  <li class="nav-item">
            <a href="dashboard.php?module=talent" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Talent
                
              </p>
            </a>
          </li>	  
		  <li class="nav-item">
            <a href="dashboard.php?module=perusahaan" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Perusahaan
                
              </p>
            </a>
          </li>	  
		 
		   <li class="nav-item">
            <a href="dashboard.php?module=tes" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lowongan Kerja
                
              </p>
            </a>
          </li>	  
		 
           <li class="nav-item">
            <a href="dashboard.php?module=tes" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Lamaran
                
              </p>
            </a>
          </li>	  
		  <li class="nav-item">
            <a href="dashboard.php?module=tes" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
                
              </p>
            </a>
          </li>	  
		 
		    <!--
		  -->
          
          
          
          
        </ul>
      </nav>
<?php
}
else if($level=="Calon"){
?>			

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
		 <li class="nav-item">
            <a href="dashboard.php?module=home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>	   
		  
          <li class="nav-item">
            <a href="dashboard.php?module=pengumuman_calon" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Pengumuman
                
              </p>
            </a>
          </li>	  
          
           <li class="nav-item">
            <a href="dashboard.php?module=form_psb" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Form PPDB
                
              </p>
            </a>
          </li>	  
		  <li class="nav-item">
            <a href="dashboard.php?module=nilai_un" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Nilai UN
                
              </p>
            </a>
          </li>	 
		   <li class="nav-item">
            <a href="dashboard.php?module=pembayaran_pengguna" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Konfirm Pembayaran
                
              </p>
            </a>
          </li>	  
         
		 <?php
 $query = mysqli_query($koneksi, "SELECT * FROM tbpengaturan where status_ujian='On'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
?>
<li class="nav-item">
            <a href="#" class="nav-link" title="Menu Ujian Sedang Off">
              <i class="nav-icon fas fa-fax"></i>
              <p>
                Ujian
                
              </p>
            </a>
          </li>	 
   
   
<?php
   }
   else{  
?>
<li class="nav-item">
            <a href="dashboard.php?module=ujian_pengguna" class="nav-link">
              <i class="nav-icon fas fa-fax"></i>
              <p>
                Ujian
                
              </p>
            </a>
          </li>	 
	 


<?php
   }
?>
		 
		 
	<li class="nav-item">
            <a href="dashboard.php?module=spp_siswa" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pembayaran SPP
                
              </p>
            </a>
          </li>	 
            
         
          
          
          
        </ul>
      </nav>


<?php
}
?>