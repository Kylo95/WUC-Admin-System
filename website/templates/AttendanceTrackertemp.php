
			<div id="dynamicBox" style="width: 648px; height: 480px;">
				<br />
				<br />
				<h2>Attendance Tracker</h2>
				<br />
				<form action="attendancetrackerbystudent" method="post">
					Track by student:<br />
					<input type="text" name="studentid" style="width: 250px;"><br /><br />
				<input type="submit" value="Search" style="width: 250px; height: 40px;">
				</form>	
				<form action="attendancetrackerbymodule" method="post">
					- or -<br /><br />
					Track by module:<br />
					<input type="password" name="module" style="width: 250px;"><br /><br />
					<input type="submit" value="Search" style="width: 250px; height: 40px;">
				</form>
			</div>
		</div>
	</body>
</html>
