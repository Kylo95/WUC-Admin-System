<?php

	if (isset($_GET['studentid'])) {
		$studentDetails = new DatabaseTable($pdo, 'students');
		$record = [
		'student_id' => $_GET['studentid']

		];

		$row = $studentDetails->find($record)->fetch();
																			
	?>
		<div id="topBar">
			<button class="topButton"><a href="Studentdetails<?php echo('?studentid=' . $_GET['studentid'] ); ?>">View</a></button><button class="topButton"><a href="amendstudent<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Amend</a></button><button class="topButton"><a href="viewstudentgrades<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Grades</a></button><button class="topButton"><a href="viewstudenttimetable<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Timetable</a></button><button class="topButton"><a href="resetstudentpassword<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Password</a></button>
		</div>
		<u><h1><head>Student Details</head></h1></u>
		</br></br>
		<form>
				<label class="textBoxSideLabel" for="id">Student_ID:</label><label><?php echo $row['student_id']?></label> <br /><br />
				<label class="textBoxSideLabel" for="firstname">First_Name:</label><label><?php echo $row['firstname']?></label><br /><br />
				<label class="textBoxSideLabel" for="surname">Surname:</label><label><?php echo $row['surname']?></label><br /><br />
				<label class="textBoxSideLabel" for="termaddress">Term_address:</label><label><?php echo $row['term_address_line1']?></label><br /><br />
				<label class="textBoxSideLabel" for="nontermaddress">Non_Term_Address:</label><label><?php echo $row['home_address_line1']?></label><br /><br />
				<label class="textBoxSideLabel" for="telephone">Telephone_Number:</label><label><?php echo $row['telephone_number']?></label> <br /><br />
				<label class="textBoxSideLabel" for="email">Email_Address:</label><label><?php echo $row['email_address']?></label> <br /><br />
				<label class="textBoxSideLabel" for="coursecode">Course_Code:</label><label><?php echo $row['course_code']?></label> <br /><br />
				<label class="textBoxSideLabel" for="status">Student_Status:</label><label><?php echo $row['student_status']?></label> <br /><br />
				<label class="textBoxSideLabel" for="tutor">Personal_Tutor:</label><label><?php echo $row['personal_tutor']?></label> <br /><br />
				<label class="textBoxSideLabel" for="entrygrades">Entry_Grades:</label><label><?php echo $row['entry_qualifications']?></label> <br /><br />
			</form>
		</div>
	</body>
</html>
<?php
													
}


?>	
		