				<?php
					if(!isset($_GET['module']))
					{
					?>
						<div id="dynamicBox" style="width: 648px; height: 480px;">
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<form action="timetablemanagement" method="get">
								Search by module code<br />
								<input type="text" name="module" style="width: 250px;"><br /><br />
								<input type="submit" value="Search" style="width: 150px; height: 25px;">
							</form>
						</div>
					<?php 
					}
					else
					{
						require '../classes/database.php';
						require '../classes/tableGenerator.php';
					?>
						<form>
							<?php
								$tableTest = new DatabaseTable($pdo, 'students');
								
								$record = [
									'student_id' => 2,
									'firstname' => 'Joe'
								];
								
								var_dump($tableTest->find($record));
							
								$moduleTable = new TableGenerator();
								$moduleTable->setStyle('table');
								$moduleTable->setHeadings(['', '9-10', '10-11', '11-12', '12-1', '1-2', '2-3', '3-4', '4-5', '5-6']);
								$moduleTable->setColumnTypes(['th', 'td', 'td', 'td', 'td', 'td', 'td', 'td', 'td', 'td']);
								$moduleTable->addRow(['', '9-10', '10-11', '11-12', '12-1', '1-2', '2-3', '3-4', '4-5', '5-6']);
								$moduleTable->addRow(['', '9-10', '10-11', '11-12', '12-1', '1-2', '2-3', '3-4', '4-5', '5-6']);
								echo($moduleTable->getHTML());
							?>
							<table class="table">
								<tr>
									<th></th>
									<th>9-10</th>
									<th>10-11</th>
									<th>11-12</th>
									<th>12-1</th>
									<th>1-2</th>
									<th>2-3</th>
									<th>3-4</th>
									<th>4-5</th>
									<th>5-6</th>
								</tr>
								<tr>
									<th>Mon</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
								<tr>
									<th>Tue</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
								<tr>
									<th>Wed</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
								<tr>
									<th>Thu</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
								<tr>
									<th>Fri</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
								<tr>
									<th>Sat</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
								<tr>
									<th>Sun</th>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
									<td><input type="text" name="email" style="width: 90px;"></td>
								</tr>
							</table>
							<br />
							<br />
							<br />
							<input type="submit" value="Amend" style="width: 150px; height: 25px;">
						</form>
					<?php 
					}
				?>
		</div>
	</body>
</html>
