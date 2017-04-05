<form action="EnterGrades2" method = "GET">
<label>Please select a module ID: </label>
<br>
<select name="modulesearch">
			<?php
				$stmt = $pdo->query('SELECT * FROM modules');
				foreach ($stmt as $module){
				 ?>
				 <option><?php echo $module['module_id']?></option>

				 <?php
				}
			?>

		</select>
		<input type="submit" value="search" name="search" />
</form>
		<?php
			if(isset($_GET['modulesearch'])){

				$stmt = $pdo->query('SELECT * FROM modules');
				$stmt = $pdo->prepare('SELECT s.student_id, s.firstname, s.surname
									FROM students s
									LEFT JOIN courses c
									ON s.course_code = c.course_id
									LEFT JOIN course_modules cm
									ON c.course_id = cm.course_id
									LEFT JOIN modules m
									ON cm.module_id = m.module_id
                                    WHERE cm.module_id = :module_id');
				$criteria = [
					'module_id' =>$_GET['modulesearch']
					];

				$stmt->execute($criteria);
			}
?>

			<form action='entergrades2' method='POST'>
				<table class="table">

					<tr>
						<th>Student ID</th>
						<th>Student name</th>
						<th>Assignment 1</th>
						<th>Assignment 2</th>
						<th>Exam</th>
						<th>Save</th>
					</tr>
					<tr>
						<?php
						$i = 0;
						foreach ($stmt as $row)
												{
						?>
						<td><input type="text" name="student_id[<?php echo $i;?>]" value="<?php echo $row['student_id'] ; ?>" style="width: 45px;" readonly></td>
						<td><?php echo $row['firstname'] . ' ' . $row['surname']; ?></td>
						<input type="hidden" name="module_id" value="<?php echo $_GET['modulesearch']?>"/>
						<td><input type="text" id= "grade1" name="grade1[<?php echo $i;?>]" style="width: 45px;"/></td>
						<input type="hidden" id= "grade1_date" name="grade1_date" value="<?php echo date('Y-m-d');?>" />
						<td><input type="text" id= "grade2" name="grade2[<?php echo $i;?>]" style="width: 45px;"/></td>
						<input type="hidden" id= "grade2_date" name="grade2_date" value="<?php echo date('Y-m-d');?>" />
						<td><input type="text" id= "grade3" name="grade3[<?php echo $i;?>]" style="width: 45px;"/></td>
						<input type="hidden" id= "grade3_date" name="grade3_date" value="<?php echo date('Y-m-d');?>"/>
						<td><input type="submit" value="Save" name="submit[<?php echo $i;?>]" style="width: 90px; height: 25px;"></td>
					</tr>
												<?php
												$i++;


											 } ?>
					</table>
				<br />
				<br />
				<br />


			</form>
						<?php

				if (! empty($_POST['submit'])) {

					foreach ($_POST['submit'] as $key => $posted) {
							$student_id = isset($_POST['student_id'][$key]) ? $_POST['student_id'][$key] : '';
							$grade1 = isset($_POST['grade1'][$key]) ? $_POST['grade1'][$key] : '';
							$grade2 = isset($_POST['grade2'][$key]) ? $_POST['grade2'][$key] : '';
							$grade3 = isset($_POST['grade3'][$key]) ? $_POST['grade3'][$key] : '';

							$stmt = $pdo->prepare('INSERT INTO grades (student_id, module_id, grade1, grade1_date, grade2, grade2_date, grade3, grade3_date) VALUES (:student_id, :module_id, :grade1, :grade1_date, :grade2, :grade2_date, :grade3, :grade3_date)');

							$criteria = [
								'student_id' => $student_id,
								'module_id' => $_POST['module_id'],
								'grade1' => $grade1,
								'grade1_date' => $_POST['grade1_date'],
								'grade2' => $grade2,
								'grade2_date' => $_POST['grade2_date'],
								'grade3' => $grade3,
								'grade3_date' => $_POST['grade3_date']
							];

							$stmt->execute($criteria);
							 ?>
							 <script>
							 			alert("Grades Added, Thank You!");
							 </script>
							 <?php
					}
	}
			  ?>
		</div>
	</body>
</html>
