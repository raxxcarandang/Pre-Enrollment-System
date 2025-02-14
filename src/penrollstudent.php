<!DOCTYPE html>
<html lang = en>
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Dashboard</title>
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href= "css/font-awesome.min.css">
	<script src = "js/jquery-3.5.1.min.js"></script>
	<script src = "js/popper.min.js"></script>
	<script src = "js/bootstrap.min.js"></script>
	<link rel = "stylesheet" href="css/penrollstudent.css">
		
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
					<a href = "penrolllogin.php" class = "btn btn-danger pull-left" id = "logout">Log-Out</a>
						<h2 class="mt-5 mb-3 clearfix" align="center">Student Dashboard</h2>
					</div>
					<?php
					require_once "penrollconfig.php";
					$student_number = $_GET['student_number'];
					$sql = "SELECT * FROM student_info WHERE student_number = '$student_number'" ;
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped" id = "outtable">';
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
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>STUDENT WAS NOT PRE-ENROLLED! PLEASE TRY AGAIN LATER.</b></div>';
						}
						}
					else {
						echo "Oops! Something wnet wrong. Please try again later.";
					}
					echo "<br>";
					$sqlsubj = "SELECT * FROM subject_info WHERE student_number = '$student_number'" ;
					if($resultsubj = mysqli_query($link, $sqlsubj)){
						if(mysqli_num_rows($resultsubj) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "outtable2">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										//echo "<th>Student Number</th>";
										echo "<th>SUBJECT CODE</th>";
										echo "<th width = 425px>SUBJECT DESCRIPTION</th>";
										echo "<th>UNITS</th>";
										echo "<th>SECTION</th>";
										echo "<th>SCHEDULE</th>";
										echo "<th>TIME</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($rowsubj = mysqli_fetch_array($resultsubj)){
									echo "<tr>";
										//echo "<td>" . $rowsubj['student_number'] . "</td>";
										echo "<td>" . $rowsubj['subject_code'] . "</td>";
										echo "<td>" . $rowsubj['subject_desc'] . "</td>";
										echo "<td>" . $rowsubj['units'] . "</td>";
										echo "<td>" . $rowsubj['section'] . "</td>";
										echo "<td>" . $rowsubj['day'] . "</td>";
										echo "<td>" . $rowsubj['time'] . "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($resultsubj);
						}
						else {
							echo '<div class ="alert alert-danger" align = "center"><b>SUBJECTS ARE TO BE DETERMINED BY THE ADMINISTRATORS.</b></div>';
						}
						}
					else {
						echo "Oops! Something wnet wrong. Please try again later.";
					}
					mysqli_close($link);
					?>
				</div>
			</div>
		</div>
	</div>				
</body>
</html>