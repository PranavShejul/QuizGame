<?php include 'database.php';?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> QUIZ GAME </title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<header>
<div class="container">
<h1>QUIZ GAME</h1>
</div>
</header>
<main>
<div class="final1">
	<h2>YOU HAVE COMLETED THE MCQ TEST</h2>
	<p> Congrats!</p>
	<p>Final Score: <?php echo $_SESSION['score']; ?></p>
	<a href="index.php" class="start">Take Again</a>
</div>
</main>
<footer>
	<div class="container">
		Copyright &copy;  ,Quiz Game
	</div>
</footer>
</body>
</html>

