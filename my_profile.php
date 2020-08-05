<?php
session_start();
include("include/connection.php");
?>
<?php   
  if(!isset($_SESSION['email'])){
  echo "<script>alert('Register Please!')</script>";
  echo "<script>window.open('register.php','_self')</script>";
  }
     else{
?>

 <?php 
      $user = $_SESSION['email'];
      $get_user = "select * from users where email='$user'"; 
      $run_user = mysqli_query($conn,$get_user);
      $row=mysqli_fetch_array($run_user);
          
      $user_id = $row['user_id'];
      $u_id = $row['user_id'];
      $name = $row['full_name'];
      $image = $row['profile_image'];
      $bio = $row['Bio'];
      $profession = $row['profession'];
      $country = $row['location'];
      $date = $row['date'];

      ?>

	<!DOCTYPE html>
<html>
<head>
<title><?php echo $name; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="icons/freeby.png">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="description" content="Free Blogging and Reviewing Website where you can register and upload a blog with reviews with another friends.">

<meta name="keywords" content="freeb,freeby,freeby.in,freeby.com,freebies,freeb.com,freeby.com,blogs,blog,news,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live">

<meta name="author" content="Manas Makkar">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: white;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: white;
  float: left;
  border: 1px solid #00bcd4;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color: black;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: white;
  color: black;
}

.tab button.active:hover {
  background-color: #ddd;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}
</style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a onclick="w3_close()" class="w3-hide-large w3-right w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <center><img src="<?php echo $image; ?>" style="width:100%;" class="w3-round"><br><br></center>
    <center><h4><b><?php echo $name; ?></b></h4>
    <p class="w3-text-grey"><?php echo $bio; ?></p></center>
  </div>
  <div class="w3-bar-block">
    <a style="text-transform: capitalize;" class="w3-bar-item w3-padding"><i class="fa fa-flag-o w3-margin-right"></i><?php echo $country; ?></a> 
    <a style="text-transform: capitalize;" class="w3-bar-item w3-padding"><i class="fa fa-graduation-cap fa-fw w3-margin-right"></i><?php echo $profession; ?></a> 
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-handshake-o ">Join On <?php echo $date; ?></i>
  </div><hr>
<?php 
                    $user = $_SESSION['email'];
					$get_user = "select * from users where email='$user'";
					$run_user = mysqli_query($conn,$get_user);
					$row=mysqli_fetch_array($run_user);

					$userown_id = $row['user_id'];

					if($user_id == $userown_id){
						echo"<a style='padding: 12px;' href='edit_profile.php' class='btn btn-success'/><button style='background:#607d8b;color:#fff;'>Edit Profile</button></a>
						<a style='padding: 12px;' href='logout.php' class='btn btn-success'/><button style='background:#607d8b;color:#fff;'>Logout</button></a>
            ";
					}
?>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a><img src="<?php echo $image; ?>" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
</header>


   <div class="tab" style="width: 100%;">
  <button style="width: 50%;" class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Blogs</button>
  <button  style="width: 50%;" class="tablinks" onclick="openCity(event, 'Paris')">Reviews</button>
</div>

<div id="London" class="tabcontent">
      <div class='w3-row-padding'>
<?php
				global $conn;

				if(isset($_GET['user_profile'])){
				$u_id = $_GET['user_profile'];
				}
				$get_posts = "select * from blogs where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

				$run_posts = mysqli_query($conn,$get_posts);

				while($row_posts=mysqli_fetch_array($run_posts)){

				$post_id = $row_posts['blog_id'];
				$user_id = $row_posts['user_id'];
			    $title = substr($row_posts['title'],0,30);
                $content = substr($row_posts['description'],0,30); 
				$upload_image = $row_posts['blog_image'];
				$post_date = $row_posts['date'];

				//getting the user who has posted the thread

				$user = "select * from users where user_id='$user_id'";

				$run_user = mysqli_query($conn,$user);
				$row_user=mysqli_fetch_array($run_user);

                     $user = $_SESSION['email'];
					$get_user = "select * from users where email='$user'";
					$run_user = mysqli_query($conn,$get_user);
					$row=mysqli_fetch_array($run_user);

					$userown_id = $row['user_id'];

					if($user_id == $userown_id){

        if($content){

    echo" 

    <div class='w3-third w3-container w3-margin-bottom'>
      <a href='see_post.php?see_post=$post_id'><img src='$upload_image' style='width:100%;height:300px;'></a>
      <div class='w3-container w3-white'>
        <a href='see_post.php?see_post=$post_id'><p><b>$title</b></p></a>
        <p>$content</p>
        <center><a href='edit_post.php?edit_post=$post_id' class='btn btn-success'/><button style='    background: grey;color:#fff;'>Edit</button></a>
        <a href='delete_post.php?delete_post=$post_id' class='btn btn-success'/><button style='background:#d9534f;color:#fff;'>Delete</button></a>
      </center>
      </div>
    </div>
";
					}
				}
}
?>
</div>
</div>

<div id="Paris" class="tabcontent">
     <div class='w3-row-padding'>
<?php
				global $conn;

				if(isset($_GET['user_profile'])){
				$u_id = $_GET['user_profile'];
				}
				$get_posts = "select * from reviews where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

				$run_posts = mysqli_query($conn,$get_posts);

				while($row_posts=mysqli_fetch_array($run_posts)){

				$post_id = $row_posts['review_id'];
				$user_id = $row_posts['user_id'];
				$title = substr($row_posts['title'],0,30);
                $content = substr($row_posts['description'],0,30);  
				$upload_image = $row_posts['image'];
				$post_date = $row_posts['date'];

				//getting the user who has posted the thread

				$user = "select * from users where user_id='$user_id'";

				$run_user = mysqli_query($conn,$user);
				$row_user=mysqli_fetch_array($run_user);


        if($content){

    echo" 

    <div class='w3-third w3-container w3-margin-bottom'>
      <a href='see_review.php?see_review=$post_id'><img src='$upload_image' style='width:100%;height:300px;''></a>
      <div class='w3-container w3-white'>
        <a href='see_review.php?see_review=$post_id'><p><b>$title</b></p></a>
        <p>$content</p>
         <center><a href='edit_reviews.php?edit_review=$post_id' class='btn btn-success'/><button style='    background: grey;color:#fff;'>Edit</button></a>
        <a href='delete_reviews.php?delete_review=$post_id' class='btn btn-success'/><button style='background:#d9534f;color:#fff;'>Delete</button></a>
      </center>
      </div>
    </div>

";
} 
}
?>
</div>
	</div>

</div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>

<?php } ?>