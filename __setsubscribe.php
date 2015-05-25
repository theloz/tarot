<?php
//check existing username
$db = new PDO('sqlite:db/wheeloftarots.sqlite', '', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
));
$result = $db->query('SELECT * FROM users WHERE username = ');
//check existing nickname

//password match

//password strength

//save to db

//redirect
header("Location:login.php");