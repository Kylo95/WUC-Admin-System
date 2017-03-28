
		<?php	
		
							$stmt = $pdo->query('SELECT * FROM announcements');
												foreach ($stmt as $row)
												{
													
														$studentDetails = new DatabaseTable($pdo, 'staff');
														$record = [
																'staff_id' => $row['staff_id']

																];

																$stmt = $studentDetails->find($record);
																foreach ($stmt as $staff)
															{
														echo '<div class="announcement">
																<div class="announcementHeader"> 
																Module Code:' . $row["module_id"] . 
																'</div>	
																<div class="announcementBody">' .
																	$row["message"] .
																'</br></br>
																<div class ="announcementbottom">
																Posted By ' . $staff['firstname'] . ' ' .$staff['surname'] .
																	' On ' . $row['post_date'] .
															'</div>	
														</div>
														</div>';
													
															}
												}
															
														
										
										
		?>

		</div>
	</body>
</html>