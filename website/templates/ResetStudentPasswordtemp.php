			<?php	
				if (isset($_GET['studentid']))
				{
					$studentDetails = new DatabaseTable($pdo, 'students');
				
					// Check if new password was submitted
					if (isset($_POST['submit']))
					{
						if(empty($_POST['password']))
							echo('<p>Please provide a new password</p>');
						else
						{
							$record = [
								'student_id' => $_GET['studentid'],
								'password' => $_POST['password']
							];

							$studentDetails->save($record);
							echo('New password set');
						}
					}
					
					// Show the form based on student ID
					$record = [
						'student_id' => $_GET['studentid']
					];

					$row = $studentDetails->find($record)->fetch();	
					
					if(!empty($row))
					{
			?>
			<div id="topBar">
				<button class="topButton"><a href="Studentdetails<?php echo('?studentid=' . $_GET['studentid'] ); ?>">View</a></button><button class="topButton"><a href="amendstudent<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Amend</a></button><button class="topButton"><a href="viewstudentgrades<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Grades</a></button><button class="topButton"><a href="viewstudenttimetable<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Timetable</a></button><button class="topButton"><a href="resetstudentpassword<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Password</a></button>
			</div>	
			<h2>Reset Student Password</h2>
			</br></br>
			<u><p>Student ID</p></u>
			<?php echo $_GET['studentid']?>
			<u><p>Student Name</p></u>
			<?php echo $row['firstname'] . ' ' . $row['surname']?>
			<br /></br>
			<form action="ResetStudentPassword<?php echo('?studentid=' . $_GET['studentid']); ?>" method="post">
				<u>New Password:</u><br />
				<input type="text" name="password" style="width: 250px;"><br /><br />
				<input type="submit" value="Reset" name="submit" style="width: 150px; height: 40px;">
			</form>
			<?php
					}
					else
						echo('<p>Student not found</p>');
				}
				else
					echo('<p>No student ID provided</p>');
			?>
		</div>
	</body>
</html>
	