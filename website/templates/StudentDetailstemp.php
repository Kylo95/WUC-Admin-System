			<?php
				if (isset($_GET['studentid']) && !empty($_GET['studentid']))
				{
					$studentDetails = new DatabaseTable($pdo, 'students');
					
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
			<h2>Student Details</h2>
			</br></br>
			<form>
				<label class="textBoxSideLabel" for="id">Student_ID:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['student_id']?></label> <br /><br />
				<label class="textBoxSideLabel" for="firstname">First_Name:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['firstname']?></label><br /><br />
				<label class="textBoxSideLabel" for="surname">Surname:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['surname']?></label><br /><br />
				<label class="textBoxSideLabel" for="termaddressline1">Term_address_line1:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['term_address_line1']?></label><br /><br />
				<label class="textBoxSideLabel" for="termaddressline2">Term_address_line2:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['term_address_line2']?></label><br /><br />
				<label class="textBoxSideLabel" for="termaddresspostcode">Term_address_postcode:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['term_address_postcode']?></label><br /><br />
				<label class="textBoxSideLabel" for="termaddresscounty">Term_address_county:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['term_address_county']?></label><br /><br />
				<label class="textBoxSideLabel" for="termaddressline1">Home_address_line1:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['home_address_line1']?></label><br /><br />
				<label class="textBoxSideLabel" for="homeaddressline2">Home_address_line2:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['home_address_line2']?></label><br /><br />
				<label class="textBoxSideLabel" for="homeaddresspostcode">Home_address_postcode:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['home_address_postcode']?></label><br /><br />
				<label class="textBoxSideLabel" for="homeaddresscounty">Home_address_county:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['home_address_county']?></label><br /><br />
				<label class="textBoxSideLabel" for="telephone">Telephone_Number:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['telephone_number']?></label> <br /><br />
				<label class="textBoxSideLabel" for="email">Email_Address:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['email_address']?></label> <br /><br />
				<label class="textBoxSideLabel" for="coursecode">Course_Code:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['course_code']?></label> <br /><br />
				<label class="textBoxSideLabel" for="status">Student_Status:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['student_status']?></label> <br /><br />
				<label class="textBoxSideLabel" for="tutor">Personal_Tutor:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['personal_tutor']?></label> <br /><br />
				<label class="textBoxSideLabel" for="entrygrades">Entry_Grades:</label> <label class="textBoxSideLabel" style="text-align:left"><?php echo $row['entry_qualifications']?></label> <br /><br />
			</form>
		</div>
	</body>
</html>
<?php				
		}
		else
		{
			$error = 1;
			echo('<p>Student not found.</p>');
		}
	}
	else
	{
		$error = 1;
		if(isset($_GET['studentid']))
			echo('<p>Please do not leave the search query empty.</p>');
	}
	
	if(isset($error))
	{
?>
			<div id="dynamicBox" style="width: 648px; height: 480px;">
				<br />
				<br />
				<h2>Student Search</h2>
				<br />
				<form action="StudentDetails" method="get">
					Student ID<br />
					<input type="text" name="studentid" style="width: 250px;"><br /><br />
					
					<input type="submit" value="Search" style="width: 250px; height: 40px;">
				</form>
			</div>
		</div>
	</body>
</html>
<?php
	}
?>