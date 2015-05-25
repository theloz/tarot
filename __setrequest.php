<?php
session_start();
$_SESSION['req'] = $_REQUEST;

//salvo la sessione nel db
header("Location: wheel.php");
