<?php
	/*starts the session to determine which page is selected upon log in*/
	$error = 1;
	if (!empty($_POST['staff_id']) || !empty($_POST['password']))
	{	
		$staffTable = new DatabaseTable($pdo, 'staff');
		$results = $staffTable->find($_POST);	//selecting all information from new accounts where the username and password match what's entered to provide log in//
		
		foreach($results as $rows)
		{
			$error = 0;
			if ($rows['loa'] == 2){
				$_SESSION['user'] = $rows['staff_id']; //setting the firstname if the user so there name can be displayed //
				$_SESSION['priv'] = 2;			/*if user is set to 2 within access then will link as an admin and allow access to higher access functions*/
			}
			else{
				$_SESSION['user'] = $rows['staff_id'];
				$_SESSION['priv'] = 1;			/*if user is set to 1 within access then wilol links as a user to generic page with less access*/
			}
		}
		
		if($error)
			echo("<p>No account found, please make sure you have provided the right information.</p>");
	}
	
	/*check if already logged in and show welcome*/
	if(isset($_SESSION['user']))
		require 'Welcometemp.php';
	else if($error)
	{
	
	/*show login if not logged in or error with details*/
?>
			<div id="dynamicBox" style="width: 648px; height: 480px;">
				<br />
				<br />
				<h2>Login</h2>
				<br />
				<form action="" method="post">
					Staff Id<br />
					<input type="text" name="staff_id" style="width: 250px;"><br /><br />
					Password<br />
					<input type="password" name="password" style="width: 250px;"><br /><br />
					<input type="submit" value="Login" style="width: 250px; height: 40px;">
				</form>
			</div>
		</div>
	</body>
</html>
<?php
	}
?>
