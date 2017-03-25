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
			<button class="topButton"><a href="Studentdetails<?php echo('?studentid=' . $_GET['studentid'] ); ?>">View</a></button><button class="topButton"><a href="amendstudent<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Amend</a></button><button class="topButton"><a href="viewstudentgrades<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Grades</a></button><button class="topButton"><a href="viewstudenttimetable<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Timetable</a></button><button class="topButton"><a href="resetstudentpassword<?php echo('?studentid=' . $_GET['studentid'] ); ?>">Password</a></button>
		</div>
		<div id="mainContent" style="text-align: center">
		


			<p>Student ID: <?php echo $_GET['studentid'];?></p>
			<p>Course Code: <?php echo $row['course_code'];?></p><br/>
	
			<table class="table">
				<tr>
					<th></th>
					<th>Ass1</th>
					<th>Ass2</th>
					<th>Ass3</th>
				</tr>
				<tr>
					<th>module_1</th>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>module_2</th>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>module_3</th>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>module_4</th>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>module_5</th>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>module_6</th>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	</body>
</html>
<?php 
	}
	}
	?>