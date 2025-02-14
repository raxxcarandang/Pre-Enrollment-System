<?php 
	if(isset($_POST["student_number"]) && !empty($_POST["student_number"])){
		require_once "penrollconfig.php";
		
		$sqldelsub = "DELETE FROM `subject_info` WHERE student_number = ?";
		
		if($stmtdelsub = mysqli_prepare($link, $sqldelsub)){
			mysqli_stmt_bind_param($stmtdelsub, "s", $setstudnum);
			
			$setstudnum = trim($_POST["student_number"]);
			mysqli_stmt_execute($stmtdelsub);
		}
		
		mysqli_stmt_close($stmtdelsub);
		
		$sqldellog = "DELETE FROM `login_info` WHERE student_number = ?";
		if($stmtdellog = mysqli_prepare($link, $sqldellog)){
			mysqli_stmt_bind_param($stmtdellog, "s", $setstudnum);
			
			$setstudnum = trim($_POST["student_number"]);
			mysqli_stmt_execute($stmtdellog);
		}
		mysqli_stmt_close($stmtdellog);
		
		$sql = "DELETE FROM `student_info` WHERE student_number = ?";
		
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $setstudnum);
			
			$setstudnum = trim($_POST["student_number"]);
			
			if(mysqli_stmt_execute($stmt)){
				header("location: penrolladmin.php");
				exit();
			} else{
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($link);
		
	} else {
		if(empty(trim($_GET["student_number"]))){
			header("location: penrollerror.php");
			exit();
		}
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Student Pre-Enrollment Record</title>
	<link rel="stylesheet" href= "css/bootstrap.min.css">
	<link rel="stylesheet" href= "css/penrolldelete.css">
	<link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,900&display=swap"
        rel="stylesheet">
</head>
	<body>
		<div class="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class = "mt-5 mb-3">   DELETE STUDENT PRE-ENROLLMENT</h2>
						<?php
					require_once "penrollconfig.php";
					$student_number = $_GET['student_number'];
					$sql = "SELECT * FROM student_info WHERE student_number = '$student_number'" ;
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped" id = "outtable">';
								echo "<thead class= 'table' id = 'thead'>";
									echo "<tr>";
										//echo "<th>Student Number</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE/YEAR</th>";
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
							echo '<div class ="alert alert-danger"><em>STUDENT DOES NOT EXIST!.</em></div>';
						}
						}
						?>
							<br>
						<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
							<div class = "alert alert-danger" id = "confirm">
								<input type="hidden" name = "student_number" value="<?php echo trim($_GET['student_number']); ?>" />
								<p>ARE YOU SURE YOU WANT TO DELETE #<?php echo trim($_GET['student_number']); ?>'S PRE-ENROLLMENT RECORD? </p>
								<p>                                                     <input type="submit" value="Yes" class="btn btn-danger" id = "button" />
								<a href="penrolladmin.php" class = "btn btn-secondary" id = "button1" >No</a>
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>