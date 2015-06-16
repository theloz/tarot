<?php
$loc=0;
do{
	//sanitize input
	if(!filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)){
		$loc = 'subscribe.php?err=5';
		break;
	}
	if(!filter_var($_POST['pwd'],FILTER_SANITIZE_STRING)){
		$loc = 'subscribe.php?err=6';
		break;
	}
	if(!filter_var($_POST['pwd2'],FILTER_SANITIZE_STRING)){
		$loc = 'subscribe.php?err=6';
		break;
	}
	$em = $_POST['email'];
	$pwd1 = $_POST['pwd'];
	$pwd2 = $_POST['pwd2'];
	$usr = $_POST['email'];
	$nck = $_POST['nick'];
	
							
	//check existing username
	$db = new PDO('sqlite:db/wheeloftarots.sqlite', '', '', array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	));
	$query = $db->query("SELECT * FROM users WHERE  username = '$em'");
	$result = $query->fetch(PDO::FETCH_ASSOC);
	if(!empty($result)){
		$loc = 'subscribe.php?err=1&em='.$em."&ni=".$nck;
		break;
	}
	
	//check existing nickname
	$query = $db->query("SELECT * FROM users WHERE nickname = '$nck' AND nickname!=''");
	$result = $query->fetch(PDO::FETCH_ASSOC);
	if(!empty($result)){
		$loc = 'subscribe.php?err=2&em='.$em."&ni=".$nck;
		break;
	}
	//password match
	if($pwd1!=$pwd2){
		$loc = 'subscribe.php?err=3';
		break;
	}
	//password strength
	
	//save to db
	$insert = "INSERT INTO users (username, password, nickname, createdttm, modifydttm) 
                VALUES (:username, :password, :nickname, :createdttm, :modifydttm)";
	$stmt = $db->prepare($insert);
	$stmt->bindParam(':username', $em);
	$stmt->bindParam(':password', $pwd1);
	$stmt->bindParam(':nickname', $nck);
	$stmt->bindParam(':createdttm', date("Y-m-d H:i:s"));
	$stmt->bindParam(':modifydttm', date("Y-m-d H:i:s"));
	$stmt->execute();
	//registration successful redirect to login page
	$loc = 'subscribe.php?err=3';
	break;
}while(0);

header("Location:".$loc);