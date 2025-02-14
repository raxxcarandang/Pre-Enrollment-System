
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Set Subject Record</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/penrollsetsubject.css">
	<link
        href="css/font-google.css"
        rel="stylesheet">
		<link
        href="css/fonts.googleapis.com_css2_family=Poppins_ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,900&display=swap.css"
        rel="stylesheet">
	
</head>
<body>								
	<div class="wrapper">

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<br><br>
		<a href = "penrolladmin.php" class = "btn btn-danger pull-left" id = "logout">BACK TO DASHBOARD</a>
					<h1 class="mt-1 mb-3" align = "center" id = "header">SUBJECT MANAGEMENT</h1>

					<div class="col-md-12">
					<?php
					require_once "penrollconfig.php";
					$student_number = $_GET['student_number'];
					$sql = "SELECT * FROM student_info WHERE student_number = '$student_number'" ;
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped" id = "table">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										//echo "<th>Student Number</th>";
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
										//echo "<td>" . $row['student_number'] . "</td>";
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
							echo '<div class ="alert alert-danger" align="center"><b>NO STUDENTS HAVE PRE-ENROLLED.</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
					
					$sqlsubj = "SELECT * FROM subject_info WHERE student_number = '$student_number'" ;
					if($resultsubj = mysqli_query($link, $sqlsubj)){
						if(mysqli_num_rows($resultsubj) > 0) {
							echo "<br>";
							echo '<table class="table table-bordered table=striped table-responsive" id = "table2">';
								echo "<thead class = 'table' id = 'thead'>";
									echo "<tr>";
										//echo "<th>Student Number</th>";
										echo "<th>SUBJECT CODE</th>";
										echo "<th>SUBJECT DESCRIPTION</th>";
										echo "<th>UNITS</th>";
										echo "<th width=50px>SECTION</th>";
										echo "<th>SCHEDULE</th>";
										echo "<th>TIME</th>";
										echo "<th>ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($rowsubj = mysqli_fetch_array($resultsubj)){
									echo "<tr>";
										//echo "<td>" . $rowsubj['student_number'] . "</td>";
										echo "<td>   " . $rowsubj['subject_code'] . "</td>";
										echo "<td>   " . $rowsubj['subject_desc'] . "</td>";
										echo "<td>   " . $rowsubj['units'] . "</td>";
										echo "<td>   " . $rowsubj['section'] . "</td>";
										echo "<td>   " . $rowsubj['day'] . "</td>";
										echo "<td>   " . $rowsubj['time'] . "</td>";
										echo "<td>";
											echo '<a href="penrolldeletesubj.php?subjectid=' . $rowsubj['subjectid'] . "&student_number=" . $rowsubj['student_number'] . '" class = "mr-3" title = "Delete Record" data-toggle="tooltip"><span class="deleteicon">DELETE</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($resultsubj);
						}
						else {
							echo '<br>';
							echo '<div class ="alert alert-danger" align="center"><b>NO SUBJECTS HAVE BEEN ASSIGNED TO THIS STUDENT.</b></div>';
						}
						}
					else {
						echo "Oops! Something wnet wrong. Please try again later.";
					}
					echo '<input type = "button" id = "addbutton" value = "EDIT SUBJECT" onclick = "editstudent()"/>';
					mysqli_close($link);
					?>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php echo "<script>
function editstudent() {
window.location.href = 'penrolladdsub.php?student_number=$student_number&subject=0';
}
</script>";
?>
</html>