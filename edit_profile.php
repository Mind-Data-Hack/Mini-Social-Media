<?php 
include('include/connection.php');
error_reporting(0);
session_start();
$userId = $_SESSION['email'];

$sql = "SELECT * FROM `users` WHERE `email` = '$userId'";
		
		$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_assoc($result)){
             $fullname = $row['full_name'];
             
             $userId = $row['user_id'];
             
             $email = $row['email'];

             $password = $row['password'];

             $bio = $row['Bio'];

             $profession = $row['profession'];

             $country = $row['location'];

             $profileImage = $row['profile_image'];


               if($profileImage == null){
               $userProfileImage = "<img src='temp/profile_image.jpg' id='profileImage'/>";
               }else{
               $userProfileImage = "<img src='$profileImage' id='profileImage' />";
               }


			}

			if (isset($_POST['submit'])) {
				$random_number = rand(1,10000);
				$target_dir = "profile_image/";
				$name = $_FILES['imagefile']['name'];
				$target_file_name = $target_dir .basename($name).$random_number;
                $profile_image_url = 'profile_image/'.$name.$random_number;

             $fullname = $_POST['full_name'];
             $profession = $_POST['profession'];
             $bio = $_POST['bio'];
             $country = $_POST['country'];

			move_uploaded_file($_FILES['imagefile']['tmp_name'],$target_file_name);

			if($name == null || empty($fullname) || empty($profession) || empty($bio) || empty($country)){
				
				
					$message = "<h6>"."Plss fill all fields"."</h6>";
			
				
			}else{
				
				
			  				
		$query = "UPDATE `users` SET `full_name`='$fullname',`profession`='$profession',
		
		`profile_image`='$profile_image_url',`location`='$country',`Bio`='$bio' WHERE `user_id`='$userId'";	
				
		$query_result =mysqli_query($conn, $query);
		
		   if($query_result){
			   
			 echo"<script>window.open('index.php','_self')</script>";
			   
			  
			
		   }else{
			   
			   echo "Error";
			
		   }
			
}			}
?>

<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="icons/freeby.png">

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 
 <!----add jquery link----> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

	<title></title>

<style>
	*{
		margin: 0;
		padding: 0;
		box-sizing:border-box;
	}
	.edit-menu-container{
		width: 100%;
	}
	.edit-menu-container ul{
		width: 100%;
		height: 50px;
		list-style-type: none;
		overflow: hidden;
		background-color: #f0f0f0;
	}
	.edit-menu-container .edit-icon{
		float: left;
		width: 15%;
	}
	.edit-menu-container .edit-name{
		float: left;
		width: 70%;
	}
	.edit-menu-container .edit-icon a{
		display: block;
		text-align: center;
		font-size: 17px;
		line-height: 50px;
		cursor: pointer;
	}
	.edit-menu-container .edit-name a{
		display: block;
		text-align: start;
		font-size: 17px;
		line-height: 50px;
	}
	.edit-main-container{
		width: 100%;
		max-width: 768px;
		margin: auto;
	}
	.edit-image-container{
		width: 100%;
		max-width: 100px;
		margin: auto;
		padding-top:20px;
		padding-bottom: 20px;
	}
		.edit-image-container img{
		width: 100px;
		height: 100px;
		border-radius: 50%;
	}
	.edit-image-container button{
		width: 110px;
	    border:none;
	    margin-top: 5px;
	    background-color: white;
	    color: #3897f0;
	    font-size: 16px;
	}
	span input[type=file]{
        opacity: 0;
	}
	.edit-profile-detail-container{
		width: 100%;
		padding: 10px;
	}
	.edit-profile-detail-container input[type=text]{
		width: 100%;
		padding: 5px;
		margin-top: 8px;
		margin-bottom: 8px;
		border:none;
		border-bottom:1px solid #f0f0f0;
	}
	.edit-profile-detail-container label{
		padding: 5px;
		margin-top: 8px;
	}
	.edit-tool-container{
		width: 100%;
		border: 1px solid #ccc;
	}
	.edit-tool-container h6{
		font-size: 17px;
		text-align: center;
		padding: 5px;
		color: black;
	}
	h6{
		font-size: 17px;
		text-align: center;
		color: red;
	}
</style>

</head>

<body>

<div class="edit-menu-container">
		<form action="edit_profile.php" method="post" enctype="multipart/form-data">
	<ul>
		<li class="edit-icon"><a href="index.php"><i class="fas fa-times"></i></a></li>
		<li class="edit-name"><a>Edit Profile</a></li>
		<li class="edit-icon"><button type="submit" name="submit" style="border:none;background-color:#f0f0f0;"><a style="color: #3897f0;"><i class="fas fa-check"></i></a></button></li>
	</ul>
</div>

<div class="edit-main-container">
	<div class="edit-image-container">
		<?php echo $userProfileImage; ?>
		<button class="select_image">Change Photo</button>
		<span>
			<input type="file" name="imagefile" id="input_file" onchange="readUrl(this);" accept="image/*"></input>
		</span>
	</div>

       <?php echo $message; ?>

	<div class="edit-profile-detail-container">
		<label>Name</label>
		<input type="text" name="full_name" placeholder="Full Name" value="<?php echo $fullname; ?>">
		<label>Bio</label>
		<input type="text" name="bio" placeholder="Bio" value="<?php echo $bio; ?>">
	    <label>Profession</label>
		<input type="text" name="profession" placeholder="Profession" value="<?php echo $profession; ?>">
	    <label>Country</label>
		<input type="text" name="country" placeholder="Country" value="<?php echo $country; ?>">
	</div>
</form>
</div>

<script>
	 $(document).ready( function(){
		
         		
     
	    $('.select_image').on('click', function(e){
		   
		   e.preventDefault();
		   
		   
		    $('#input_file').trigger('click');	
			
	     });
		 
		
	   
	  });

	 function readUrl(input){
         if(input.files && input.files[0]){
           var reader = new FileReader();
           reader.onload = function(e){
            $('#profileImage').attr('src',e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
         }
	 }
</script>

</body>
</html>