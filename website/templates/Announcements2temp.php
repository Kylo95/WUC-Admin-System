
		<?php 			if(isset($_GET['moduleid'])){	
							$stmt = $pdo->prepare('SELECT * FROM announcements WHERE module_id = :module');

										$criteria = [
													'module' => $_GET['moduleid']
													];			
													
										$stmt->execute($criteria);
												
												foreach ($stmt as $row)
												{
													
														$staffDetails = new DatabaseTable($pdo, 'staff');
														$record = [
																'staff_id' => $row['staff_id']

																];
														$stmt = $staffDetails->find($record);
															
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
										}			
													

														
										
										
										
	
	
		?>

		</div>
	</body>
</html>
