 <?php
	
    include('include/connection.php'); 
	
	session_start();
?>
<?php 
if(isset($_GET['see_review'])){

  global $conn;

  $get_id = $_GET['see_review'];

  $get_posts = "select * from reviews where review_id='$get_id'";

  $run_posts = mysqli_query($conn,$get_posts);

  $row_posts=mysqli_fetch_array($run_posts);

    $post_id = $row_posts['review_id'];
    $user_id = $row_posts['user_id'];
    $title = $row_posts['title']; 
    $content = $row_posts['description'];
    $upload_image = $row_posts['image'];
    $post_date = $row_posts['date'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
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

<meta name="description" content="<?php echo $content; ?>">

<meta name="keywords" content="blogs,<?php echo $title; ?>,<?php echo $content; ?>,blog,news,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live,freeb,freeby,freeby.in,freeby.com,freebies,freeb.com,freeby.com">

<meta name="author" content="Manas Makkar">

<style>
	 .edit-image-container{
		width: 100%;
		max-width: 100px;
		margin: auto;
		margin-right: 50%;
		padding-top:20px;
		padding-bottom: 20px;
	}
		.edit-image-container img{
		width: 200px;
		height: 100px;
	}
	span input[type=file]{
        opacity: 0;
	}

   .home-main-container{
    width: 100%; 
    height: 100%;
    max-width: 500px;
    margin: auto;
    overflow: hidden;
    margin-top: 0px;
    margin-bottom: 50px; 
  }
    .menu-main-container{
    width: 100%;
  }
  .menu-main-container ul{
        list-style-type: none;
        height: 40px;
        background-color: grey;
  }
  .menu-main-container .menu-image-icon{
        float: left;
        width: 20%;
    }
    .menu-main-container .menu-name-icon{
        float: left;
        width: 50%;
    }
    .menu-main-container .menu-menu-icon{
       float: left;
       width: 20%;        
    }
    .menu-image-icon img{
       width:30px;
       height: 30px;
       margin-top: 5px;
       margin-left: 5px;
       border-radius: 50px; 
    }
    .menu-name-icon a{
      display: block;
      text-align: start;
      line-height: 40px;
        font-size: 17px;
    }
    .menu-menu-icon a{
      display: block;
      text-align: center;
      line-height: 40px;
        font-size: 17px;
    }
    .main-post-container {
      width: 100%;
      height: 300px;
    }
    .main-post-container img{
      width: 100%;
      height: 100%;
    }
    .comment-icon-container{
      width: 100%;
    }
    .comment-icon-container ul{
      list-style-type: none;
      height: 50px;
      background-color: white;
    }
    .comment-icon-container ul{
      list-style-type: none;
      height: 50px;
      background-color: white;
    }
    .comment-icon-container input{
      float: left;
      margin-left: -20px;
      margin-top: 13px;
      width: 70%;
    }
    .comment-icon-container button{
      float: right;
      margin-right: 20px;
      margin-top: 13px;
      width: 26%;
    }
    .comment-home-container{
    display: none;
    position: relative;
  }
  .comment-home-container:target{
    width: 100%;
    display: ;
    height: 100%;
    background-color: white;
  }
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

    .comment-body-container{
    width: 100%;
    max-width: 768px;
    margin: auto;
  }
  .comment-nav-container{
    width: 100%;
    max-width: 768px;
    margin: auto;   
    top: 0;
    position: fixed;
    background-color: #f0f0f0;
    border-bottom: 1px solid #ccc;
  }
  .comment-nav-container ul{
    width: 100%;
    height: 50px;
    list-style-type: none;
    overflow: hidden;
    background-color: #f0f0f0;
  }
  .comment-nav-container .comment-icon{
    float: left;
    width: 20%;
  }
  .comment-nav-container .comment-name{
    float: left;
    width: 80%;
  }
  .comment-nav-container .comment-icon a{
    display: block;
    text-align: center;
    font-size: 17px;
    line-height: 50px;
    cursor: pointer;
  }
  .comment-nav-container .comment-name a{
    display: block;
    text-align: start;
    font-size: 17px;
    line-height: 50px;
  }
  .comment-bottom-container{
    width: 100%;
    max-width: 768px;
    margin: auto;   
    bottom: 0;
    position: fixed;
    background-color: #f0f0f0;
  }
  .comment-bottom-inner-container{
    float: left;
  }
  .comment-bottom-inner-container.image{
    width: 20%;
  }
  .comment-bottom-inner-container.comment{
    width: 60%;
  }
  .comment-bottom-inner-container.submit{
    width: 20%;
  }
  .comment-bottom-inner-container img{
    width: 40px;
    height: 40px;
    margin-top: 5px;
    margin-left: 10%;
    border-radius: 50px;
    background-color: #f0f0f0;
  }
  .comment-bottom-inner-container input[type=text]{
      
      width:100%;
      padding:8px;
      margin-top:8px;
      display:inline-block;
      box-sizing:border-box;
      font-size:16px;
      border:none;
      background-color:#f0f0f0;
      
    }
    .comment-bottom-inner-container button{
      
      width:100%;
      padding:8px;
      margin-top:5px;
      font-size:15px;
      border:none;
      background-color:#f0f0f0;
      color:#3897f0; 
    }
    .comment-main-container{
      width: 100%;
      margin-top: 60px;
    }
    .comment-post-container{
       width: 100%;
       height: 50px;
       border-bottom: 1px solid #ccc;
    }
    .comment-inner-container{
    float: left;
    }
    .comment-inner-container.image{
    width: 20%;
    }
    .comment-inner-container.name{
    width: 80%;
    }
    .comment-inner-container img{
    width: 40px;
    height: 40px;
    margin-top: 5px;
    margin-left: 10%;
    border-radius: 50px;
  }
  .comment-comment-container{
       width: 100%;
       height: 50px;
    }
    .comment-comment-inner-container{
    float: left;
    }
    .comment-comment-inner-container.image{
    width: 20%;
    }
    .comment-comment-inner-container.name{
    width: 70%;
    }
    .comment-comment-inner-container.like{
    width: 10%;
    }
    .comment-comment-inner-container img{
    width: 40px;
    height: 40px;
    margin-top: 5px;
    margin-left: 10%;
    border-radius: 50px;
  }
  .comment-time-container{
    float: left;
    line-height: 30px;
    text-align: left;
  }
  .comment-time-container .comment-like{
       font-size: 14px;
       line-height: 30px;
       text-align: left;
  }

  @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

.detailBox {
    width:320px;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #292828;">
  <a style="width:100%;text-align: center;" class="navbar-brand">FREEBY</a>
  </button>
</nav>

<?php 
if(isset($_GET['see_review'])){

  global $conn;

  $get_id = $_GET['see_review'];

  $get_posts = "select * from reviews where review_id='$get_id'";

  $run_posts = mysqli_query($conn,$get_posts);

  $row_posts=mysqli_fetch_array($run_posts);

    $post_id = $row_posts['review_id'];
    $user_id = $row_posts['user_id'];
    $title = $row_posts['title']; 
    $content = $row_posts['description'];
    $upload_image = $row_posts['image'];
    $post_date = $row_posts['date'];

    //getting the user who has posted the thread
    $user = "select * from users where user_id='$user_id'";

    $run_user = mysqli_query($conn,$user);
    $row_user=mysqli_fetch_array($run_user);
        
    $first_name = $row_user['full_name'];
    $user_image = $row_user['profile_image'];

    if($content){

      echo "
      <div class='comment-body-container'>

        <div class='comment-main-container'>

        <center><h3>$title</h3></center>

        <div class='comment-post-container'>      
        <center> 
        <img src='$upload_image' style='margin-top:15%;margin-bottom:10px;width:100%;height:100%;'>
         </center>
  <div class='alert alert-dark' style='margin-bottom:65px;text-transform: capitalize;'>
     $content
  </div>


  
          </div>
    </div>
 </div>


</div>
</div>


      ";
  }
}
?>

<div class="nav-bottom">
  <ul style="background-color: #292828;color: white;">
    <li><a class="tab active" href="index.php"><i class="fa fa-home"></i></a></li>
    <li><a class="tab" href="search.php"><i class="fas fa-search"></i></a></li>
    <li><a class="tab" href="reviews.php" ><i class="fa fa-thumbs-up"></i></a></li>
    <li><a class="tab" href="my_profile.php"><i class="fas fa-user"></i></a></li>
  </ul>
</div>

    </div>


</body>
</html>