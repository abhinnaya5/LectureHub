
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
						  <th>Tanggal</th>
						  <th>Nama</th>
						  <th>Kategori - Bidang</th>
						  <th>Berkas</th>
						  <th>Catatan</th>
						  <th style="text-align: center;">Status</th>
						  
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
				  $id_masuk=$_SESSION['id_masuk'];
  $query = mysqli_query($koneksi, "SELECT * FROM tblamaran,tbloker,tbperusahaan,tbtalent where tblamaran.id_loker=tbloker.id_loker and tbloker.id_perusahaan=tbperusahaan.id_perusahaan and tblamaran.id_talent=tbtalent.id_talent order by tblamaran.id_lamaran asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo tgl_indo($r['tanggal']); ?></td>  
  <td><?php echo $r['nama_depan']." ".$r['nama_belakang']."<br>".$r['telepon']; ?></td>  
  <td><?php echo $r['kategori']." - ".$r['bidang']; ?></td>  
  <td><a href="<?php echo"admin/dist/img/".$r['berkas'];?>">File CV</a></td> 
  <td><?php echo $r['catatan'] ?></td>  
  <td align="center"><?php echo $r['status'] ?></td>  
  
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
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
			<h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Lowongan Kerja</h1>
                <div class="row gy-5 gx-4">
                    <div class="col-lg-12">
                        

                        <div class="mb-5">
<div class="clearfix"></div>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Lowongan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori *</label>
                    <select class="form-control" name="provinsi" id="provinsi">
                                    <option value="semua">Pilih Kategori</option>
                                    <?php
									$query = mysqli_query($koneksi, "SELECT * FROM tbkategori group by `nama_kategori` asc") or die (mysqli_error());
									if(mysqli_num_rows($query) == 0){ 
										  echo "";
									   }
									else {
										$no=1;
									 while($r = mysqli_fetch_array($query)):   
									
									 ?>
									  <option value="<?php echo $r['nama_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
									 <?php
								
									 endwhile;
									 
									}	
											?>
                                </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Bidang *</label>
                    <select class="form-control" name="bidang" id="bidang" required>
									<option value="semua">Pilih Bidang</option>
									  </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Durasi *</label>
                    <select class="form-control" name="durasi">
                                    <option value="semua">Pilih Durasi</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi *</label>
                    <input type="text" name="lokasi" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi *</label>
                    <textarea name="deskripsi" class="form-control" rows="25"></textarea>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Kemampuan *</label>
                    <textarea name="kemampuan" class="form-control" rows="15"></textarea>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Gaji *</label>
                    <input type="number" name="gaji" class="form-control" id="exampleInputEmail1" required>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Berakhir *</label>
                    <input type="date" name="tgl_akhir" class="form-control" id="exampleInputEmail1" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="index.php?module=loker"><button class="btn btn-primary" type="button">Batal</button></a>
                </div>
              </form>
            </div>
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	
	
	
</div>
        
                        
                    </div>
        
                    
                </div>
            </div>
        </div>
	

	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Simpan'])){
  $provinsi=$_POST['provinsi'];
  $bidang=$_POST['bidang'];
  $durasi=$_POST['durasi'];
  $lokasi=$_POST['lokasi'];
  $deskripsi=$_POST['deskripsi'];
  $kemampuan=$_POST['kemampuan'];
  $gaji=$_POST['gaji'];
  $tgl_akhir=$_POST['tgl_akhir'];
  $tgl=date('Y-m-d');
  $id_masuk=$_SESSION['id_masuk'];

  $querytambah = mysqli_query($koneksi, "INSERT INTO tbloker VALUES('', '$tgl', '$id_masuk', '$provinsi', '$bidang', '$durasi', '$lokasi', '$deskripsi', '$kemampuan', '$gaji', '$tgl_akhir')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=loker';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=loker';</script>";

   }
  }
 ?>							
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbloker WHERE `id_loker` ='$id'");
 # $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbloker WHERE `id_loker` ='$id'");
  

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=loker';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=loker';</script>";
 }

}
else if($stt=="edit"){
$id_loker=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbloker where id_loker='$id_loker'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_loker=$d["id_loker"];
	$nama_kategori=$d["kategori"];
	$bidang=$d["bidang"];
	$lokasi=$d["lokasi"];
    $kemampuan=$d["kemampuan"];
    $deskripsi=$d["deskripsi"];
    $durasi=$d["durasi"];
	$gaji=$d["gaji"];
	$tgl_akhir=$d["tgl_akhir"];
	
?>
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
			<h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Lowongan Kerja</h1>
                <div class="row gy-5 gx-4">
                    <div class="col-lg-12">
                        

                        <div class="mb-5">
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Lowongan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                 <div class="form-group">
                    <label for="exampleInputEmail1">Kategori *</label>
                    <select class="form-control" name="provinsi" id="provinsi">
					<?php
				  echo"<option value='$nama_kategori'>".KAT($tbkategori,$nama_kategori)."</option>";
				?>
                                    <option value="semua">Pilih Kategori</option>
                                    <?php
									$query = mysqli_query($koneksi, "SELECT * FROM tbkategori group by `nama_kategori` asc") or die (mysqli_error());
									if(mysqli_num_rows($query) == 0){ 
										  echo "";
									   }
									else {
										$no=1;
									 while($r = mysqli_fetch_array($query)):   
									
									 ?>
									  <option value="<?php echo $r['nama_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
									 <?php
								
									 endwhile;
									 
									}	
											?>
                                </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Bidang *</label>
                    <select class="form-control" name="bidang" id="bidang" required>
					<?php
				  echo"<option value='$bidang'>".BID($tbkategori,$bidang)."</option>";
				?>
									<option value="">Pilih Bidang</option>
									  </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Durasi *</label>
                    <select class="form-control" name="durasi">
                                    <?php
									if($durasi==""){echo"<option value=''>Pilih Durasi</option>";}
									else{echo"<option value='$durasi'>$durasi</option>";}
									?>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi *</label>
                    <input type="text" name="lokasi" class="form-control" id="exampleInputEmail1" required value="<?php echo $lokasi;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi *</label>
                    <textarea name="deskripsi" class="form-control" rows="25"><?php echo $deskripsi;?></textarea>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Kemampuan *</label>
                    <textarea name="kemampuan" class="form-control" rows="15"><?php echo $kemampuan;?></textarea>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Gaji *</label>
                    <input type="number" name="gaji" class="form-control" id="exampleInputEmail1" required value="<?php echo $gaji;?>">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Berakhir *</label>
                    <input type="date" name="tgl_akhir" class="form-control" id="exampleInputEmail1" required value="<?php echo $tgl_akhir;?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
				<?php
				$kd=$_GET['kd'];
				if($kd=="view"){}
				else{
				?>
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				  <?php
				}
				  ?>
				<a href="dashboard.php?module=loker"><button class="btn btn-primary" type="button">Kembali</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_loker" value="<?php echo"$id_loker";?>">
                </div>
              </form>
            </div>
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	
</div>
        
                        
                    </div>
        
                    
                </div>
            </div>
        </div>
	

	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Update'])){
  $id_loker=$_POST['id_loker'];
  $provinsi=$_POST['provinsi'];
  $bidang=$_POST['bidang'];
  $durasi=$_POST['durasi'];
  $lokasi=$_POST['lokasi'];
  $deskripsi=$_POST['deskripsi'];
  $kemampuan=$_POST['kemampuan'];
  $gaji=$_POST['gaji'];
  $tgl_akhir=$_POST['tgl_akhir'];
  

$queryupdate = mysqli_query($koneksi, "UPDATE tbloker SET 
                           kategori='$provinsi',
                           bidang='$bidang',
                           durasi='$durasi',
                           lokasi='$lokasi',
                           deskripsi='$deskripsi',
                           kemampuan='$kemampuan',
                           gaji='$gaji',
						   tgl_akhir='$tgl_akhir'
						   WHERE id_loker = '$id_loker'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>location.href='$_SERVER[PHP_SELF]?module=loker';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=loker&stt=edit&id=$id_loker';</script>";

   }
  }
 ?>	

<?php
}
?>
<script type="text/javascript">
		$('#provinsi').change(function() { 
			var provinsi = $(this).val(); 
			$.ajax({
				type: 'POST', 
				url: 'module/ajax_provinsi.php', 
				data: 'provinsi_id=' + provinsi, 
				success: function(response) { 
					$('#bidang').html(response); 
				}
			});
		});
 
	</script>
	