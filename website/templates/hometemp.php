<?php	
	/*starts the session to determine which page is selected upon log in*/
		
	$error = 1;
	if(!isset($_SESSION['user']))
		if (!empty($_POST['staff_id']) || !empty($_POST['password']))
		{	
			$staffTable = new DatabaseTable($pdo, 'staff');
			//Ensure only active users can log in
			$_POST['status'] = 'active';
			$results = $staffTable->find($_POST)->fetch();	//selecting all information from new accounts where the username and password match what's entered to provide log in//
			
			if(!empty($results))
			{
				$error = 0;
				if ($results['loa'] == 2){
					$_SESSION['user'] = $results['staff_id']; //setting the firstname if the user so there name can be displayed //
					$_SESSION['priv'] = 2;			/*if user is set to 2 within access then will link as an admin and allow access to higher access functions*/
				}
				else{
					$_SESSION['user'] = $results['staff_id'];
					$_SESSION['priv'] = 1;			/*if user is set to 1 within access then wilol links as a user to generic page with less access*/
				}
			}
			
			if($error)
				echo("<p>No account found, please make sure you have provided the right information.</p>");
		}
	
	/*check if already logged in and show welcome*/
	if(isset($_SESSION['user']))
	{
		if(isset($results['password']) && $results['password'] == 'placeholder')
			require 'ChangePasswordtemp.php';
		else if(isset($_POST['password']) && isset($_POST['passwordconfirm']))
		{
			if(empty($_POST['password']) || empty($_POST['passwordconfirm']))
			{
				echo('<p>You cannot provide a blank password</p>');
				require 'ChangePasswordtemp.php';
			}
			else if($_POST['password'] != $_POST['passwordconfirm'])
			{
				echo('<p>Your passwords did not match, please try again</p>');
				require 'ChangePasswordtemp.php';
			}
			else
			{
				$staffTable = new DatabaseTable($pdo, 'staff');
				
				$record = [
					'staff_id' => $_SESSION['user'],
					'password' => $_POST['password']
				];
				
				$staffTable->save($record);
				
				echo('<p>Your password was changed successfully</p>');
				require 'Welcometemp.php';
			}
		}
		else
			require 'Welcometemp.php';
	}
	else if($error)
	{
	/*show login if not logged in or error with details*/
		require 'Logintemp.php';
	}
?>
