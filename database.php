<?php
//connection credentials
$db_host = 'localhost';
$db_name = 'quizgame';
$db_user = 'root';
$db_pass = 'pranav';

//mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//error handler
if($mysqli->connect_error){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
