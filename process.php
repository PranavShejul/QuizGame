<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php
    // Set error handler
    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    if ($_POST) {
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number+1;

        /* Total number of questions*/
        $query = "SELECT * FROM `questions`";
		/* result*/
        $results = $mysqli->query($query) or die($mysqli->error._LINE_);
		/*total*/
        $total = $results->num_rows;

        // Get correct choice for the current question
        $query = "SELECT * FROM `choices` 
		 WHERE question_number = $number AND is_correct = 1";
		 
		/*Get result*/
		$result = $mysqli->query($query) or die($mysqli->error._LINE_);
		
		/*Get row*/
		$row = $result->fetch_assoc();
         
		 /*Set correct choice*/
		 $correct_choice = $row['id'];
		
        // Compare 
        if ($correct_choice == $selected_choice){
			//Answer is correct
            $_SESSION['score']++; // Increment score for correct answer
        }
        // Redirect to next question or final page
        if ($number == $total) {
            header("Location: final.php");
                exit();
            } else {
                header("Location: question.php?n=".$next);
                exit();
            }
        } else {
            echo "Error: Correct choice not found for question number $number.";
		}
?>
