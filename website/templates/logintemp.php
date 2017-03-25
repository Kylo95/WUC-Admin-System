
<?php 
 /*starts the session to determine which page is selected upon log in*/


if ($_POST['staffid'] !=="" && $_POST['password'] !==""){
	
	$staffid = $_POST['staffid'];	 
	$password =  $_POST['password'];		/*salted hashed password in order to help with security*/
	
	
	
	$results = $pdo->query( 'SELECT * FROM staff WHERE staff_id=\''.$staffid.'\' AND password=\''.$password.'\' LIMIT 1');	//selecting all informaiton from new accounts where the username and password match whats entered to provide log in//
	foreach($results as $rows)
	{
		if ($rows['loa'] == 2){
			$_SESSION['user'] = $rows['staff_id']; //setting the firstname if the user so there name can be displayed //
			$_SESSION['priv'] = 2;			/*if user is set to 2 within access then will link as an admin and allow access to higher access functions*/
			require 'Welcometemp.php';
		}
		else{
			$_SESSION['user'] = $rows['staff_id'];
			$_SESSION['priv'] = 1;
			require 'Welcometemp.php';/*if user is set to 1 within access then wilol links as a user to generic page with less access*/
		}	
	}
}
	else {
		unset($_POST['staffid']);
		unset($_POST['password']);
		$content = loadTemplate('../templates/hometemp.php',[]);
	}
		?>



		


