<?php
session_start();
require '../classes/database.php';
require '../functions/loadTemplate.php';
if (isset($_GET['page'])){
	
	$pageload = $_GET['page'];
}
else{
	$pageload = 'home';
}
$content = loadTemplate('../templates/' . $pageload  . 'temp.php',['pdo' => $pdo]);
	
$templateVars = [

 'content' => $content
];


$HTML = loadTemplate('../templates/header.php',$templateVars);

echo $HTML;

?>