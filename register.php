<?php
include('include/connection.php'); 
error_reporting(0);
  session_start();

  if(isset($_POST['submit'])){
    
    $fullname = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $user_image = "icons/profile-icon.png";
    
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    
    $result = mysqli_query($conn, $sql);
    
    if($row = mysqli_num_rows($result)>0){
      
      $message = "<h6 style='color:red'>"."Email already exist"."</h6>";
      
    }else{
      
      if(empty($fullname)||empty($email)||empty($password)){
        
        
          $message = "<h6 style='color:red'>"."Plss fill all fields"."</h6>";
      
        
      }else{
        
        
$query = "INSERT INTO `users`(full_name,email, password,profile_image,Bio,location,profession) VALUES ('$fullname','$email','$hash','$user_image','Bio','country','profession')" or die(mysqli_error());
      
          $query_result = mysqli_query($conn, $query);
        
        if($query_result){
          
          $user_sql = "SELECT * FROM `users` WHERE `full_name` = '$fullname'";
    
                $user_result = mysqli_query($conn, $user_sql);
          
          while($user_row = mysqli_fetch_assoc($user_result)){
            
            $_SESSION['user_id'] = $user_row['user_id'];
            
            header('location:login.php');
      
          $message = "<h6 style='color:green'>"."Sign Up successfully"."</h6>";
      
          }
        }
      
      }
      
    }
    
  }




?>


<!DOCTYPE html>
<html>
<head>
	<title>Freeby - Register</title>
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

<meta name="description" content="Register To Freeby and Upload Free blogs and Reviews with other friends">

<meta name="keywords" content="blogs,blog,news,Freeby,Freeby.in,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live">

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

<div class="container">
  <div class="row">
    <div class="col-md-10 offset=md-1">
      <div class="row">
        <div class="col-md-5 register-left">
          <h3>Join FREEBY</h3>
         <p>Go Ahead And Upload Blogs and Reviews.</p>
        </div>
        <div class="col-md-7 register-right">
          <h2><img src="icons/profile-icon.png" height='70px;'></h2>
<?php echo $message; ?>
          <div class="register-form">
        <form method="post" action="register.php">
            <div class="input-group mb-3">
             <div class="input-group-prepend">
              <div class="input-group-text">
               <i class="fas fa-pencil-alt"></i>
              </div>
             </div>
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" aria-label="Text input with checkbox" autocomplete="off" required>
            </div>

            <div class="input-group mb-3">
             <div class="input-group-prepend">
              <div class="input-group-text">
               <i class="fas fa-envelope"></i>
              </div>
             </div>
                <input type="email" placeholder="E-mail" name="email" class="form-control" aria-label="Text input with checkbox" autocomplete="off"  required>
            </div>

            <div class="input-group mb-3">
             <div class="input-group-prepend">
              <div class="input-group-text">
               <i class="fas fa-lock"></i>
              </div>
             </div>
                <input type="password" placeholder="Password" name="password" class="form-control" aria-label="Text input with checkbox" autocomplete="off"  required>
            </div>
            <p style="color: grey;">By signing Up You are agree to <a href="about_info/privacy_policy.php">Privacy Policy</a>,<a href="about_info/terms of use.php">Terms of Use</a></p>
            <center><input class="btn btn-primary" type="submit" name="submit" value="submit"></center>
            <center><p>Already Have an Account? <a href='login.php'>Log In</a> </p></center>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><br><hr><br>

<div class="nav-bottom">
  <ul>
    <li><a class="tab active" href="about_info/about_us.php">About Us</a></li>
    <li><a class="tab"  href="about_info/contact_us.php">Contact Us</a></li>
    <li><a class="tab" href="about_info/privacy_policy.php" >Privacy Policy</a></li>
    <li><a class="tab" href="about_info/terms.php">Terms Of Use</a></li>
  </ul>
</div>
</footer>

</body>
</html>
