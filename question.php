<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php

    $number = (int) $_GET['n'];

     /* Total number of questions*/
     $query = "SELECT * FROM `questions`";
	/* result*/
    $results = $mysqli->query($query) or die($mysqli->error._LINE_);
	/*total*/
    $total = $results->num_rows;
    
	/*
    * Get question
    */
    $query = "SELECT * FROM `questions`
               WHERE question_number = $number";
	//get result
	$result = $mysqli->query($query) or die($mysqli->error._LINE_);
		
	$question = $result->fetch_assoc();
	 /*
    * Get choices
    */
    $query = "SELECT * FROM `choices`
               WHERE question_number = $number";
	//get result
	$choices = $mysqli->query($query) or die($mysqli->error._LINE_);
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
<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
<h2 class="question">
<?php echo $question['text']; ?>
</h2>
<form method="post" action="process.php">
<ul class="choices">
<?php while($row = $choices->fetch_assoc()): ?>
<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
<?php endwhile; ?>
</ul>
<input class="submit" type="Submit" value="Submit" />
<input type="hidden" name="number" value="<?php echo $number; ?>" />
</form>
</div>
</main>
</body>
</html>