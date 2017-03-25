<?php
require 'database.php';?>
			<div id="dynamicBox" style="width: 648px; height: 480px;">
				<br />
				<br />
				<h2>Announcements</h2>
				<br />
				<form action="login.php" method="post">
					Search by module code:<br />
					<input type="text" name="studentid" style="width: 250px;"> <input type="submit" value="Search" style="width: 100px; height: 21px;"><br /><br />
					- or -<br /><br />
					<input type="submit" value="View all announcements" style="width: 250px; height: 40px;">
				</form>
			</div>
		</div>
	</body>
</html>
