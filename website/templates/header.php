
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="stylesheets/general.css"/>
		<title>Woodlands University College</title>
	</head>
	<body>
		<header>
			<div id="headerLeft">
				<img src="images/wucLogo.png" id="logo" />
				<h1>Administration System</h1>
			</div><div id="headerRight">
				<button style="width: 80px; height: 30px;"><a href="logout">Logout</a></button>
			</div>
		</header>
		<?php if (isset($_SESSION['priv']) && $_SESSION['priv'] == 2){ ?>
		<div id="sideBar">
			<button class="sidebutton"><a href="StudentSearch">Existing Student Management</a></li>
			<button class="sidebutton"><a href=" EnrolStudent">Enrol Student</a></li>
			<button class="sidebutton"><a href="timetablemanagement">Timetable Management</a></li>
			<button class="sidebutton"><a href="entergrades2">Grade Management</a></li>
			<button class="sidebutton"><a href="attendancetracker">Track Attendance</a></li>
			<button class="sidebutton">Diary Management</button>
			<button class="sidebutton"><a href="announcements">Announcements</a></li>
			<button class="sidebutton"><a href="AddDeleteUser">Add/Delete User</a></li>			
		</div>
		<?php } ?>
		<?php if (isset($_SESSION['priv']) && $_SESSION['priv'] == 1){ ?>
		<div id="sideBar">
			<button class="sidebutton">Existing Student Management</li>
			<button class="sidebutton">Enrol Student</li>
			<button class="sidebutton">Timetable Management</li>
			<button class="sidebutton">Grade Management</li>
			<button class="sidebutton"><a href="attendancetracker">Track Attendance</a></li>
			<button class="sidebutton">Diary Management</button>
			<button class="sidebutton"><a href="announcements">Announcements</a></li>
			<button class="sidebutton">Add/Delete User</li>			
		</div>
		<?php } ?>
		<div id="mainContent" style="text-align: center">
			
			<?php echo $content?>