<?php session_start();?>
		<form action="AddUser" method="post">
		
				<label class="textBoxSideLabel" for="firstname">First_Name</label> <input type="text" style="width: 300px;" id="firstname"  name="firstname" ><br /><br />
				<label class="textBoxSideLabel" for="middlenames">Middle names</label> <input type="text" style="width: 300px;" id="middlenames"   name="middlenames" ><br /><br />
				<label class="textBoxSideLabel" for="surname">Surname</label> <input type="text" style="width: 300px;" id="surname"   name="surname" ><br /><br />
				<label class="textBoxSideLabel" for="addressline1">Address_line 1</label> <input type="text" style="width: 300px;" id="addressline1"  name="addressline1" ><br /><br />
				<label class="textBoxSideLabel" for="addressline2">Address_line 2</label> <input type="text" style="width: 300px;" id="addressline2"  name="addressline2" ><br /><br />
				<label class="textBoxSideLabel" for="addresspost">Address_Postcode</label> <input type="text" style="width: 300px;" id="addresspost"  name="addresspost" ><br /><br />
				<label class="textBoxSideLabel" for="addresscounty">Address_county</label> <input type="text" style="width: 300px;" id="addresscounty"  name="addresscounty" ><br /><br />
				<label class="textBoxSideLabel" for="telephone">Telephone_Number</label> <input type="text" style="width: 300px;" id="telephone"  name="telephone" ><br /><br />
				<label class="textBoxSideLabel" for="email">Email_Address</label> <input type="text" style="width: 300px;" id="email"  name="email" ><br /><br />
				<label class="textBoxSideLabel" for="qualifcations">Qualifications</label> <input type="text" style="width: 300px;" id="qualifications"  name="qualifications"> </br><br />
				<label class="textBoxSideLabel" for="status">Status</label> 
											<select name='status'>
												<option value="Active">Active </option>
												<option value="Inactive">Inactive </option>
											</select>
											<br /><br />
				<label class="textBoxSideLabel" for="loa">Level of Access</label>
											<select name='loa'>
												<option value="1">Lecturer </option>
												<option value="2">Admin </option>
											</select>
											</br></br>
				<input type="submit" value="Add Staff Member" name="submit" style="width: 150px; height: 25px;">			
					
			
			
			</form>
		</div>
	</body>
</html>
<?php
	if (isset($_POST['submit']))	{
		
$staffTable = new DatabaseTable($pdo, 'staff');

$record = [
	'staff_id' => $_GET['staffid'],
	'firstname' => $_POST['firstname'],
	'middle_names' => $_POST['middlenames'],
	'surname' => $_POST['surname'],
	'address_line1' => $_POST['addressline1'],
	'address_line2' => $_POST['addressline2'],
	'address_postcode' => $_POST['addresspost'],
	'address_county' => $_POST['addresscounty'],
	'telephone_number' => $_POST['telephone'],
	'email_address' => $_POST['email'],
	'qualification' => $_POST['qualifications'],
	'status' => $_POST['status'],
	'loa' => $_POST['loa']

	
];

$staffTable->save($record);
	}
	
?>

