<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="icon" href="../icons/freeby.png">    

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<meta name="description" content="Free Blogging and Reviewing Website where you can register and upload a blog with reviews with another friends.">

<meta name="keywords" content="blogs,privacy,policy,privacy policy,blog,news,updates,corona,covid,updates,register,login,upload,id,reviews,users,friends,people,live">

<meta name="author" content="Manas Makkar">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
  height: 100%;
  color: #777;
  line-height: 1.8;
}

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
  background-image: url('/w3images/parallax1.jpg');
  min-height: 100%;
}

/* Second image (Portfolio) */
.bgimg-2 {
  background-image: url("/w3images/parallax2.jpg");
  min-height: 400px;
}

/* Third image (Contact) */
.bgimg-3 {
  background-image: url("/w3images/parallax3.jpg");
  min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1600px) {
  .bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: scroll;
    min-height: 400px;
  }
}
</style>
<body>

<!-- First Parallax Image with Logo Text -->
<div class="w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;margin-top: 53px;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity" >FREEBY</span>
  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
 <center><p class="w3-center"><h3>What We Describe?</h3></p></center>
  <p>Here We Describe About the Information what we collect from you. And Also described about your data safety.Hope So It's Helpful.</p>
  <div class="w3-row">
    <div class="w3-col m6 w3-center w3-padding-large">
      <p style="color: black;"><b>Information and content you provide.</b></p><br>
      <img src="../icons/freeby.png">
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-padding-large">
      <p>We Collect The Content and other information you provide when you register.No else additional Information Is Taken By This Site. We collect information about how you use our Products, such as the types of content you view or engage with; the features you use; the actions you take. You are Totally Independent To Post Anything In Your Blog And You can Review On Anything. But Make Sure That Content Is Not Sexual Or Not Destroy Anyone's Image.</p>

<div class=" w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
     <center><h3><a href="contact_us.php">Contact Freeby</a></h3></center>
  </div>
</div>

    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  © Copyright 2020
</footer>
