 <form role="form" name="form1" class="contact-form row" method="post" action="" enctype="multipart/form-data">
 <!-- About Start -->
    <div class="container-fluid py-5" style="border-top-style:solid;border-color: #f3f4f6;">
        <div class="container py-5" style="padding-top: 0 !important;">
		<div class="text-center mb-5">
                <h1>Become a part of Videolectures community</h1>
            </div>
            <div class="row align-items-center">
			
                <div class="col-lg-5">
				
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="img/course-4.jpg" alt="">
                </div>
                <div class="col-lg-7">
                   
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" style="background-color: #f3f4f6;" value="" placeholder="Name" required="required" />
                                </div>
								<div class="form-group">
                                    <input type="text" name="username" class="form-control" style="background-color: #f3f4f6;" value="" placeholder="Username" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" style="background-color: #f3f4f6;" value="" placeholder="Email" required="required" />
                                </div>
								<div class="form-group">
                                    <input type="password" name="password" class="form-control" style="background-color: #f3f4f6;" value="" placeholder="Password" required="required" />
                                </div>
								<div class="form-group">
                                    <input type="password" name="repassword" class="form-control" style="background-color: #f3f4f6;"  value="" placeholder="Repeat Password" required="required" />
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
                                    <button class="btn btn-dark btn-block border-0 py-3" name="Simpan" type="submit">Sign Up Now</button>
                                </div>
                           
							
						<br>
Already have an account? <a href="index.php?module=signin">Sign in</a>
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
  
  if($password==$repassword){
  
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbuser VALUES('','$nama','$username', '$email', '$password', '$repassword', 'avatar3.png', 'Member')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');  

   
   echo"<script>alert('Registered Successfully');location.href='$_SERVER[PHP_SELF]?module=signin';</script>";
   
   
   } else{
   echo"<script>alert('Registration Failed');location.href='$_SERVER[PHP_SELF]?module=signup';</script>";

   }
   
   }
  else{
	  
	 echo"<script>alert('Re-password Wrong !');location.href='$_SERVER[PHP_SELF]?module=signup';</script>";  
	  
  }
   
   
   
  }
 ?>	