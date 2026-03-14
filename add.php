<?php include 'database.php';?>
<?php
    if(isset($_POST['submit'])){
		// get post variables
        $qustion_number = $_POST['qustion_number'];
		 $qustion_text = $_POST['qustion_text'];
        //Choices array
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];
        
        //question query
        $query = "INSERT INTO `questions`(question_number, text)
		           VALUES('$question_number','$question_text')";
				   
		//run query
		$insert_row = $mysqli->query($query) or die($mysqli->error._LINE_);
		
		//validate INSERT
		if($insert_row){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice) {
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//choice query
					$query = "INSERRT INTO `choice` (question_number, is_correct, text)
					         VALUES {'question_number','$is_correct','$value')";
							 
							 //run query
							 $insert_row = $mysqli->query($query) or die($mysqli->error._LINE_);
							 
							 //validate INSERT
							 if($insert_row){
								 continue;
							 } else {
								 die('Error : ('.$mysqli->errno . ') '.$mysqli->error);
							 }
							 }
				}
				$msg = 'Question has been added';
				
		}
		
	}
	/*
	 * total question
	*/
	$query = "SELECT * FROM `questions`";
			  
	//result
	$questions = $mysqli->query($query) or die ($mysqli->error._LINE_);
	$total = $questions->num_rows;
	$next = $total+1;
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
	<h2>Add a Question</h2>
	<?php
	    if(isset($msg)) {
			echo '<p>'.$msg.'</p>';
		}
		?>
	<form method="post" action="add.php">
		<p>
		<label>Qestion Number: </label>
		<input type="number" value="<?php echo $next; ?>" name="question_number" />
		</p>
		 <p>
                <label>Qestion Text: </label>
                <input type="text" name="question_text" />
                </p>
		 <p>
                <label>Choice #1: </label>
                <input type="text" name="Choice1" />
                </p>
		 <p>
                <label>Choice #2: </label>
                <input type="text" name="Choice2" />
                </p>
		<p>
                <label>Choice #3: </label>
                <input type="text" name="Choice3" />
                </p>
		<p>
                <label>Choice #4: </label>
                <input type="text" name="Choice4" />
                </p>
		<p>
                <label>Choice #5: </label>
                <input type="text" name="Choice5" />
		</p>
		 <p>
                <label>Correct Choice Number: </label>
                <input type="number" name="Correct_Choice" />
                </p>
		 <p>
                <input type="submit" name="submit" value="submit" />
                </p>
</main>
<footer>
        <div class="container">
                Copyright &copy;  ,Quiz Game
        </div>
</footer>
</body>
</html>
