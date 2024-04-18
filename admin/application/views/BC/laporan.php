<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>


<form name="form1" method="post" action="" enctype="multipart/form-data">
 <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                 <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="tgl1" class="form-control float-right" required id="reservation">
                  </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status *</label>
                    <select class="form-control" name="status">
                                    <?php
									if($status==""){echo"<option value=''>Pilih Status</option>";}
									else{echo"<option value='$status'>$status</option>";}
									?>
                                    <option value="Menunggu Varifikasi">Menunggu Varifikasi</option>
                                    <option value="Interview">Interview</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Semua">Semua</option>
                                </select>
                  </div>
              </div>
             
              <div class="col-md-6">
                
                <!-- /.form-group -->
                <div class="form-group">
                  
				  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="tgl2" class="form-control float-right" required id="reservation">
                  </div>
                </div>
               
              </div>
              <!-- /.col -->
                  <button type="submit" name="Simpan" class="btn btn-primary">Tampil</button></div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>

</form>

<div class="clearfix"></div>
				
<?php 
if(isset($_POST['Simpan'])){
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
  $status=$_POST['status'];

   echo"<script>location.href='$_SERVER[PHP_SELF]?module=laporan&stt=tampil&T1=$tgl1&T2=$tgl2&sta=$status';</script>";
  }
 ?>				  
<?php
}
else if($stt=="tampil"){
  ?>		

<div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  
				  <thead>
                        <tr>
                          <th>No</th>
						  <th>Tanggal</th>
						  <th>Nama Talent</th>
						  <th>Perusahaan</th>
						  <th>Kategori - Bidang</th>
						  <th>Berkas</th>
						  <th>Catatan</th>
						  <th style="text-align: center;">Status</th>
						  
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
				  $tgl1=$_GET['T1'];
				  $tgl2=$_GET['T2'];
				  $status=$_GET['sta'];
				  
				  if($status==""){
					    $query = mysqli_query($koneksi, "SELECT * FROM tblamaran,tbloker,tbperusahaan,tbtalent where tblamaran.id_loker=tbloker.id_loker and tbloker.id_perusahaan=tbperusahaan.id_perusahaan and tblamaran.id_talent=tbtalent.id_talent and tblamaran.tanggal BETWEEN '$tgl1' and '$tgl2' order by tblamaran.id_lamaran asc") or die (mysqli_error());

				  }
				  else if($status=="Semua"){
					    $query = mysqli_query($koneksi, "SELECT * FROM tblamaran,tbloker,tbperusahaan,tbtalent where tblamaran.id_loker=tbloker.id_loker and tbloker.id_perusahaan=tbperusahaan.id_perusahaan and tblamaran.id_talent=tbtalent.id_talent and tblamaran.tanggal BETWEEN '$tgl1' and '$tgl2' order by tblamaran.id_lamaran asc") or die (mysqli_error());

				  }
				  else {
					  
					    $query = mysqli_query($koneksi, "SELECT * FROM tblamaran,tbloker,tbperusahaan,tbtalent where tblamaran.id_loker=tbloker.id_loker and tbloker.id_perusahaan=tbperusahaan.id_perusahaan and tblamaran.id_talent=tbtalent.id_talent and tblamaran.tanggal BETWEEN '$tgl1' and '$tgl2' and tblamaran.status='$status' order by tblamaran.id_lamaran asc") or die (mysqli_error());

				  }
				  
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='8' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo tgl_indo($r['tanggal']); ?></td>  
  <td><?php echo $r['nama_depan']." ".$r['nama_belakang']."<br>".$r['telepon']; ?></td>  
  <td><?php echo $r['nama_perusahaan'] ?></td>  
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
				
				<a href="<?php echo"application/views/cetak_lap.php?T1=$tgl1&T2=$tgl2&sta=$status"; ?>" target="_blank" class="menu"><button type="button" class="btn btn-primary mb-3">Cetak</button></a>
              </div>
              <!-- /.card-body -->
            </div>


 
<div class="clearfix"></div>

  
<?php
}
else if($stt=="hapus"){



}
else if($stt=="edit"){

	
?>



<?php
}
?>
