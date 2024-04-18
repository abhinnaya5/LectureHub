<form role="form" name="form1" class="contact-form row" method="post" action="" enctype="multipart/form-data">
 <!-- About Start -->
    <div class="container-fluid py-5" style="border-top-style:solid;border-color: #f3f4f6;">
        <div class="container py-5" style="padding-top: 0 !important;">
		<div class="text-center mb-5">
                 <h1>Welcome back! Log in to your account.</h1>
            </div>
            <div class="row align-items-center">
			
                <div class="col-lg-5">
				
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="img/course-5.jpg" alt="">
                </div>
                <div class="col-lg-7">
                   
                                
								<div class="form-group">
                                    <input type="text" name="username" class="form-control" style="background-color: #f3f4f6;" value="" placeholder="Username" required="required" />
                                </div>
                               
								<div class="form-group">
                                    <input type="password" name="password" class="form-control" style="background-color: #f3f4f6;" value="" placeholder="Password" required="required" />
                                </div>
								
                                <!--
								<div class="form-group">
                                    <select class="custom-select  border-light" style="height: 47px;">
                                        <option selected>Select a course</option>
                                        <option value="1">Course 1</option>
                                        <option value="2">Course 1</option>
                                        <option value="3">Course 1</option>
                                    </select>
                                </div>
								-->
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" name="Simpan" type="submit">Log In</button>
                                </div>
                           
						<br>

Not a member yet? <a href="index.php?module=signup">Register new account</a>
                </div>
				
            </div>
        </div>
    </div>
    <!-- About End -->
 </form>		
	
<?php
if(isset($_POST['Simpan'])){

$tgl_sekarang=date('d/m/Y');
$tgl_cek=date('d/m/Y');

$username=$_POST['username'];
$password=$_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM tbuser where username='$username' and password='$password'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   
echo"<script>alert('Not Registered.');location.href='$_SERVER[PHP_SELF]?module=signup';</script>";  
	   }
   
   else {
	   
	  
	$no=1;
 $data = mysqli_fetch_array($query);
 	$id_user = $data['id_user'];
	$email = $data['email'];
	$nama = $data['nama'];
	$alamat = $data['alamat'];
	
	$_SESSION['nama_masuk']=$nama;
	$_SESSION['level_masuk']="Member";
	$_SESSION['email_masuk']=$email;
	$_SESSION['alamat_masuk']=$alamat;
	$_SESSION['id_masuk']=$id_user;

	$id_masuk=$_SESSION['id_masuk'];
	

	
		echo "<script>alert('Log in Successfully');location.href='index.php';</script>";
	

	#alert('Selamat Datang $nama Berhasil Login Sebagai $akses ');
   
 } 
 
}

// 
?>	