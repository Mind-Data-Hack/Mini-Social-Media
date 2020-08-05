<?php 
session_start();

include("include/connection.php"); 

	if(isset($_POST['submit'])){
	
	$email = htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
	$password = htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
	
	$select_user = "select * from users where email='$email'";
	
	$result = mysqli_query($conn,$select_user); 
	
    if($row = mysqli_num_rows($result)>0){
      
      while($user_row = mysqli_fetch_assoc($result)){
            
            if (password_verify($password, $user_row['password'])) {
	
	     $_SESSION['email']=$email;
	
	     echo "<script>window.open('index.php','_self')</script>";
	
	 }
	 }
	}
	else {
	echo "<script>alert('incorrect details, try again!')</script>";
	}
	
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Freeby - Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="icons/freeby.png">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<meta name="description" content="Login To Freeby and Upload Free blogs and Reviews with other friends">

<meta name="keywords" content="blogs,Freeby,Freeby.in,blog,news,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live">

<meta name="author" content="Manas Makkar">

<style>
body{
  margin-top: 50px !important;
} 
.register-left{
  text-align: center;
  color: black;
  padding-top: 30px;
}
.register-left p{
  padding: 20px 20px 0;
}
.register-left .btn-primary{
  border-radius: 1.5rem;
  border: none;
  width: 120px;
  background: #f8f8f8;
  font-weight: 600px;
  color: #555;
  margin-top: 20px;
  padding: 10px;
}
.register-left .btn-primary:hover{
  background: grey;
  color: white; 
}
.register-right{
  border-radius: 5%;
}
.register-right h2{
  text-align: center;
}
 .nav-bottom{
    width: 100%;
    bottom: 0px;
    position: relative;
  }
  .nav-bottom ul{
    list-style-type: none;
    height: 50px;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }
  .nav-bottom li{
    float: left;
    width: 25%;
  }
  .nav-bottom li a{
    display: block;
    text-decoration: none;
    text-align: center;
    line-height: 50px;
    color: grey;
    cursor: pointer;
  }
</style>

</head>

<body>
<form action="login.php" method="post">
<div class="container">
  <div class="row">
    <div class="col-md-10 offset=md-1">
      <div class="row">
        <div class="col-md-5 register-left">
          <h3>FREEBY</h3>
         <p>Welcome Back</p>
        </div>
        <div class="col-md-7 register-right">
          <h2><img src="icons/profile-icon.png" height='70px'></h2>
          <div class="register-form">
            <div class="input-group mb-3">
             <div class="input-group-prepend">
              <div class="input-group-text">
               <i class="fas fa-envelope"></i>
              </div>
             </div>
                <input type="email" placeholder="E-mail" name="email" class="form-control" autocomplete="off" required>
            </div>

            <div class="input-group mb-3">
             <div class="input-group-prepend">
              <div class="input-group-text">
               <i class="fas fa-lock"></i>
              </div>
             </div>
                <input type="password" placeholder="Password" name="password" class="form-control" autocomplete="off" required>
            </div>
            <center><input class="btn btn-primary" type="submit" value="submit" name="submit">
              <p style="margin-bottom: 226px;">Don't have an account<a href="register.php">Signup</a></p>
              </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="nav-bottom">
  <ul>
    <li><a class="tab active" href="about_info/about_us.php">About Us</a></li>
    <li><a class="tab"  href="about_info/contact_us.php">Contact Us</a></li>
    <li><a class="tab" href="about_info/privacy_policy.php" >Privacy Policy</a></li>
    <li><a class="tab" href="about_info/terms.php">Terms Of Use</a></li>
  </ul>
</div>
</footer>

</form>
</body>
</html>
