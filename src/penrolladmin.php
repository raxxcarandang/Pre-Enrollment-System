<!DOCTYPE html>
<html lang = en>
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href= "css/font-awesome.min.css">
	<script src = "js/jquery-3.5.1.min.js"></script>
	<script src = "js/popper.min.js"></script>
	<script src = "js/bootstrap.min.js"></script>
	<link rel = "stylesheet" href="css/penrolladmin.css">
	<link
        href="css/fonts.googleapis.com_css2_family=Poppins_ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,900&display=swap.css"
        rel="stylesheet">
	<link
        href="css/font-google.css"
        rel="stylesheet">
	<script>
		$(document).ready(function() {
			$('[data=toggle="tooltip"]').tooltip();
		});
	</script>
</head>
<body>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="mt-5 mb-3 clearfix">
					<h1 id = "header" align="center" >ADMIN DASHBOARD</h1>
					<input type = "button" id = "logout" value = "LOG-OUT" onclick = "logout()"/>
					<form method = "POST" action = <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
					<select name = "selecttype" id = "selectbox" onchange = "clearbox()">
					<option value = "1">Status</option>
					<option value = "2">Student #</option>
					<option value = "3">Student Name</option>
					<option value = "4">Course Year</option>
					<option value = "5">School Year</option>
					<option value = "6">Semester</option>
					<option value = "7">Preenrollment</option>
					<option value = "8">Payment</option>
					</select>
					<?php 
					$selection = "";
					$criteria = "";
					$reg = "IRREGULAR";
					if (isset($_POST['regb'])) {
					$reg = $_POST['regb'];
						if ($reg === 'REGULAR') {
						$reg = 'IRREGULAR';
						} else if($reg === 'IRREGULAR') {
						$reg = 'REGULAR';
						}
					}
					if (isset($_POST['selecttype']) && isset($_POST['lookup'])){
					$selection = $_POST['selecttype'];
					$criteria = $_POST['lookup'];
					}
				
					?>
					<input type = "text" name = "lookup" id = "searchbox" value = "<?php echo $criteria; ?>"/><input type = "submit" name = "search" value = "SEARCH" id = "searchbutton"/>
					</form>
					<form method = "POST" action = <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
					<input type = "hidden" name = "selecttype" value = "9001"/>
					<input type = "submit" value = "RESET" id = "resetbutton"/>
					</form>
					<form method = "POST" action = <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
					<input type = "hidden" name = "selecttype" value = "1"/>
					<input type = "hidden" name = "lookup" value = <?php echo $reg; ?>></input>
					<input type = "hidden" name = "regb" value = <?php echo $reg; ?> />
					<input type = "submit" value = <?php echo $reg; ?> id = "regbutton"/>
					</form>
					<input type = "button" id = "addbutton" value = "+ ADD STUDENT" onclick = "addstudent()"/>
					<br><br>
					<?php
					require_once "penrollconfig.php";
					
					switch ($selection) {
						case 1:
					$sql = "SELECT * FROM student_info WHERE status LIKE '$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 2:
					$sql = "SELECT * FROM student_info WHERE student_number LIKE  '$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 3:
					$sql = "SELECT * FROM student_info WHERE student_name LIKE '%$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 4:
					$sql = "SELECT * FROM student_info WHERE course_year LIKE '%$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 5:
					$sql = "SELECT * FROM student_info WHERE school_year LIKE '%$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 6:
					$sql = "SELECT * FROM student_info WHERE semester LIKE '%$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 7:
					$sql = "SELECT * FROM student_info WHERE preenrollment LIKE '%$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						case 8:
					$sql = "SELECT * FROM student_info WHERE payment LIKE '%$criteria%'";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS FOUND WITH THAT CRITERIA.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
						break;
						default:
					$sql = "SELECT * FROM student_info";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">🗑</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS HAVE PRE-ENROLLED.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
					break;
					}
					
					mysqli_close($link);
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>	
		 			
</body>
<script>
	function logout() {
		window.location.href = "penrolllogin.php";
	}
	function addstudent() {
		window.location.href = "penrollcreate.php";
	}
	function clearbox() {
		document.getElementById('searchbox').value = "";
	}

				</script>
</html>