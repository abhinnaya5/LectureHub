<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=talent&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Depan</th>
						  <th>Nama Belakang</th>
						  <th>Email</th>
						  <th>Alamat</th>
						  <th>Telepon</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbtalent order by id_talent asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='7' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_depan'] ?></td>  
  <td><?php echo $r['nama_belakang'] ?></td>  
  <td><?php echo $r['email'] ?></td>  
  <td><?php echo $r['alamat'] ?></td>  
  <td><?php echo $r['telepon'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=talent&stt=edit&id=".$r['id_talent'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=talent&stt=hapus&id=".$r['id_talent'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
                <h3 class="card-title">Form Tambah Talent</h3>
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
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="dashboard.php?module=talent"><button class="btn btn-primary" type="button">Batal</button></a>
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
  $id_talent=$_POST['id_talent'];
  $nama_depan=$_POST['nama_depan'];
  $nama_belakang=$_POST['nama_belakang'];
  $email=$_POST['email'];
  $alamat=$_POST['alamat'];
  $telepon=$_POST['telepon'];
  $password=$_POST['password'];
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbtalent VALUES('', '$nama_depan', '$nama_belakang', '$email', '$alamat', '$telepon', '$password')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=talent';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=talent';</script>";

   }
  }
 ?>							
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbtalent WHERE `id_talent` ='$id'");
  $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tblamaran WHERE `id_talent` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=talent';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=talent';</script>";
 }

}
else if($stt=="edit"){
$id_talent=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbtalent where id_talent='$id_talent'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_talent=$d["id_talent"];
	$nama_depan=$d["nama_depan"];
    $nama_belakang=$d["nama_belakang"];
    $email=$d["email"];
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
                <h3 class="card-title">Form Edit Talent</h3>
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
                    <label for="exampleInputEmail1">Email *</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email;?>">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Alamat *</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" required value="<?php echo $alamat;?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Telepon *</label>
                    <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" required value="<?php echo $telepon;?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="dashboard.php?module=talent"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_talent" value="<?php echo"$id_talent";?>">
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
  $id_talent=$_POST['id_talent'];
  $nama_depan=$_POST['nama_depan'];
  $nama_belakang=$_POST['nama_belakang'];
  $email=$_POST['email'];
  $alamat=$_POST['alamat'];
  $telepon=$_POST['telepon'];


$queryupdate = mysqli_query($koneksi, "UPDATE tbtalent SET 
                           nama_depan='$nama_depan',
                           nama_belakang='$nama_belakang',
                           alamat='$alamat',
                           telepon='$telepon',
						   email='$email'
						   WHERE id_talent = '$id_talent'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=talent';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=talent&stt=edit&id=$id_talent';</script>";

   }
  }
 ?>	

<?php
}
?>
