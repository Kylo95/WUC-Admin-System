
			<form action="addcourse" method="post">

				<label class="textBoxSideLabel" for="course_code">course code</label> <input type="text" style="width: 300px;" id="course_code" name="course_code"><br /><br />
				<label class="textBoxSideLabel" for="course_title">course title</label> <input type="text" style="width: 300px;" id="course_title" name="course_title"><br /><br />
				<label class="textBoxSideLabel" for="course_description">course description</label> <input type="text" style="width: 300px;" id="course_description" name="course_description"><br /><br />


				<label class="textBoxSideLabel" for="Course leader">Course_leader</label>
							<select name='course_leader'>
													<?php
									$stmt = $pdo->query('SELECT * FROM staff');
									foreach ($stmt as $row){
										echo '<option value="' . $row['staff_id'] . '">' . $row['firstname'] . ' ' . $row['surname'] . '</option>'; //showing all the categories in the database//
									}
																								?>
									</select></br></br>

			<label class="textBoxSideLabel" for="module_1">module_1</label>
						<select name='module_1'>
												<?php
								$stmt = $pdo->query('SELECT * FROM modules');
								foreach ($stmt as $row){
									echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
								}
																							?>
								</select></br></br>

			<label class="textBoxSideLabel" for="module_2">module_2</label>
						<select name='module_2'>
												<?php
								$stmt = $pdo->query('SELECT * FROM modules');
								foreach ($stmt as $row){
									echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
								}
																							?>
								</select></br></br>

			<label class="textBoxSideLabel" for="module_3">module_3</label>
						<select name='module_3'>
												<?php
								$stmt = $pdo->query('SELECT * FROM modules');
								foreach ($stmt as $row){
									echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
								}
																							?>
								</select></br></br>

			<label class="textBoxSideLabel" for="module_4">module_4</label>
						<select name='module_4'>
												<?php
								$stmt = $pdo->query('SELECT * FROM modules');
								foreach ($stmt as $row){
									echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
								}
																							?>
								</select></br></br>
			<label class="textBoxSideLabel" for="module_5">module_5</label>
						<select name='module_5'>
												<?php
								$stmt = $pdo->query('SELECT * FROM modules');
								foreach ($stmt as $row){
									echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
								}
																							?>
								</select></br></br>

			<label class="textBoxSideLabel" for="module_6">module_6</label>
						<select name='module_6'>
												<?php
								$stmt = $pdo->query('SELECT * FROM modules');
								foreach ($stmt as $row){
									echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
								}
																							?>
								</select></br></br>
										<input type="submit" value="submit" name="submit" />
	</body>
</html>
<?php

	if (isset($_POST['submit'])) {


		$stmt = $pdo->prepare('INSERT INTO courses ( course_id, course_title, course_description, course_leader_id)
							   VALUES (:course_id, :course_title, :course_description, :course_leader_id)');



		$criteria = [
			'course_id' => $_POST['course_code'],
			'course_title' => $_POST['course_title'],
			'course_description' => $_POST['course_description'],
			'course_leader_id' => $_POST['course_leader'],


			];

				$stmt->execute($criteria);

		$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
														VALUES (:course_id, :module_id)');

		$criteria = [
			'course_id' => $_POST['course_code'],
			'module_id' => $_POST['module_1'],
		];
		$stmt->execute($criteria);
		$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
														VALUES (:course_id, :module_id)');

		$criteria = [
			'course_id' => $_POST['course_code'],
			'module_id' => $_POST['module_2'],
		];
			$stmt->execute($criteria);
			$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
															VALUES (:course_id, :module_id)');

			$criteria = [
				'course_id' => $_POST['course_code'],
				'module_id' => $_POST['module_3'],
			];
			$stmt->execute($criteria);
			$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
															VALUES (:course_id, :module_id)');

			$criteria = [
				'course_id' => $_POST['course_code'],
				'module_id' => $_POST['module_4'],
			];
			$stmt->execute($criteria);
			$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
															VALUES (:course_id, :module_id)');

			$criteria = [
				'course_id' => $_POST['course_code'],
				'module_id' => $_POST['module_5'],
			];
			$stmt->execute($criteria);

			$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
															VALUES (:course_id, :module_id)');

			$criteria = [
				'course_id' => $_POST['course_code'],
				'module_id' => $_POST['module_6'],
			];
			$stmt->execute($criteria);

		echo ' <br> Course added';
	}
?>
