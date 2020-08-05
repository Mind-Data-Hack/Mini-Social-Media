<?php 
include("include/connection.php");

if(isset($_GET['delete_post'])){
		
		$post_id = $_GET['delete_post']; 
		
		$delete_post = "delete from blogs where blog_id='$post_id'";
		
		$run_delete = mysqli_query($conn,$delete_post);
		
		if($run_delete){
		echo "<script>alert('A post has been deleted!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		}
		
		
		}

?>