<?php
include('../include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Freeby</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
	<link rel="icon" href="../icons/freeby.png">    
    
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<meta name="description" content="Contact Freeb.in for any query , help , suggestion">

<meta name="keywords" content="blogs,contact,contact us,contact freeby.in,contact freeby,blog,news,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live,freeb,freeby,freeby.in,freeby.com,freebies,freeb.com,freeby.com">

<meta name="author" content="Manas Makkar">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<style>
  
.bg-theme{background: #4963ad !important;}
.card-contact{margin-left: 30px;height: 100%;}
.card-contact h1{color: #fff;font-size: 30px;position: relative;margin-bottom: 0;margin-bottom: 40px;}
.card-contact h1::before{content: ''; height: 3px; width: 80px; background-color: #fff; position: absolute; bottom: -10px;}
.icon-part{height: 50px;width: 50px;border: 2px solid #fff;display: flex;align-items: center;color: #fff;justify-content: center;font-size: 20px;border-radius: 50%;}

.btn-submit{padding: 8px 25px !important; background-color: #4963ad !important; color: #fff !important; border-radius: 20px !important;}


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

    <body>
        <section class="main-contact-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card py-5 card-body border-0 shadow">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="card card-body card-contact bg-theme">
                                        <h1>Contact Freeby</h1>
                                        <div class="media mb-4 align-items-center">

                                          </div>
                                          <div class="media mb-4 align-items-center">
                                            <div class="media-body">
                                              <h5 class="mt-0 text-white">freeby@freeby.in  </h5>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <form action='' method='post'>
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" name='name' class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                          <label for="mobile">Write</label>
                                          <textarea class="form-control" name='description' placeholder="Write...."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name='email' id="email" placeholder="Email">
                                          </div>
                                          <div class="text-center">
                                              <button type="submit" name='contact' class="btn btn-submit">Submit</button>
                                          </div>
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
<footer>
  
<div class="nav-bottom">
  <ul>
    <li><a class="tab active" href="about_us.php">About Us</a></li>
    <li><a class="tab"  href="contact_us.php">Contact Us</a></li>
    <li><a class="tab" href="privacy_policy.php" >Privacy Policy</a></li>
    <li><a class="tab" href="terms.php">Terms Of Use</a></li>
  </ul>
</div>
</footer>
        
    </body>

</html>
<?php 
if(isset($_POST['contact'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    
    $insert = "INSERT INTO contact_us(name,description,email) VALUES ('$name','$description','$email') ";
    
    $query = mysqli_query($conn,$insert);
    
    if($query){

	echo "<script>alert('Thanks For Contacting Us')</script>";
	echo "<script>window.open('contact_us.php','_self')</script>";

	}
	else {

	echo "<script>alert('You are unable to contact us! Plz Try Again')</script>";
	echo "<script>window.open('signup.php','_self')</script>";
	}
    
}
?>
