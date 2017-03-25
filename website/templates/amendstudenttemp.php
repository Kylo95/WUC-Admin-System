<?php
	  $pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	if (isset($_GET['studentid'])) {

		$stmt = $pdo->prepare('SELECT * FROM students WHERE student_id = :id');

		$criteria = [
			'id' => $_GET['studentid']
		];

		$stmt->execute($criteria);
		
		
		foreach ($stmt as $row) {
						 
							
					
				
	
	?>
		<div id="topBar">
			<button class="topButton">View</button><button class="topButton">Amend</button><button class="topButton">Grades</button><button class="topButton">Timetable</button><button class="topButton">Password</button>
		</div>
		<form action="amendstudent<?php echo('?studentid=' . $_GET['studentid'] . '&studentname=' . $_GET['studentname']); ?>" method="post">
		<label class="textBoxSideLabel" for="id">Student_ID</label><input type="text" style="width: 300px;" id="id" name="id"placeholder = <?php echo $row['student_id']?>><br /><br />
				<label class="textBoxSideLabel" for="firstname">First_Name</label> <input type="text" style="width: 300px;" id="firstname"  name="firstname" placeholder = <?php echo $row['firstname']?>><br /><br />
				<label class="textBoxSideLabel" for="surname">Surname</label> <input type="text" style="width: 300px;" id="surname"   name="surname" placeholder = <?php echo $row['surname']?>><br /><br />
				<label class="textBoxSideLabel" for="termaddress">Term_address</label> <input type="text" style="width: 300px;" id="termaddress"  name="termaddress" placeholder = <?php echo $row['term_address_line1']?>><br /><br />
				<label class="textBoxSideLabel" for="nontermaddress">Non_Term_Address</label> <input type="text" style="width: 300px;" id="nontermaddress"  name="nontermaddress" placeholder = <?php echo $row['home_address_line1']?>><br /><br />
				<label class="textBoxSideLabel" for="telephone">Telephone_Number</label> <input type="text" style="width: 300px;" id="telephone"  name="telephone" placeholder = <?php echo $row['telephone_number']?>><br /><br />
				<label class="textBoxSideLabel" for="email">Email_Address</label> <input type="text" style="width: 300px;" id="email"  name="email" placeholder = <?php echo $row['email_address']?>><br /><br />
				<label class="textBoxSideLabel" for="coursecode">Course_Code</label> <input type="text" style="width: 300px;" id="coursecode"  name="coursecode" placeholder = <?php echo $row['course_code']?>><br /><br />
				<label class="textBoxSideLabel" for="status">Student_Status</label> <input type="text" style="width: 300px;" id="status"  name="status" placeholder = <?php echo $row['student_status']?>><br /><br />
				<label class="textBoxSideLabel" for="tutor">Personal_Tutor</label> <input type="text" style="width: 300px;" id="tutor"  name="tutor" placeholder = <?php echo $row['personal_tutor']?>><br /><br />
				<label class="textBoxSideLabel" for="entrygrades">Entry_Grades</label> <input type="text" style="width: 300px;" id="entrygrades"  name="entrygrades" placeholder = <?php echo $row['entry_qualifications']?>><br /><br />
			<input type="submit" value="Amend" name="submit" style="width: 150px; height: 25px;">
			
			</form>
		</div>
	</body>
</html>
<?php
	}					
}

	if (isset($_POST['submit']))	{
		
$studentsTable = new DatabaseTable($pdo, 'students');

$record = [
	'student_id' => $_GET['studentid'],
	'surname' => $_POST['surname']
];

$studentsTable->save($record);
	}
	
	echo 
	'<div id="topBar">
			<button class="topButton"><a href="studentdetails"><?php echo("?studentid=" . $_GET["studentid"] . "&studentname=" . $_GET["studentname"]); ?>View</button><button class="topButton"><a href="amendstudent"><?php echo("?studentid=" . $_GET["studentid"] . "&studentname=" . $_GET["studentname"]); ?>Amend</a></button><button class="topButton">Grades</button><button class="topButton">Timetable</button><button class="topButton">Password</button>
		</div>
	Student details ammended';
?>	
	