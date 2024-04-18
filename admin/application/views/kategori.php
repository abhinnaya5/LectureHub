<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=kategori&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Kategori</th>
						  <th style="text-align: center;">Gambar</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbkategori order by id_kategori asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='4' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_kategori'] ?></td>  
  <td align="center"><img src="<?php echo"dist/img/".$r['gambar'];?>" width="40" height="35"/></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=kategori&stt=edit&id=".$r['id_kategori'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=kategori&stt=hapus&id=".$r['id_kategori'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
                <h3 class="card-title">Form Tambah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori *</label>
                    <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">Gambar (400 x 250)</label>
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
  $id_kategori=$_POST['id_kategori'];
  $nama_kategori=$_POST['nama_kategori'];
  $bidang=$_POST['bidang'];
   $gambar=$_POST['gambar'];

  
  
  	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"dist/img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar="avatar.jpg";}
    if(strlen($gambar)<1){$gambar="avatar.jpg";}
  
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbkategori VALUES('', '$nama_kategori', '$gambar')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=kategori';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=kategori';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbkategori WHERE `id_kategori` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=kategori';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=kategori';</script>";
 }

}
else if($stt=="edit"){
$id_kategori=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbkategori where id_kategori='$id_kategori'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_kategori=$d["id_kategori"];
	$nama_kategori=$d["nama_kategori"];
    $bidang=$d["bidang"];
		$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
	
?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori *</label>
                    <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" value="<?php echo $nama_kategori;?>">
                  </div>
				 <div class="form-group">
                    <label for="exampleInputFile">Gambar (400 x 250)</label>
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
				<a href="dashboard.php?module=kategori"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_kategori" value="<?php echo"$id_kategori";?>">
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
  $id_kategori=$_POST['id_kategori'];
  $nama_kategori=$_POST['nama_kategori'];
  $bidang=$_POST['bidang'];
$gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"dist/img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

$queryupdate = mysqli_query($koneksi, "UPDATE tbkategori SET 
                           nama_kategori='$nama_kategori',
                           gambar='$gambar'
						   WHERE id_kategori = '$id_kategori'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=kategori';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=kategori&stt=edit&id=$id_kategori';</script>";

   }
  }
 ?>	

<?php
}
?>
