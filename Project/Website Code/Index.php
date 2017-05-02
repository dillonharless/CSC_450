<?php require './includes/Header.php'; ?>
<style>
.jumbotron{background-color: #ffffff;}
h1 {color:  #ffffff;}
</style>
<!--This is the home page and it will describe the website and display the art gallery. -->
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<!-- Reference the W3 school website in order to get the script in the bottom working -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
		<div class="page-header">
	</div>
	<div class = "container">
		<!-- source the image for the logo -->
		<figure><img src="images/kyle.jpeg" alt="Responsive image" width="220" height = "130"  class="img-responsive center-block"></figure>
	<div class = "panel panel-default">
 <div class= "jumbotron">
<!-- short bio description about the artist -->
<h1><p>Kyle Owens is a painter that lives in Nashville, Tennesse.
	He seeks to envoke an emotional response in his viewers through power visuals that represent a variety of human emotions,
	actions, and States of mind. The following is a Gallery that contains some of his Art. You can use this Website to purchase the printed canvas.</p></h1>
<!-- source the images for the gallery show -->
	<div class="w3-content w3-section" style="max-width:500px">
	<img class="mySlides w3-animate-fading" src="images/image1.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image3.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image4.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image5.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image6.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image7.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image8.JPG" style="width:100%">
	<img class="mySlides w3-animate-fading" src="images/image9.JPG" style="width:100%">
</div>
<script>
var myIndex = 0;
carousel();
//this function will set the timer to 10 seconds for the display of an image
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 9000);
}
</script>
</div>
</div>
</div>
</body>
<?php include './includes/Footer.php'; ?>
