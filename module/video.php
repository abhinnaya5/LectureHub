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
                <h1>My Video</h1>
            </div>
            <div class="row">
                
				
				
				
				<?php
if($stt==""){
?>

<div class="card" style="width: 100%;">
              <div class="card-header">
                
				<a href="index.php?module=video&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Add</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table class="table responsive-2">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Categories</th>
						  <th>Type</th>
						  <th>Title</th>
						  <th>Description</th>
						  <th style="text-align: center;">Time</th>
						  <th style="text-align: center;">Video</th>
						  <th style="text-align: center;">Views</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
				  $id_user=$_SESSION['id_masuk'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbvideo,tbkategori,tbjenis,tbuser where tbvideo.id_kategori=tbkategori.id_kategori and tbvideo.id_jenis=tbjenis.id_jenis and tbvideo.id_user=tbuser.id_user and tbuser.id_user='$id_user' order by tbvideo.id_video asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='9' align='center'>No Data Available</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_kategori'] ?></td>  
  <td><?php echo $r['jenis'] ?></td>  
  <td><?php echo $r['judul'] ?></td>  
  <td><?php echo $r['deskripsi'] ?></td>  
  <td align="center"><?php echo $r['waktu'] ?></td>  
  <td>
  <video width="100%" controls><source src="img/<?php echo $r['berkas']; ?>" width="200px" type="video/mp4"></video>  
  </td>  
  <td align="center"><?php echo $r['tampil'] ?></td> 
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=video&stt=edit&id=".$r['id_video'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=video&stt=hapus&id=".$r['id_video'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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

<div class="card" style="width: 100%;">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Video Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				<div class="form-group">
                    <label for="exampleInputEmail1">Categories *</label>
                    <select class="form-control" name="id_kategori" id="id_kategori" required>
                                    <option value="">Choose</option>
                                    <?php
									$query = mysqli_query($koneksi, "SELECT * FROM tbkategori order by `nama_kategori` asc") or die (mysqli_error());
									if(mysqli_num_rows($query) == 0){ 
										  echo "";
									   }
									else {
										$no=1;
									 while($r = mysqli_fetch_array($query)):   
									
									 ?>
									  <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
									 <?php
								
									 endwhile;
									 
									}	
											?>
                                </select>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Type *</label>
                    <select class="form-control" name="id_jenis" id="id_jenis" required>
                                    <option value="">Choose</option>
                                    <?php
									$query = mysqli_query($koneksi, "SELECT * FROM tbjenis order by `jenis` asc") or die (mysqli_error());
									if(mysqli_num_rows($query) == 0){ 
										  echo "";
									   }
									else {
										$no=1;
									 while($r = mysqli_fetch_array($query)):   
									
									 ?>
									  <option value="<?php echo $r['id_jenis'] ?>"><?php echo $r['jenis'] ?></option>
									 <?php
								
									 endwhile;
									 
									}	
											?>
                                </select>
                  </div>
				  
                 <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <textarea name="judul" class="form-control" id="exampleInputEmail1"><?php echo $judul;?></textarea>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Description *</label>
                    <textarea name="deskripsi" class="form-control" id="exampleInputEmail1"></textarea>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputFile">File (Video) .mp4 *</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar" required>
                        
                      </div>
                      
                    </div>
                  </div>
                 
				  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Save</button>
				<a href="index.php?module=video"><button class="btn btn-primary" type="button">Cancel</button></a>
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
  $id_jenis=$_POST['id_jenis'];
  $judul=$_POST['judul'];
  $deskripsi=$_POST['deskripsi'];
  
  $gambar=$_POST['gambar'];
  $id_user=$_SESSION['id_masuk'];

  
  
  	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar="noimages.jpg";}
    if(strlen($gambar)<1){$gambar="noimages.jpg";}
	
	$tahun=date('Y');
	$waktu=date('Y-m-d');
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbvideo VALUES('', '$waktu', '$id_user', '$id_kategori', '$id_jenis', '$tahun', '$judul', '$deskripsi', '$gambar', '')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=video';</script>";
   
   
   } else{
   echo"<script>alert('Add Failed');location.href='$_SERVER[PHP_SELF]?module=video';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbvideo WHERE `id_video` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Delete Successful');location.href='$_SERVER[PHP_SELF]?module=video';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Delete Failed');location.href='$_SERVER[PHP_SELF]?module=video';</script>";
 }

}
else if($stt=="edit"){
$id_video=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbvideo where id_video='$id_video'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_kategori=$d["id_kategori"];
    $id_video=$d["id_video"];
	$id_jenis=$d["id_jenis"];
    $judul=$d["judul"];
    $deskripsi=$d["deskripsi"];
    $gambar=$d["berkas"];
    $gambar0=$d["berkas"];
	
?>

<div class="card" style="width: 100%;">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Video Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                 
				 <div class="form-group">
                    <label for="exampleInputEmail1">Categories *</label>
                    <select class="form-control" name="id_kategori" id="id_kategori" required>
					<?php
				    echo"<option value='$id_kategori'>".KAT($tbkategori,$id_kategori)."</option>";
				    ?>
                                    <option value="">Choose</option>
                                    <?php
									$query = mysqli_query($koneksi, "SELECT * FROM tbkategori order by `nama_kategori` asc") or die (mysqli_error());
									if(mysqli_num_rows($query) == 0){ 
										  echo "";
									   }
									else {
										$no=1;
									 while($r = mysqli_fetch_array($query)):   
									
									 ?>
									  <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
									 <?php
								
									 endwhile;
									 
									}	
											?>
                                </select>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Type *</label>
                    <select class="form-control" name="id_jenis" id="id_jenis" required>
					<?php
				    echo"<option value='$id_jenis'>".JEN($tbjenis,$id_jenis)."</option>";
				    ?>
                                    <option value="">Choose</option>
                                    <?php
									$query = mysqli_query($koneksi, "SELECT * FROM tbjenis order by `jenis` asc") or die (mysqli_error());
									if(mysqli_num_rows($query) == 0){ 
										  echo "";
									   }
									else {
										$no=1;
									 while($r = mysqli_fetch_array($query)):   
									
									 ?>
									  <option value="<?php echo $r['id_jenis'] ?>"><?php echo $r['jenis'] ?></option>
									 <?php
								
									 endwhile;
									 
									}	
											?>
                                </select>
                  </div>
				  
                
				  <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <textarea name="judul" class="form-control" id="exampleInputEmail1"><?php echo $judul;?></textarea>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Description *</label>
                    <textarea name="deskripsi" class="form-control" id="exampleInputEmail1"><?php echo $deskripsi;?></textarea>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputFile">File (Video) .mp4 *</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar">
                        
						
						
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="index.php?module=video"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_video" value="<?php echo"$id_video";?>">
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
  $id_video=$_POST['id_video'];
  $id_kategori=$_POST['id_kategori'];
  $judul=$_POST['judul'];
  $id_jenis=$_POST['id_jenis'];
  $deskripsi=$_POST['deskripsi'];
  $id_jenis=$_POST['id_jenis'];
$gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

$queryupdate = mysqli_query($koneksi, "UPDATE tbvideo SET 
                           judul='$judul',
                           deskripsi='$deskripsi',
                           id_kategori='$id_kategori',
                           id_jenis='$id_jenis',
                           berkas='$gambar'
						   WHERE id_video = '$id_video'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=video';</script>";
   
   
   } else{
   echo"<script>alert('Update Failed');location.href='$_SERVER[PHP_SELF]?module=video&stt=edit&id=$id_video';</script>";

   }
  }
 ?>	

<?php
}
?>

				
				
				
				
				
				
				
				
            </div>
        </div>
    </div>
    <!-- Category Start -->
