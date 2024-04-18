<?php
date_default_timezone_set('Asia/Jakarta');
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "20_dblecture_hub";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	echo '';
}
?>



<?php
function hitungHari($awal,$akhir){
$tglAwal = strtotime($awal);
$tglAkhir = strtotime($akhir);
$jeda = abs($tglAkhir - $tglAwal);
return floor($jeda/(60*60*24));
}
?>

<?php
$tbkategori="tbkategori";
$id_kategori="id_kategori";

function KAT($tbkategori,$id_kategori){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbkategori where id_kategori='$id_kategori'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$nama_kategori =$r7["nama_kategori"];
return $nama_kategori ;
 	}
?>

<?php
$tbjenis="tbjenis";
$id_jenis="id_jenis";

function JEN($tbjenis,$id_jenis){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbjenis where id_jenis='$id_jenis'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$jenis =$r7["jenis"];
return $jenis ;
 	}
?>

<?php
$tbvideo="tbvideo";
$id_video="id_video";

function VID($tbvideo,$id_video){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbvideo where id_video='$id_video'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$judul=$r7["judul"];
return $judul;
}
?>
<?php
$tbtalent="tbtalent";
$id_talent="id_talent";

function TAL($tbtalent,$id_talent){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbtalent where id_talent='$id_talent'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$nama_depan=$r7["nama_depan"];
return $nama_depan;
}
?>

<?php
$tbloker="tbloker";
$id_loker="id_loker";

function LOK($tbloker,$id_loker){
global $koneksi;
$query7 = mysqli_query($koneksi, "select * from $tbloker where id_loker='$id_loker'") or die (mysqli_error());
 $r7 = mysqli_fetch_array($query7);
$bidang=$r7["bidang"];
return $bidang;
	}
?>


<!--
< ?php
	$q1 = mysqli_query($koneksi, "SELECT * FROM tbpenjualan") or die (mysqli_error());
	 if(mysqli_num_rows($q1) == 0){ }
	 
	   else
{
	while($d1=mysqli_fetch_array($q1)){
    
$id_penjualan=$d1["id_penjualan"];
$query = mysqli_query($koneksi, "SELECT SUM(sub_total) AS semua_bayar FROM tbpenjualan_detail WHERE id_penjualan='$id_penjualan'") or die (mysqli_error()); 
$r = mysqli_fetch_array($query);		
$semua_bayar=$r['semua_bayar'];

$qqr = mysqli_query($koneksi, "SELECT * FROM tbpenjualan WHERE id_penjualan='$id_penjualan'") or die (mysqli_error()); 
$rr= mysqli_fetch_array($qqr);		
$ongkir=$rr['ongkir'];
$semua_bayar=$ongkir+$semua_bayar;

$queryupdate = mysqli_query($koneksi, "UPDATE tbpenjualan SET total='$semua_bayar' WHERE id_penjualan = '$id_penjualan'");
	}

}

?>

<
?php
	$q1 = mysqli_query($koneksi, "SELECT * FROM tbpembelian") or die (mysqli_error());
	 if(mysqli_num_rows($q1) == 0){ }
	 
	   else
{
	while($d1=mysqli_fetch_array($q1)){
    
$id_pembelian=$d1["id_pembelian"];
$query = mysqli_query($koneksi, "SELECT SUM(sub_total) AS semua_bayar FROM tbpembelian_detail WHERE id_pembelian='$id_pembelian'") or die (mysqli_error()); 
$r = mysqli_fetch_array($query);		
$semua_bayar=$r['semua_bayar'];
$queryupdate = mysqli_query($koneksi, "UPDATE tbpembelian SET total='$semua_bayar' WHERE id_pembelian = '$id_pembelian'");
	}

}

?>
-->

<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<?php
function quickSort(&$arr, $left, $right) {
    if ($left < $right) {
        $pivotIndex = partition($arr, $left, $right);
        quickSort($arr, $left, $pivotIndex - 1);
        quickSort($arr, $pivotIndex + 1, $right);
    }
}

function partition(&$arr, $left, $right) {
    $pivot = $arr[$right];
    $i = $left - 1;
  
    for ($j = $left; $j < $right; $j++) {
        if ($arr[$j] < $pivot) {
            $i++;
            swap($arr, $i, $j);
        }
    }
  
    swap($arr, $i + 1, $right);
    return $i + 1;
}

function swap(&$arr, $i, $j) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
?>


