
<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"../config/koneksi.php";
$module="module";
?>
<style>
	/*design table 1*/
.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}

.table1, th, td {
    border: 1px solid #999;
    padding: 5px 10px;
}


	</style>
<table width="780" class="table1" border="1" align="center">
  <tr>
    <td align="right" style="font-size:12;  border: 1px solid #fff;">
	<center>

	<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
             <div class="x_title">
						
					
					 <div class="clearfix"></div>
					    </div>
               
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table width="100%" class="table1" border="1" style="width:100%; font-size:12;">
  <tr>
    <td align="right" style="font-size:12;  border: 1px solid #fff;">
	<center>
	
	<?php
	$tgl1=$_GET['T1'];
	$tgl2=$_GET['T2'];
	 $pisah=explode("-",$tgl1);
	 $tgl_1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
	$pisah=explode("-",$tgl2);
	 $tgl_2=$pisah[2]."-".$pisah[1]."-".$pisah[0];
	?>

	
	<b>CAAREEHUB<br>LAPORAN LAMARAN KERJA <?php $tgl=date('d-m-Y'); echo"TANGGAL ".tgl_indo("$tgl_1")." SAMPAI ".tgl_indo("$tgl_2"); ?></b><br>Jl. Ahmad Yani Jakarta Selatan 51527<hr>
	</center>
	</td>
    
  </tr>
</table>
<br>




							

<br>
                    <table class="table1" style="width:100%; font-size:12;">
                      <thead>
                         <tr>
                          <th>No</th>
						  <th>Tanggal</th>
						  <th>Nama Talent</th>
						  <th>Perusahaan</th>
						  <th>Kategori - Bidang</th>
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
  <td colspan='7' align='center'>Tidak Ada Data Yang Tersedia</td>
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
  
  <td><?php echo $r['catatan'] ?></td>  
  <td align="center"><?php echo $r['status'] ?></td>  
  
 </tr>
<?php
 $no++;
  endwhile;
  }
 ?>
 
		
                        
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<hr>

	<br>
	

<br>	
					
				  
            </div>
                </div>
              </div>
			   <div class="clearfix"></div>
	
	</center>
	<table width="100%">
<tr>
<td align="center" style="font-size:12;  border: 1px solid #fff;">Admin
<br><br><br><br><br><br>---------------------------------------
</td>
<td align="center" style="font-size:12;  border: 1px solid #fff;">Pimpinan
<br><br><br><br><br><br>---------------------------------------
</td>

</tr>
</table>
    </td>
  </tr>
</table>
<script>
		window.print();
	</script>
