<?php 
include("include/connection.php");

if(isset($_GET['delete_review'])){
		
		$post_id = $_GET['delete_review']; 
		
		$delete_post = "delete from reviews where review_id='$post_id'";
		
		$run_delete = mysqli_query($conn,$delete_post);
		
		if($run_delete){
		echo "<script>alert('A Review has been deleted!')</script>";
		echo "<script>window.open('reviews.php','_self')</script>";
		}
		
		
		}

?>