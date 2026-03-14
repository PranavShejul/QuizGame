<?php include 'database.php'; ?>
<?php
/*
* total questions
*/
$query ="SELECT * FROM `questions`";
//result
$result = $mysqli->query($query) or die($mysqli->error._LINE_);
$total = $result->num_rows;
?>
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
	<div class="container">
	<h2 class="instructions">Quiz Game Instructions</h2>
<ol class="olclass">
  <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
  <li>One question has a 1-minute time limit.</li>
  <li>Start the game, select answers, and proceed automatically.</li>
  <li>Earn points for correct answers, no penalty for incorrect ones.</li>
  <li>Estimated Time : <?php echo $total * 1.0; ?> Minutes </li>
</ol>
<a href="question.php?n=1" class="start">START QUIZ</a>
	</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2014, Quiz game
		</div>
	</footer>
</body>
</html>
