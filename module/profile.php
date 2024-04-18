<?php
$id_masuk=$_SESSION['id_masuk'];
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id_masuk'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $id_user=$r1['id_user'];
   $nama=$r1['nama'];
   $email=$r1['email'];
   $password=$r1['password'];
   $username=$r1['username'];
   }

?>
 <form role="form" name="form1" class="contact-form row" method="post" action="" enctype="multipart/form-data">
 <!-- About Start -->
    <div class="container-fluid py-5" style="border-top-style:solid;border-color: #f3f4f6;">
        <div class="container py-5" style="padding-top: 0 !important;">
		<div class="text-center mb-5">
                <h1>Your Profile</h1>
            </div>
            <div class="row align-items-center">
			
                <div class="col-lg-5">
				
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="img/course-2.jpg" alt="">
                </div>
                <div class="col-lg-7">
                   
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" style="background-color: #f3f4f6;"  value="<?php echo"$nama";?>" placeholder="Name" required="required" />
                                </div>
								<div class="form-group">
                                    <input type="text" name="username" class="form-control" style="background-color: #f3f4f6;"  value="<?php echo"$username";?>" placeholder="Username" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" style="background-color: #f3f4f6;"  value="<?php echo"$email";?>" placeholder="Email" required="required" />
                                </div>
								<div class="form-group">
                                    <input type="password" name="password" class="form-control" style="background-color: #f3f4f6;"  value="<?php echo"$password";?>" placeholder="Password" required="required" />
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
                                    <button class="btn btn-dark btn-block border-0 py-3" name="Simpan" type="submit">Update</button>
                                </div>
                           
							
						<br>

                </div>
				
            </div>
        </div>
    </div>
    <!-- About End -->
 </form>	
	
<?php if(isset($_POST['Simpan'])){
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];
  $repassword=$_POST['repassword'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  
  $queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET 
                           nama='$nama',
						   email='$email',
						   username='$username',
						   password='$password'
             WHERE id_user = '$id_user'");

   if($queryupdate){
   // header('location: menu.php');
   
   echo"<script>alert('Profile Changed Successfully');location.href='$_SERVER[PHP_SELF]?module=profile';</script>";
   
   
   } else{
   echo"<script>alert('Profile Changed Failed');location.href='$_SERVER[PHP_SELF]?module=profile';</script>";

   }
   
   
   
  }
 ?>	