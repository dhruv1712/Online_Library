<!DOCTYPE html>
<?php require_once("session.php");?>
<html lang="en">
	<head>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/960_24_col.css" type="text/css">
		<link rel="stylesheet" href="css/css.css" type="text/css">
		<link rel="stylesheet" href="css/css_002.css" type="text/css">
		<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
		<script src="js/Javascript.js"></script>
		<title>eLibrary</title>
	</head>
	<body>
		<section id="page">
			<header class="container_24">
				<div class="grid_4 logo">
					<span><a href="index.php" style="font: 42px/50px Norican;">eLibrary</a></span>
				</div>
				<div class="grid_20">
					<ul>
						<?php if(!isset($_SESSION['role'])){?>
						<li class=""><a href="login.php">Login</a></li>
						<li class=""><a href="registration.php">Register</a></li>
						<?php }else{?>
							<?php if($_SESSION['role'] == "Staff"){?>
						<li class=""><a href="add_books.php">Add Books</a></li>
							<?php }?>
						<li class=""><a href="all_books.php">Read Books</a></li>
						<li class=""><a href="logout.php">Logout</a></li>
						
						<?php }?>
						
					</ul>
				</div>
				<div class="clear"></div>
			</header>
