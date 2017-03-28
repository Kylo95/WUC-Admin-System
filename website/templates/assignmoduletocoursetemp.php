
			<form action="assignmoduletocourse" method="post">


				<label class="textBoxSideLabel" for="module">module</label>
							<select name='module'>
													<?php
									$stmt = $pdo->query('SELECT * FROM modules');
									foreach ($stmt as $row){
										echo '<option value="' . $row['module_id'] . '">' . $row['module_title'] . '</option>'; //showing all the categories in the database//
									}
																								?>
									</select></br></br>

					<label class="textBoxSideLabel" for="course">course</label>
								<select name='course'>
														<?php
										$stmt = $pdo->query('SELECT * FROM courses');
										foreach ($stmt as $row){
											echo '<option value="' . $row['course_id'] . '">' . $row['course_title'] . '</option>'; //showing all the categories in the database//
										}
																									?>
										</select></br></br>





										<input type="submit" value="submit" name="submit" />
	</body>
</html>
<?php

	if (isset($_POST['submit'])) {



		$stmt = $pdo->prepare('INSERT INTO course_modules (course_id, module_id)
							   VALUES (:course_id, :module_id)');

		$criteria = [
			'course_id' => $_POST['course'],
			'module_id' => $_POST['module'],
		];

		$stmt->execute($criteria);

		echo ' <br> Module added to course';
	}
?>
