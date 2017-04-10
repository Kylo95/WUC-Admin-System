			<?php
				$staffTable = new DatabaseTable($pdo, 'staff');
			
				if (isset($_POST['submit']))
				{
					$pass = $staffTable->find(['staff_id' => $_SESSION['user']])->fetch()['password'];
				
					if($_POST['password'] == $pass)
					{
						$staffDetails = new DatabaseTable($pdo, 'staff');
						
						$record = [
							'staff_id' => $_POST['search'],
							'status' => 'inactive'
						];

						$staffDetails->save($record);
						
						echo '<p>User deleted successfully</p>';
					}
					else
						echo '<p>Incorrect Password, please try again.</p>';
				}
			?>
			<h2>Archive User</h2>
			</br></br>
			<form action="DeleteUser" method="post">
				Select a member of staff you would like to archive.</br></br>
				<select name='search'>
					<?php
						$stmt = $staffTable->find(['status' => 'active']);	
						foreach ($stmt as $row)
							echo '<option value="' . $row['staff_id'] . '">' . $row['staff_id'] . ' - ' . $row['firstname'] . ' ' . $row['surname'] . '</option>';
					?>
				</select>
				</br></br>
				Enter your password to confirm delete<br /><br />
				<input type="text" style="width: 200px;" id="password" name="password"><br /><br />
				<input type="submit" value="DELETE" name ='submit' style="width: 150px; height: 25px;">
			</form>
		</div>
	</body>
</html>		