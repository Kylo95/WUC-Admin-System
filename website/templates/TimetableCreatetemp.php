			<div style="text-align: left;"><a href="TimetableManagement"><div id="backbutton">Back</div></a></div>
			<br />
			<br />
			<br />	
			<?php
				//Check if new data has been posted
				if(isset($_POST['submit']))
				{
					
					$error = 0;
					
					$date1 = DateTime::createFromFormat('d/m/Y H', $_POST['startdate'] . ' ' . $_POST['starttime']);
					$date2 = DateTime::createFromFormat('d/m/Y', $_POST['enddate']);
					
					if(empty($_POST['startdate']))
					{
						echo("<p>Start date cannot be left empty.</p>");
						$error = 1;
					}
					else if(!$date1) {
						echo("<p>Start date format provided is incorrect! Use DD/MM/YYYY</p>");
						$error = 1;
					}
					
					if(isset($_POST['repeat']))
					{
						if(empty($_POST['enddate']))
						{
							echo("<p>End date must be provided if lesson must repeat.</p>");
							$error = 1;
						}
						else if(!$date2) {
							echo("<p>End date format provided is incorrect! Use DD/MM/YYYY</p>");
							$error = 1;
						}
						
						if($error == 0 && $date1 > $date2)
						{
							echo("<p>End date must occur after start date.</p>");
							$error = 1;
						}
					}
						
					
					
					//module
					//startdate
					//starttime
					//enddate
					//repeat
					//room
					//tutor
					
					
					
					if(!$error)
					{
						$lessonsTable = new DatabaseTable($pdo, 'lessons');
						$failed = [];
						
						if(isset($_POST['repeat']))
							$numberOfWeeks = floor($date1->diff($date2)->days/7);
						else
							$numberOfWeeks = 0;
						for($i=0; $i<=$numberOfWeeks; $i++)
						{
							$record = [
								'module_id' => $_POST['module'],
								'time_date' => $date1->format('Y-m-d H'),
								'room_id' => $_POST['room'],
								'staff_id' => $_POST['tutor']
							];
							
							$date1->modify('+7 days');
							$result = $lessonsTable->find(['time_date' => $record['time_date']])->fetch();
							if($result)
								array_push($failed, $result);
							else
								$lessonsTable->save($record);
						}
						
						if($failed)
						{
							echo('<p>Some lessons could not be created because lessons already exist in their slots:</p>');
							foreach ($failed as $key => $value) {
								$newDate = new DateTime($value['time_date']);
								echo('<p>Module ID: ' . $value['module_id'] . ', Room ID: ' . $value['room_id'] . ', Staff ID: ' . $value['staff_id'] . ' on ' . $newDate->format('d/m/Y') . ' at ' . $newDate->format('hA') . '</p>');
							}
						}
						else if($i > 1)
							echo("<p>Lessons have been created successfully.</p>");
						else
							echo("<p>Lesson has been created successfully.</p>");
					}
				}
				
				//If not check if course needs to be selected, if not show form
				if(!isset($_GET['course']))
				{
					//Create courses table and get all courses data
					$coursesTable = new DatabaseTable($pdo, 'courses');
					$courses = $coursesTable->allData();
			?>
				<div id="dynamicBox" style="width: 648px; height: 480px;">
					<br />
					<br />
					<h2>Create Lesson - Select Course</h2>
					<br />
					<?php
						if(empty($courses)) {
							echo("<br /><br /><br /><br /><br />No courses exist! Be sure to create a course before creating a lesson.");
						}
						else
						{
					?>
					<form action="TimetableCreate" method="get">
						Course<br />
						<select style="width: 600px;" name="course">
						<?php
							foreach ($courses as $course) {
								?>
									<option value="<?php echo $course['course_id']; ?>"><?php echo $course['course_id'] . ' - ' . $course['course_title'] . ' - ' . $course['course_description'] ?></option>
								<?php
							}
						?>
						</select><br /><br /><br /><br /><br /><br /><br /><br />
						<input type="submit" value="Submit" style="width: 150px; height: 20px;">
					</form>
					<?php
						}
					?>
				</div>
			<?php
				}
				else
				{			
					//Create course modules table
					$courseModulesTable = new DatabaseTable($pdo, 'course_modules');
					
					//Find course provided by user
					$record = [
						'course_id' => $_GET['course']
					];
					$courseModulesObject = $courseModulesTable->find($record);
					$courseModules = $courseModulesObject->fetchAll();
					
					//Check if course has any modules, if not show error
					if(empty($courseModules))
					{
						echo("<br /><br /><br /><br /><br />No modules currently exist for the course you have selected, add modules to the course before creating a lesson.");
					}
					else
					{
						$roomsTable = new DatabaseTable($pdo, 'rooms');
						$staffTable = new DatabaseTable($pdo, 'staff');
						$modulesTable = new DatabaseTable($pdo, 'modules');
						$rooms = $roomsTable->allData();
						$staffs = $staffTable->allData();
			?>
			<h2>Create Lesson</h2>
			<br />
			<br />
			<form action="TimetableCreate" method="post">
				<label class="textBoxSideLabel" for="module">Module</label> <select style="width: 300px;" name="module">
				<?php
					foreach ($courseModules as $courseModule) {
						$record = [
							'module_id' =>  $courseModule['module_id']
						];
						$module = $modulesTable->find($record)->fetch();
						echo '<option value="' . $module['module_id'] . '">'. $module['module_id'] . ' - ' . $module['module_title'] . '</option>';
					}
				?>
				</select><br /><br />
				<label class="textBoxSideLabel" for="startdate">Start Date</label> <input type="text" style="width: 300px;" name="startdate" value="DD/MM/YYYY"><br /><br />
				<label class="textBoxSideLabel" for="startdate">Lesson Hour</label> <select style="width: 300px;" name="starttime">
					<option value="9">9AM - 10AM</option>
					<option value="10">10AM - 11AM</option>
					<option value="11">11AM - 12PM</option>
					<option value="12">12PM - 1PM</option>
					<option value="13">1PM - 2PM</option>
					<option value="14">2PM - 3PM</option>
					<option value="15">3PM - 4PM</option>
					<option value="16">4PM - 5PM</option>
					<option value="17">5PM - 6PM</option>
				</select><br /><br />
				<label class="textBoxSideLabel" for="enddate">End Date</label> <input type="text" style="width: 300px;" name="enddate" value=""><br /><br />
				<label class="textBoxSideLabel" for="repeat">Repeat Weekly</label> <input type="checkbox" style="width: 300px;" name="repeat" value="0"><br /><br />
				<label class="textBoxSideLabel" for="room">Room</label> <select style="width: 300px;" name="room">
				<?php
					foreach ($rooms as $room)
						echo '<option value="' . $room['room_id'] . '">'. $room['room_id'] . ' - ' . $room['room_type'] . ' (capacity ' . $room['room_capacity'] . ' people)</option>';
				?>
				</select><br /><br />
				<label class="textBoxSideLabel" for="tutor">Tutor</label> <select style="width: 300px;" name="tutor">
				<?php
					foreach ($staffs as $staff)
						echo '<option value="' . $staff['staff_id'] . '">'. $staff['staff_id'] . ' - ' . $staff['firstname'] . ' ' . $staff['surname'] . '</option>';
				?>
				</select><br /><br /><br />
				<input type="submit" value="Create" name="submit" style="width: 150px; height: 25px;">
			</form>
			<?php
					}
			?>
		</div>
	</body>
</html>
<?php
				}
?>