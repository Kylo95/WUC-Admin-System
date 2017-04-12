			<?php
				if (isset($_GET['studentid']) && !empty($_GET['studentid']))
				{
					$studentsTable = new DatabaseTable($pdo, 'students');
					
					if (isset($_POST['submit']))
					{
						foreach ($_POST as $key => $value)	
							if(empty($value))
								$empty = 1;
						
						if(isset($empty))
							echo('<p>You cannot leave a field blank</p>');
						else
						{
							$record = [
								'student_id' => $_GET['studentid'],
								'firstname' => $_POST['firstname'],
								'surname' => $_POST['surname'],
								'term_address_line1' => $_POST['termaddressline1'],
								'term_address_line2' => $_POST['termaddressline2'],
								'term_address_postcode' => $_POST['termaddresspostcode'],
								'term_address_county' => $_POST['termaddresscounty'],
								'home_address_line1' => $_POST['homeaddressline1'],
								'home_address_line2' => $_POST['homeaddressline2'],
								'home_address_postcode' => $_POST['homeaddresspostcode'],
								'home_address_county' => $_POST['homeaddresscounty'],
								'telephone_number' => $_POST['telephone'],
								'email_address' => $_POST['email'],
								'course_code' => $_POST['coursecode'],
								'entry_qualifications' => $_POST['entrygrades'],
								'student_status' => $_POST['status'],
								'personal_tutor' => $_POST['tutor']
							];

							$studentsTable->save($record);
							echo('<p>Student modified successfully</p>');
						}
					}
					
					$record = [
						'student_id' => $_GET['studentid']
					];

					$row = $studentsTable->find($record)->fetch();
					
					if(!empty($row))
					{
			?>
			<div id="topBar">
				<button class="topButton"><a href="Studentdetails<?php echo('?studentid=' . $_GET['studentid'] ); ?>">View</a></button><button class="topButton"><a href="amendstudent<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Amend</a></button><button class="topButton"><a href="viewstudentgrades<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Grades</a></button><button class="topButton"><a href="viewstudenttimetable<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Timetable</a></button><button class="topButton"><a href="resetstudentpassword<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Password</a></button>
			</div>
			<h2>Amend Student Details</h2>
			</br></br>
			<form action="amendstudent<?php echo('?studentid=' . $_GET['studentid']); ?>" method="post">
				<label class="textBoxSideLabel" for="firstname">First_Name</label> <input type="text" style="width: 300px;" id="firstname"  name="firstname" value = <?php echo $row['firstname']?>><br /><br />
				<label class="textBoxSideLabel" for="surname">Surname</label> <input type="text" style="width: 300px;" id="surname"   name="surname" value = <?php echo $row['surname']?>><br /><br />
				<label class="textBoxSideLabel" for="termaddressline1">Term_address_line1</label> <input type="text" style="width: 300px;" id="termaddressline1"  name="termaddressline1" value = <?php echo $row['term_address_line1']?>><br /><br />
				<label class="textBoxSideLabel" for="termaddressline2">Term_address_line2</label> <input type="text" style="width: 300px;" id="termaddressline2"  name="termaddressline2" value = <?php echo $row['term_address_line2']?>><br /><br />
				<label class="textBoxSideLabel" for="termaddresspostcode">Term_address_postcode</label> <input type="text" style="width: 300px;" id="termaddresspostcode"  name="termaddresspostcode" value = <?php echo $row['term_address_postcode']?>><br /><br />
				<label class="textBoxSideLabel" for="termaddresscounty">Term_address_county</label> <input type="text" style="width: 300px;" id="termaddresscounty"  name="termaddresscounty" value = <?php echo $row['term_address_county']?>><br /><br />
				<label class="textBoxSideLabel" for="termaddressline1">Home_address_line1</label> <input type="text" style="width: 300px;" id="homeaddressline1"  name="homeaddressline1" value = <?php echo $row['home_address_line1']?>><br /><br />
				<label class="textBoxSideLabel" for="homeaddressline2">Home_address_line2</label> <input type="text" style="width: 300px;" id="homeaddressline2"  name="homeaddressline2" value = <?php echo $row['home_address_line2']?>><br /><br />
				<label class="textBoxSideLabel" for="homeaddresspostcode">Home_address_postcode</label> <input type="text" style="width: 300px;" id="homeaddresspostcode"  name="homeaddresspostcode" value = <?php echo $row['home_address_postcode']?>><br /><br />
				<label class="textBoxSideLabel" for="homeaddresscounty">Home_address_county</label> <input type="text" style="width: 300px;" id="homeaddresscounty"  name="homeaddresscounty" value = <?php echo $row['home_address_county']?>><br /><br />
				<label class="textBoxSideLabel" for="telephone">Telephone_Number</label> <input type="text" style="width: 300px;" id="telephone"  name="telephone" value = <?php echo $row['telephone_number']?>><br /><br />
				<label class="textBoxSideLabel" for="email">Email_Address</label> <input type="text" style="width: 300px;" id="email"  name="email" value = <?php echo $row['email_address']?>><br /><br />
				<label class="textBoxSideLabel" for="coursecode">Course_Code</label> <input type="text" style="width: 300px;" id="coursecode"  name="coursecode" value = <?php echo $row['course_code']?>><br /><br />
				<label class="textBoxSideLabel" for="status">Student_Status</label> <input type="text" style="width: 300px;" id="status"  name="status" value = <?php echo $row['student_status']?>><br /><br />
				<label class="textBoxSideLabel" for="tutor">Personal_Tutor</label> <input type="text" style="width: 300px;" id="tutor"  name="tutor" value = <?php echo $row['personal_tutor']?>><br /><br />
				<label class="textBoxSideLabel" for="entrygrades">Entry_Grades</label> <input type="text" style="width: 300px;" id="entrygrades"  name="entrygrades" value = <?php echo $row['entry_qualifications']?>><br /><br />
				<input type="submit" value="Amend" name="submit" style="width: 150px; height: 25px;">
			</form>
		</div>
	</body>
</html>
<?php
	}
	else
		echo('<p>Student not found</p>');
}
else
	echo('<p>No student ID provided</p>');
?>	
	