<?php	
								
									
if (isset($_POST['submit']))	{
		
$announceTable = new DatabaseTable($pdo, 'announcements');

$record = [
	'module_id' => $_POST['module_id'],
	'message' => $_POST['message'],
	'staff_id' => $_SESSION['user'],
	'post_date' => Date("Y/m/d H:s:iA")
];

$announceTable->save($record);
	}
	
?>
			<form action="addannouncment" method="POST">
			<h2>Create a new announcement</h2></br></br>
								Module title</br>
						<select name='module_id'> <!--displays all the products in the database in a select box-->
								<?php
									$stmt = $pdo->query('SELECT * FROM modules');
										foreach ($stmt as $row){
												echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>';						
										
 			}
								
					?>		</select></br></br>
							Announcement</br> <textarea name="message" /></textarea></br>
							<input type="submit" value="Submit" name="submit" />				
						</form>				

								