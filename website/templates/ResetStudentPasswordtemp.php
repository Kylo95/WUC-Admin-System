<?php $studentDetails = new DatabaseTable($pdo, 'students');
				
				if (isset($_GET['studentid'])) {
		
		$record = [
		'student_id' => $_GET['studentid']

		];

		$row = $studentDetails->find($record)->fetch();
				
			?>
		<div id="topBar">
			<button class="topButton"><a href="Studentdetails<?php echo('?studentid=' . $_GET['studentid'] ); ?>">View</a></button><button class="topButton"><a href="amendstudent<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Amend</a></button><button class="topButton"><a href="viewstudentgrades<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Grades</a></button><button class="topButton"><a href="viewstudenttimetable<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Timetable</a></button><button class="topButton"><a href="resetstudentpassword<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Password</a></button>
		</div>	
			<u><p>Student id</p></u><?php echo $_GET['studentid']?>
			<u><p>Student Name</p></u><?php echo $row['firstname'] . ' ' . $row['surname']?><br /></br>
			<form action="ResetStudentPassword<?php echo('?studentid=' . $_GET['studentid']); ?>" method="post">
					<u>New Password:</u><br />
					<input type="text" name="password" style="width: 250px;"><br /><br />
					<input type="submit" value="Reset" name="submit" style="width: 150px; height: 40px;">
			</form>
		<?php 
	}?>
		</div>
	</body>
</html>
<?php
	if (isset($_POST['submit']))	{
		

$record = [
	'student_id' => $_GET['studentid'],
	'password' => $_POST['password']
	
];

$studentDetails->save($record);
	}
	?>
	