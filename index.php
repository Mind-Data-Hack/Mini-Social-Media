<?php
session_start();
include("include/connection.php");
?>
<?php 
      $user = $_SESSION['email'];
      $get_user = "select * from users where email='$user'"; 
      $run_user = mysqli_query($conn,$get_user);
      $row=mysqli_fetch_array($run_user);
          
      $userId = $row['user_id'];
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
  <title>Freeby</title>
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

<meta name="description" content="Free Blogging and Reviewing Website where you can register and upload a blog with reviews with another friends.">

<meta name="keywords" content="blogs,blog,news,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live,freeb,freeby,freeby.in,freeby.com,freebies,freeb.com,freeby.com">

<meta name="author" content="Manas Makkar">

<script data-ad-client="ca-pub-5344804165314174" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

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
        width: 70%;
    }
    .menu-main-container .menu-menu-icon{
       float: left;
       width: 0%;        
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
  }
  .comment-home-container:target{
    width: 100%;
    display: inherit;
    height: 100%;
    top: 0px;
    position: fixed;
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
  background-color: #00bcd4;
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
  background: var(--gray);
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

<div class="topnav" style="background-color: #292828;color: white;">
  <a style="color: white;" >FREEBY</a>
  <div class="search-container">
    <form class="search_form" action="" >
        <input type="text" placeholder="Search..." name="search_user" style='width:170px;'>
        <button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
      </form>
  </div>
</div>
<?php 
  global $conn;

  if(isset($_GET['search_user_btn'])){
  $search_query = htmlentities($_GET['search_user']);
  $get_user = "select * from blogs where title like '%$search_query%'";

  $run_user = mysqli_query($conn,$get_user);

  while($row_posts=mysqli_fetch_array($run_user)){

    $post_id = $row_posts['blog_id'];
    $user_id = $row_posts['user_id'];
    $title = substr($row_posts['title'],0,30);
    $content = substr($row_posts['description'],0,30);
    $image = $row_posts['blog_image'];
    $post_date = $row_posts['date'];

    //getting the user who has posted the thread

    $user = "select * from users where user_id='$user_id'";

    $run_user = mysqli_query($conn,$user);
    $row_user=mysqli_fetch_array($run_user);

    $full_name = $row_user['full_name'];
    $user_image = $row_user['profile_image'];
      

    //now displaying all at once

    echo "
        <div id='Home' class='container actives' style='margin-top:20px;'>
     <div class='home-main-container'>
     <div class='menu-main-container'>
        <ul>
    <li class='menu-image-icon' style='color:white;width:20%;'><a  href='user_profile.php?user_profile=$user_id'><img src='$image'></a></li>
    <li class='menu-name-icon'><a href='user_profile.php?user_profile=$user_id' class='user_button' data-username='' style='color:white;width:70%;'>$full_name</a></li>
          </ul>
      </div>
      <div class='main-post-container'>
        <img src='$image'>
      </div>

      <div class='comment-icon-container' style='margin-top:3px;'>
        <ul style='background-color:#f8f9faed;'>
          <p class='w3-center' style='float:left;margin-top:6px;'>$title</p>
          <a href='see_post.php?see_post=$post_id'><button type='button' style='float:right;margin-top:6px;' class='btn btn-info btn-sm'>More</button></a>
          </ul>
      </div>

     </div>
     </div>
    ";
}
  }
?>
<form action="index.php" method="post" enctype="multipart/form-data">
<div class="card">
  <div class="card-body" style="padding: 0px;">

<div class="input-group mb-3" style="margin-top: 12px;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
  </div>
  <input type="text" style="text-transform: capitalize;" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required autocomplete="off">
</div>

    <textarea style="text-transform: capitalize;" class="form-control" id="content" rows="4" name="content" placeholder="Upload A Post?" required autocomplete="off"></textarea><br/>
   </div>

 <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="image" id="inputGroupFile02"  onchange="readUrl(this);" accept="image/*" required>
    <label class="custom-file-label" name="upload_image" for="inputGroupFile02">Select Picture</label>
  </div>
  <div class="input-group-append">
    <button type="button" class="input-group-text" data-toggle="modal" data-target="#exampleModal" id="">Preview</button>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <center><img src="icons/sushant.png" id="profileImage" style='height:450px;width:100%;'></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php   
  if(!isset($_SESSION['email'])){
    echo"
 <a href='register.php'><button type='button' class='btn btn-success' style='width: 40%;margin-bottom:7px;margin-left: 30%;'>Register To Post</button></a>
     ";
  }
     else{
?>
<button type="submit" name="blog" class="btn btn-success" style="width: 20%;margin-bottom:7px;margin-left: 40%;">POST</button>

<?php } ?>
</div>

</form>

           <?php 

 $page_number = (isset($_GET['page'])AND !empty($_GET['page']))? $_GET['page']:1;
$pagination_buttons = 1;
$per_page_records = 60;

   $query = "select * from blogs";
  
    $result = mysqli_query($conn, $query);
  
    // Count the total records
    $total_posts = mysqli_num_rows($result);
  
    //Using ceil function to divide the total records on per page
    $rows = ceil($total_posts / $per_page_records);
  
  $total_pages = ceil($rows/$per_page_records);
  $pagination = "";
  $pagination .= '<nav aria-label="">';
  $pagination .= '<ul class="pagination">';

    if ($page_number < 1) {
      $page_number = 1;
    }elseif ($page_number > $rows) {
       $page_number = $rows;
    }

    $half = floor($pagination_buttons/2);

     if ($page_number < $pagination_buttons AND ($rows == $pagination_buttons OR $rows > $pagination_buttons)) {
      
   for ($i=1; $i<=$pagination_buttons ; $i++) { 
     if ($i == $page_number) {
       $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li>';
     }else{
      $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
     }
   }
   if ($rows > $pagination_buttons) {
     $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.($pagination_buttons+1).'">&raquo;</a></li>';
   }
 }elseif ($page_number >= $pagination_buttons AND $rows > $pagination_buttons) {
     
if (($page_number+$half) >= $rows) {
       $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.($rows-$pagination_buttons).'">&laquo</a></li>';
     for ($i=($rows-$pagination_buttons)+1; $i <=$rows ; $i++) { 
            if ($i == $page_number) {
       $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li>';
     }else{
      $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
     }
     }
}
   elseif (($page_number+$half)<$rows) {
     $pagination .= '<li class="page-item" ><a class="page-link" href="index.php?page='.(($page_number-$half)-1).'">&laquo;</a></li>';
     for ($i=($page_number-$half); $i <=($page_number+$half) ; $i++) { 
        if ($i == $page_number) {
          $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li>';
        }else{
          $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
        }
      } 
      $pagination .= '<li class="page-item"><a class="page-link" href="index.php?page='.(($page_number+$half)+1).'">&raquo; </a></li>';
   }
}

  $start_from = ($page_number-1) * $per_page_records;

  $get_ads = "select * from blogs ORDER by 1 DESC LIMIT $start_from, $per_page_records";

  $run_ads = mysqli_query($conn,$get_ads);

  while($row_ads=mysqli_fetch_array($run_ads)){
  $blog_id = $row_ads['blog_id'];
  $user_id = $row_ads['user_id'];
  $blog_image = $row_ads['blog_image'];
  $title = substr($row_ads['title'],0,20);
  $description = substr($row_ads['description'],0,30);              
  $date = $row_ads['date'];

    $user = "select * from users where user_id='$user_id'";
    $run_user = mysqli_query($conn,$user);
    $row_user=mysqli_fetch_array($run_user);
    $user_id = $row_user['user_id'];
    $full_name = $row_user['full_name'];
    $image = $row_user['profile_image'];   

    if($description && $blog_image){

      echo "

      <div id='Home' class='container actives' style='margin-top:20px;'>
     <div class='home-main-container'>
     <div class='menu-main-container'>
        <ul>
    <li class='menu-image-icon' style='color:white;width:20%;'><a  href='user_profile.php?user_profile=$user_id'><img src='$image'></a></li>
    <li class='menu-name-icon'><a href='user_profile.php?user_profile=$user_id' class='user_button' data-username='' style='color:white;width:70%;'>$full_name</a></li>
          </ul>
      </div>
      <div class='main-post-container'>
        <img src='$blog_image'>
      </div>

      <div class='comment-icon-container' style='margin-top:6px;'>
        <ul style='background-color:#f8f9faed;'>
          <p class='w3-center' style='float:left;'>$title</p>
          <a href='see_post.php?see_post=$blog_id'><button type='button' style='float:right;margin-top:0px;' class='btn btn-info btn-sm'>More</button></a>
          </ul>
      </div>

     </div>
     </div>
      ";
    }else{
      echo "Not Uploaded";
    }
  }
      ?>
<?php
echo "
  <div id='Home' class='container actives' style='margin-top:20px;'>
     <div class='home-main-container'>
     <div class='menu-main-container'>
 <div class='container' style='margin-bottom:66px;'>
  <ul class='pagination' style='background-color:white;margin-left:30%;'>
  $pagination
  </ul>
</div>
</div>
</div>
</div>
";
 ?>

<div class="nav-bottom">
  <ul style="background-color: #292828;color: white;">
    <li><a class="tab active" href="index.php"><i class="fa fa-home"></i></a></li>
    <li><a class="tab"  href="search.php"><i class="fas fa-search"></i></a></li>
    <li><a class="tab" href="reviews.php" ><i class="fa fa-thumbs-up"></i></a></li>
    <li><a class="tab" href="my_profile.php"><i class="fas fa-user"></i></a></li>
  </ul>
</div>

    </div>
    
    <footer>
  <div style="margin-bottom: 100px;margin-left: 30%;">
  © Copyright 2020
  </div>
</footer>

</body>
</html>

<?php 
if (isset($_POST['blog'])) {
           $name = $_FILES['image']['name'];

          $random_number = rand(1,10000);

     $target_dir = "blog_image/".$name.$random_number;
     
     $post_url = 'blog_image/'.$name.$random_number;
     
     $caption = $_POST['content'];

     $caption = str_replace("'", "\'", $caption);

     $title = $_POST['title'];

     $title = str_replace("'", "\'", $title);
    
    //add random number after post
     
     move_uploaded_file($_FILES['image']['tmp_name'], $target_dir );
     
     $save = "blog_image/".$name.$random_number; // new file save blog_image folder
     
     $file = "blog_image/".$name.$random_number; //original file
     
     list($width, $height) = getimagesize($target_dir);
     
     $image = imagecreatefromjpeg($file);
     
     $info = getimagesize($file);
     
     if($info['mime']=='image/jpeg'){
       
      $image = imagecreatefromjpeg($file);
       
     }elseif($info['mime']=='image/gif'){
       
        $image = imagecreatefromjpeg($file);
        
     }elseif($info['mime']=='image/png'){
       
        $image = imagecreatefromjpeg($file);
        
     }
      //same width same height
     
       $new_width=300;
     
     $new_height=300;
     
     $tn = imagecreatetruecolor($new_width, $new_height);
     
     imagecopyresampled($tn,$image,0,0,0,0,$new_width,$new_height,$width, $height);
     
     imagejpeg($tn,$save,60);

    $query = "INSERT INTO blogs(user_id,description,blog_image,title)VALUES ('$userId','$caption','$post_url','$title')"; 

            $query_result = mysqli_query($conn,$query);

            if ($query_result or die(mysqli_error($conn))) {
              echo"
              <script>alert('Post Is Uploaded')</script>";
              echo"<script>window.open('index.php','_self')</script>";
            }else{
              echo"<script>alert('Sorry Your Post Is Not Uploaded')</script>";
              echo"<script>window.open('index.php','_self')</script>";
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

   fetch_post();
   setInterval(function(){
      fetch_post();
   },1000);

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