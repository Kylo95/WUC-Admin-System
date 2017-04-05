
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
				<?php if(isset($_SESSION['user'])) echo('<button style="width: 80px; height: 30px;"><a href="logout">Logout</button></a>'); ?>
			</div>
		</header>
		<?php if (isset($_SESSION['priv']) && $_SESSION['priv'] == 2){ ?>
		<div id="sideBar">
			<a href="studentmanagment"><button class="sidebutton">Student Management</button></a>
			<a href=" coursemanagement"><button class="sidebutton">Course Management</button></a>
			<a href="timetablemanagement"><button class="sidebutton">Timetable Management</button></a>
			<a href="entergrades2"><button class="sidebutton">Grade Management</button></a>
			<a href="attendancetracker"><button class="sidebutton">Track Attendance</button></a>
			<button class="sidebutton">Diary Management</button>
			<a href="announcements"><button class="sidebutton">Announcements</button></a>
			<a href="AddDeleteUser"><button class="sidebutton">Add/Delete User</button></a>			
		</div>
		<?php } ?>
		<?php if (isset($_SESSION['priv']) && $_SESSION['priv'] == 1){ ?>
		<div id="sideBar">
			<button class="sidebutton">Existing Student Management</button>
			<button class="sidebutton">Enrol Student</button>
			<button class="sidebutton">Timetable Management</button>
			<button class="sidebutton">Grade Management</button>
			<a href="attendancetracker"><button class="sidebutton">Track Attendance</button></a>
			<button class="sidebutton">Diary Management</button>
			<a href="announcements"><button class="sidebutton">Announcements</button></a>
			<button class="sidebutton">Add/Delete User</button>			
		</div>
		<?php } ?>
		<div id="mainContent" style="text-align: center">
			
			<?php echo $content?>