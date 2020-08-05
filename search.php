<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
?>
<html>
<head>

   <title>Search - Freeby</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="icons/freeby.png">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<meta name="description" content="Free Reviewing Website where you can register and upload reviews on anything with another friends.">

<meta name="keywords" content="freeb,freeby,freeby.in,freeby.com,freebies,freeb.com,freeby.com,blogs,blog,news,updates,corona,covid,updates, register,login,upload,id,reviews,movie reviews,users,friends,people,live,search, find, find people, searc people">

<meta name="author" content="Manas Makkar">

<style>
	 .nav-bottom{
		width: 100%;
		bottom: 0px;
		position: fixed;
	}
	.nav-bottom ul{
		list-style-type: none;
		height: 50px;
		background-color: #292828;
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
		color: white;
		cursor: pointer;
	}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  color: white;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}
.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 2px;
  margin-top: 13px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 2px;
  margin-top: 13px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 100px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

</head>
<body>

<div class="topnav" style="background-color: #292828;color: white;width: 100%;">
  <a style="width: 100%;color: white;text-align:  center;" >FREEBY</a>
</div>

<div class="row" style="width: 100%;">
	<div class="col-sm-12">
		<center><h2>Find New Peoples</h2></center><br><br>
		<div class="row">
			<center>
			<form class="search_form" action="" style="width: 100%;">
			  <input type="text" placeholder="Search Friends" name="search_user">
			  <button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
			</form>
		</center>
			</div>
			<div class="col-sm-4">
			</div>
		</div><br><br>
<?php 
	global $conn;

	if(isset($_GET['search_user_btn'])){
	$search_query = htmlentities($_GET['search_user']);
	$get_user = "select * from users where full_name like '%$search_query%'";
	}
	else{
	$get_user = "select * from users";
	}

	$run_user = mysqli_query($conn,$get_user);

	while($row_user=mysqli_fetch_array($run_user)){

		$user_id = $row_user['user_id'];
		$f_name = $row_user['full_name'];
		$user_image = $row_user['profile_image'];

		//now displaying all at once

		echo "
		<div class='row'>
			<div class='col-sm-3'>
			</div>

			<div class='col-sm-6'>

			<div class='row' id='find_people'>
			<div class='col-sm-4'>
			<a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?user_profile=$user_id'>
			<img class='img-circle' src='$user_image' width='150px' height='140px' style='float:left; margin:1px;'/>
			</a>
			</div><br><br>
			<div class='col-sm-6'>
			<a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?user_profile=$user_id'>
			<strong><h2>$f_name</h2></strong>
			</a>
			</div>
			<div class='col-sm-3'>
			</div>

			</div>

			</div>
			<div class='col-sm-4'>
			</div>
		</div><br>
		";

	}
?>
	</div>
</div>

<div class="nav-bottom" >
	<ul style="background-color: #292828;color: white;">
		<li><a class="tab active" href="index.php"><i class="fa fa-home"></i></a></li>
		<li><a class="tab"  href="search.php"><i class="fas fa-search"></i></a></li>
		<li><a class="tab" href="reviews.php" ><i class="fa fa-thumbs-up"></i></a></li>
		<li><a class="tab" href="my_profile.php"><i class="fas fa-user"></i></a></li>
	</ul>
</div>

    </div>

</body>
</html>
