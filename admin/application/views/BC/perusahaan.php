<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=perusahaan&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Depan</th>
						  <th>Nama Belakang</th>
						  <th>Nama Perusahaan</th>
						  <th>Email</th>
                          <th>Alamat</th>
						  <th>Telepon</th>
						  <th style="text-align: center;">Gambar</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbperusahaan order by id_perusahaan asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='9' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_depan'] ?></td>  
  <td><?php echo $r['nama_belakang'] ?></td>  
  <td><?php echo $r['nama_perusahaan'] ?></td>  
  <td><?php echo $r['email'] ?></td> 
 <td><?php echo $r['alamat'] ?></td>  
  <td><?php echo $r['telepon'] ?></td>  
  <td align="center"><img src="<?php echo"dist/img/".$r['gambar'];?>" width="40" height="35"/></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=perusahaan&stt=edit&id=".$r['id_perusahaan'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=perusahaan&stt=hapus&id=".$r['id_perusahaan'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
<div class="clearfix"></div>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Perusahaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Depan *</label>
                    <input type="text" name="nama_depan" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Belakang *</label>
                    <input type="text" name="nama_belakang" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Perusahaan *</label>
                    <input type="text" name="nama_perusahaan" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email *</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat *</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Telepon *</label>
                    <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" required>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Password *</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" required>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Gambar (80 x 80)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar">
                        
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="dashboard.php?module=kategori"><button class="btn btn-primary" type="button">Batal</button></a>
                </div>
              </form>
            </div>
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	
	
	
	

	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Simpan'])){
  $id_perusahaan=$_POST['id_perusahaan'];
  $nama_depan=$_POST['nama_depan'];
  $nama_belakang=$_POST['nama_belakang'];
  $email=$_POST['email'];
  $nama_perusahaan=$_POST['nama_perusahaan'];
  $password=$_POST['password'];
  $gambar=$_POST['gambar'];
  $alamat=$_POST['alamat'];
  $telepon=$_POST['telepon'];
  
  
  	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"dist/img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar="noimages.jpg";}
    if(strlen($gambar)<1){$gambar="noimages.jpg";}
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbperusahaan VALUES('', '$nama_depan', '$nama_belakang', '$email', '$nama_perusahaan', '$alamat', '$telepon', '$password', '$gambar')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=perusahaan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=perusahaan';</script>";

   }
  }
 ?>							
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbperusahaan WHERE `id_perusahaan` ='$id'");
  $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbloker WHERE `id_perusahaan` ='$id'");
  

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=perusahaan';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=perusahaan';</script>";
 }

}
else if($stt=="edit"){
$id_perusahaan=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbperusahaan where id_perusahaan='$id_perusahaan'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_perusahaan=$d["id_perusahaan"];
	$nama_depan=$d["nama_depan"];
    $nama_belakang=$d["nama_belakang"];
    $nama_perusahaan=$d["nama_perusahaan"];
    $email=$d["email"];
	$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
	    $alamat=$d["alamat"];
    $telepon=$d["telepon"];
	
?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Perusahaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Depan *</label>
                    <input type="text" name="nama_depan" class="form-control" id="exampleInputEmail1" value="<?php echo $nama_depan;?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Belakang *</label>
                    <input type="text" name="nama_belakang" class="form-control" id="exampleInputEmail1" value="<?php echo $nama_belakang;?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Perusahaan *</label>
                    <input type="text" name="nama_perusahaan" class="form-control" id="exampleInputEmail1" value="<?php echo $nama_perusahaan;?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat *</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" required value="<?php echo $alamat;?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Telepon *</label>
                    <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" required value="<?php echo $telepon;?>">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Email *</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email;?>">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Gambar (80 x 80)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar">
                        
						<br><br>
						<a href="<?php echo"dist/img/$gambar";?>" title="Klik Untuk Perbesar Gambar" target="_blank"><?php echo"<img src='dist/img/$gambar' height='100' width='100'>";?></a>
						
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="dashboard.php?module=perusahaan"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_perusahaan" value="<?php echo"$id_perusahaan";?>">
                </div>
              </form>
            </div>
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	


	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Update'])){
  $id_perusahaan=$_POST['id_perusahaan'];
  $nama_depan=$_POST['nama_depan'];
  $nama_belakang=$_POST['nama_belakang'];
  $nama_perusahaan=$_POST['nama_perusahaan'];
  $email=$_POST['email'];
  $gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
    $alamat=$_POST['alamat'];
  $telepon=$_POST['telepon'];
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"dist/img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

$queryupdate = mysqli_query($koneksi, "UPDATE tbperusahaan SET 
                           nama_depan='$nama_depan',
                           nama_belakang='$nama_belakang',
                           nama_perusahaan='$nama_perusahaan',
						   alamat='$alamat',
                           telepon='$telepon',
                           gambar='$gambar',
						   email='$email'
						   WHERE id_perusahaan = '$id_perusahaan'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=perusahaan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=perusahaan&stt=edit&id=$id_perusahaan';</script>";

   }
  }
 ?>	

<?php
}
?>
