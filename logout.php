<?php
    
    include('include/connection.php');
    
	session_start();
	
	session_unset();
	
	echo "<script>window.open('login.php','_self')</script>";
			
?>
	
