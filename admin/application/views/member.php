<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama</th>
						  <th>Username</th>
						  <th>Email</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbuser where level='Member' order by id_user asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='5' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama'] ?></td>  
  <td><?php echo $r['username'] ?></td>  
  <td><?php echo $r['email'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=member&stt=edit&id=".$r['id_user'] ?>"><i class="fa fa-desktop"></i></a> 
  </td>
 </tr>
<?php
 $no++;
  endwhile;
  }
 ?>
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


 
<div class="clearfix"></div>			  
<?php
}
else if($stt=="tambah"){
  ?>		
				
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbuser WHERE `id_user` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=member';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=member';</script>";
 }

}
else if($stt=="edit"){
$id_user=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id_user'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_user=$d["id_user"];
	$nama=$d["nama"];
	$email=$d["email"];
    $username=$d["username"];
	$password=$d["password"];
	$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
	
?>

<div class="card">
             <div class="card-header">
                
				<a href="dashboard.php?module=member" class="menu"><button type="button" class="btn btn-primary mb-3">Kembali</button></a>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<h4>Riwayat Aktifitas Member</h4>
<div class="col-md-12">
            <!-- general form elements -->
           <!-- Category List -->
             
                        
                        <ul class="list-group list-group-flush">
						
						<?php
						$id_user=$_GET['id'];
      $query = mysqli_query($koneksi, "SELECT * FROM tbriwayat,tbuser,tbvideo where tbriwayat.id_user=tbuser.id_user and tbriwayat.id_video=tbvideo.id_video and tbuser.id_user='$id_user' order by tbriwayat.id_riwayat desc") or die (mysqli_error());
      if(mysqli_num_rows($query) == 0){
    
      }else{

		$no=1;
      while($r = mysqli_fetch_array($query)){
		   
		  
		  ?>
						
						
						
						
						
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="#" class="text-decoration-none h6 m-0"><?php echo $r['judul']; ?></a>
                                <span class="badge badge-primary badge-pill"><?php echo $r['masuk']; ?></span>
                            </li>
							
							
							
		<?php
		  
	  }
	  }


	  ?>					
                         
                        </ul>
                 
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	


	<div class="clearfix"></div>




<?php
}
?>
