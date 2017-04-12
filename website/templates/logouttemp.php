<?php
	unset($_SESSION['priv']);
	unset($_SESSION['user']);
	header('Location: home');
	exit();
	//require'../templates/hometemp.php';
?>