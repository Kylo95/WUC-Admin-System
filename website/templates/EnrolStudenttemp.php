
			<form action="EnrolStudent" method="post">
				
				<label class="textBoxSideLabel" for="firstname">First_Name</label> <input type="text" style="width: 300px;" id="firstname" name="firstname"><br /><br />
				<label class="textBoxSideLabel" for="surname">Surname</label> <input type="text" style="width: 300px;" id="surname" name="surname"><br /><br />
				<label class="textBoxSideLabel" for="termaddress1">Term_address_line 1</label> <input type="text" style="width: 300px;" id="termaddress1" name="termaddress1"><br /><br />
				<label class="textBoxSideLabel" for="termaddress2">Term_address_line 2</label> <input type="text" style="width: 300px;" id="termaddress2" name="termaddress2"><br /><br />
				<label class="textBoxSideLabel" for="termaddresspost">Term_address_postcode</label> <input type="text" style="width: 300px;" id="termaddresspost" name="termaddresspost"><br /><br />
				<label class="textBoxSideLabel" for="termaddresscounty">Term_address_county</label> <input type="text" style="width: 300px;" id="termaddresscounty" name="termaddresscounty"><br /><br />
				<label class="textBoxSideLabel" for="nontermaddress1">Non_Term_Address_line_1</label> <input type="text" style="width: 300px;" id="nontermaddress1" name="nontermaddress1"><br /><br />
				<label class="textBoxSideLabel" for="nontermaddress2">Non_Term_Address_line_2</label> <input type="text" style="width: 300px;" id="nontermaddress2"  name="nontermaddress2"><br /><br />
				<label class="textBoxSideLabel" for="nontermaddresspost">Non_Term_Address_post</label> <input type="text" style="width: 300px;" id="nontermaddresspost"  name="nontermaddresspost"><br /><br />
				<label class="textBoxSideLabel" for="nontermaddresscounty">Non_Term_Address_county</label> <input type="text" style="width: 300px;" id="nontermaddresscounty" name="nontermaddresscounty"><br /><br />
				<label class="textBoxSideLabel" for="telephone">Telephone_Number</label> <input type="text" style="width: 300px;" id="telephone" name="telephone"><br /><br />
				<label class="textBoxSideLabel" for="email">Email_Address</label> <input type="text" style="width: 300px;" id="email" name="email"><br /><br />
				
				
				<label class="textBoxSideLabel" for="coursecode">Course_Code</label>
							<select name='coursecode'>
													<?php
									$stmt = $pdo->query('SELECT * FROM courses');
									foreach ($stmt as $row){
										echo '<option value="' . $row['course_id'] . '">' . $row['course_title'] . '</option>'; //showing all the categories in the database//
									}
																								?>
									</select></br></br>
				<label class="textBoxSideLabel" for="status">Student_Status</label> <input type="text" style="width: 300px;" id="status" name="status"><br /><br />						
				<label class="textBoxSideLabel" for="tutor">Personal_Tutor</label> 
						<select name='tutor'>
													<?php
									 				
													
									$stmt = $pdo->query('SELECT * FROM staff');
									foreach ($stmt as $row){
										echo '<option value="' . $row['staff_id'] . '">' . $row['firstname'] . '</option>'; //showing all the categories in the database//
									}
																								?>
									</select></br></br>
				
				
				<div class="labelline">Entry_Grades </div> <br /><br /><br /><br />
			
			<form action="EnrolStudent.php" method="post">
					<div class="columnDiv">
						<label>Subject</label> <br />
						<label>Subject</label> <br />
						<label>Subject</label> <br />
					</div>
					<div class="columnDiv">
						<select id = "myList" style="width: 100px;">
							<option value = "1" style="width: 100px;">A</option>
							<option value = "2" style="width: 100px;">B</option>
							<option value = "3" style="width: 100px;">C</option>
							<option value = "4" style="width: 100px;">D</option>
						</select> <br />
						<select id = "myList1" style="width: 100px;">
							<option value = "1" style="width: 100px;">A</option>
							<option value = "2" style="width: 100px;">B</option>
							<option value = "3" style="width: 100px;">C</option>
							<option value = "4" style="width: 100px;">D</option>
						</select> <br />
						<select id = "myList2" style="width: 100px;">
							<option value = "1" style="width: 100px;">A</option>
							<option value = "2" style="width: 100px;">B</option>
							<option value = "3" style="width: 100px;">C</option>
							<option value = "4" style="width: 100px;">D</option>
						</select> <br />
					</div>
					<div class="columnDiv">
						<select id = "myList3" style="width: 100px;">
							<option value = "1" style="width: 100px;">2014</option>
							<option value = "2" style="width: 100px;">2015</option>
							<option value = "3" style="width: 100px;">2016</option>
							<option value = "4" style="width: 100px;">2017</option>
						</select> <br />
						<select id = "myList4" style="width: 100px;">
							<option value = "1" style="width: 100px;">2014</option>
							<option value = "2" style="width: 100px;">2015</option>
							<option value = "3" style="width: 100px;">2016</option>
							<option value = "4" style="width: 100px;">2017</option>
						</select> <br />
						<select id = "myList5" style="width: 100px;">
							<option value = "1" style="width: 100px;">2014</option>
							<option value = "2" style="width: 100px;">2015</option>
							<option value = "3" style="width: 100px;">2016</option>
							<option value = "4" style="width: 100px;">2017</option>
						</select> <br />
					</div>
					</br>
					</br>
					<input type="submit" name="submit" value="Enrol Student" />
				</form>	
			</form>
		</div>
	</body>
</html>
<?php

	if (isset($_POST['submit'])) {
		
	 $grades = $pdo->prepare('INSERT INTO students (entry_qualifications) 
							   VALUES (:qualifications)');
	$criteria = [
			'qualifications' => $_POST['myList'],$_POST['myList1'],$_POST['myList2'],
	
		
		];
			
		$grades->execute($criteria);

		$stmt = $pdo->prepare('INSERT INTO students (firstname, surname, term_address_line1, term_address_line2, term_address_postcode, term_address_county, home_address_line1, home_address_line2, home_address_postcode, home_address_county, telephone_number, email_address, course_code,  student_status, personal_tutor ) 
							   VALUES (:firstname, :surname, :term_address_line1, :term_address_line2, :term_address_postcode, :term_address_county, :home_address_line1, :home_address_line2, :home_address_postcode, :home_address_county, :telephone_number, :email_address, :course_code,  :student_status, :personal_tutor )');

		$criteria = [
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['surname'],
			'term_address_line1' => $_POST['termaddress1'],
			'term_address_line2' => $_POST['termaddress2'],
			'term_address_postcode' => $_POST['termaddresspost'],
			'term_address_county' => $_POST['termaddresscounty'],
			'home_address_line1' => $_POST['nontermaddress1'],
			'home_address_line2' => $_POST['nontermaddress2'],
			'home_address_postcode' => $_POST['nontermaddresspost'],
			'home_address_county' => $_POST['nontermaddresscounty'],
			'telephone_number' => $_POST['telephone'],
			'email_address' => $_POST['email'],
			'course_code' => $_POST['coursecode'],
			//'entry_qualifications' => $_POST['myList'],
			'student_status' => $_POST['status'],
			'personal_tutor' => $_POST['tutor']
		];
			
		$stmt->execute($criteria);
		echo 'student added';
	}
?>