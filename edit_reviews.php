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

<html>
<head>
	<link rel="icon" href="icons/freeby.png">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 
 <!----add jquery link----> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    <link rel="stylesheet" href="styles/home_style2.css" media="all"/>
</head>
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

</style>
<body>
<div class="row">
<div class="col-sm-3">

</div>
<div class="col-sm-6">
	<?php
	error_reporting(0);
	if(isset($_GET['edit_review'])){

		$get_id = $_GET['edit_review'];

		$get_post = "select * from reviews where review_id='$get_id'";
		$run_post = mysqli_query($conn,$get_post);
		$row=mysqli_fetch_array($run_post);

		$post_con = $row['description'];
		$profile_image_url = $row['image'];
		$title = $row['title'];

	}
	?>
	<form action="" method="post" enctype="multipart/form-data"><br>
     <div class="edit-main-container">
	<div class="edit-image-container">
		<img src='<?php echo $profile_image_url; ?>' id='profileImage'>
		<button class="select_image">Change Photo</button>
		<span>
			<input type="file" name="imagefile" id="input_file" onchange="readUrl(this);" accept="image/*"></input>
		</span>
	</div>
		<center><h2>Edit Your Post:</h2></center><br>
		<textarea class="form-control" cols="83" rows="4" name="title"><?php echo $title;?></textarea><br>
		<textarea class="form-control" cols="83" rows="4" name="content"><?php echo $post_con;?></textarea><br>
		<center><input type="submit" name="update" value="Update Post" class="btn btn-info"/>
</center>
	</form>
</div>
<div class="col-sm-3">
</div>
</div>
</body>
</html>


<?php 
		if(isset($_POST['update'])){
				$random_number = rand(1,10000);
				$target_dir = "review_image/";
				$name = $_FILES['imagefile']['name'];
				$target_file_name = $target_dir .basename($name).$random_number;
                $profile_image_url = 'review_image/'.$name.$random_number;
             $content = $_POST['content'];
             $content = str_replace("'", "\'", $content);
             $title = $_POST['title'];
             $title = str_replace("'", "\'", $title);
             $blog_image = $_POST['image'];

if (empty($name)) {
	$profile_image_url = $row['image'];
}

			move_uploaded_file($_FILES['imagefile']['tmp_name'],$target_file_name);

		$update_post = "update reviews set description='$content',title='$title',image='$profile_image_url'  where review_id='$get_id'";
		$run_update = mysqli_query($conn,$update_post);

		if($run_update){

		echo "<script>alert('Review has been updated!')</script>";
		echo "<script>window.open('reviews.php','_self')</script>";

		}

		}
?>

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


<?php } ?>
