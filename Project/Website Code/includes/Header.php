<?php session_start();
include './includes/Title.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kyle's Gallery</title>
	<link rel="icon" type="image/png" href="images/kyle.jpeg" />
	<meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name= "viewport" content= "width=device-width, initial-scale=1.0" >
	<title>kyle Art Gallery<?php if (isset($tittle)) {echo "&mdash; $title";} ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/stilo.css">



</head>



		<?php require './includes/Menu.php'; ?>
