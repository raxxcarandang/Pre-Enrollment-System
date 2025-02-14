<?php

require_once "penrollconfig.php";

$studname = $studnum = $cyear = $syear = $payment = $semester = $status = $preenrollment = "";
$studnameerror = $studnumerror = $cyearerror = $syearerror = $paymenterror = $semestererror = "";

if (isset($_POST["student_number"]) && !empty($_POST["student_number"])){
	$student_number = $_POST["student_number"];
	
	$enterstatus = trim($_POST["sstatus"]);
	$status = $enterstatus;
	
	$enterpreenrollment = trim($_POST["preenrollment"]);
	$preenrollment = $enterpreenrollment;
	
	$enterstudname = trim($_POST["studname"]);
	if(empty($enterstudname)){
		$studnameerror = "Please enter a name.";
	} else if (!filter_var($enterstudname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z ., A-Z\s]+$/")))){
		$studnameerror = "Please enter a valid name.";
	} else {
		$studname = $enterstudname;
	}
	
	$entercyear = trim($_POST["cyear"]);
	if(empty($entercyear)){
		$cyearerror = "Please enter an address.";
	} else {
		$cyear = $entercyear;
	}
	
	$entersyear = trim($_POST["syear"]);
	if(empty($entersyear)){
		$syearerror = "Please enter an address.";
	} else {
		$syear = $entersyear;
	}
	
	$enterpayment = trim($_POST["payment"]);
	if(empty($enterstudnum)){
		$paymenterror = "Please enter a positive integer value.";
	} else{
		$payment = $enterpayment;
	}
	
	$entersemester = trim($_POST["semester"]);
	if(empty($entersemester)){
		$semestererror = "Please enter a positive integer value.";
	} else{
		$semester = $entersemester;
	}
	
	if(empty($studnameerror) && empty($cyearerror) && empty($syearerror) && empty($paymenterror) && empty($semestererror)){
		$sql = "UPDATE student_info SET student_name=?, course_year=?, payment=?, school_year=?, semester=?, status=?, preenrollment=? WHERE student_number=?";
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "ssssssss", $setstudname, $setcyear, $setpayment, $setsyear, $setsemester, $setstatus, $setpreenrollment, $setstudnum);
			
			$setstudname = $studname;
			$setcyear = $cyear;
			$setpayment = $payment;
			$setsyear = $syear;
			$setsemester = $semester;
			$setstatus = $status;
			$setpreenrollment = $preenrollment;
			$setstudnum = $student_number;
			
			if(mysqli_stmt_execute($stmt)){
				echo "<script>alert('Update Success!');</script>";
				header("location: penrolladmin.php");
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
	mysqli_stmt_close($stmt);
	}
	
	mysqli_close($link);
} else{
	if(isset($_GET["student_number"]) && !empty(trim($_GET["student_number"]))){
		$student_number = trim($_GET["student_number"]);
		
		$sql = "SELECT * FROM student_info WHERE student_number =?";
		if($stmt = mysqli_prepare($link, $sql)) {
			mysqli_stmt_bind_param($stmt, "s", $setstudnum);
			
			$setstudnum = $student_number;
			
			if(mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);
				
				if(mysqli_num_rows($result)){
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
			$studnum = $row['student_number'];
			$studname = $row['student_name'];
			$cyear = $row['course_year'];
			$payment = $row['payment'];
			$syear = $row['school_year'];
			$semester = $row['semester'];
			$status = $row['status'];
			$preenrollment = $row['preenrollment'];
				} else {
					header("location: error.php");
					exit();
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		} else{
				header("Location: penrollerror.php");
				exit();
			}
		mysqli_stmt_close($stmt);
			
			mysqli_close($link);
			
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<title>Update Student Record</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="css/updatestyle.css">
	<style>
		.wrapper{
			width: 600px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
<div class = "wrapper">
	<div class = "controller-fluid">
		<div class = "row">
			<div id = "student" class = "col-md-12">
		<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
		<br>
		Student Name: <input type = "text" name = "studname" class="form-control <?php echo (!empty($studnameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $studname; ?>" />
							<span class="invalid-feedback"><?php echo $studnameerror; ?></span>					
		<br>
		                  Student Status: <select name = "sstatus"><option value ="Regular">Regular</option><option value ="Irregular" >Irregular</option></select> 
		                  Course Year: <select name = "cyear">
			<option value = "1ST YEAR">1ST YEAR</option>
			<option value = "2ND YEAR">2ND YEAR</option>
			<option value = "3RD YEAR">3RD YEAR</option>
			<option value = "4TH YEAR">4TH YEAR</option>
										</select> <br> 
		<br>
			Payment:     <input type = "radio" name = "payment" id = "paymentid" value = "FULL" /> FULL           <input type = "radio" name = "payment" value = "PARTIAL" /> PARTIAL <br><br>
			School Year: <input type = "text" name = "syear" id = "syearid" value = "2023-2024" class="form-control <?php echo (!empty($syearerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $syear; ?>"/>
							<span class="invalid-feedback"><?php echo $syearerror; ?></span> <br><br>
			Semester: <input type = "text" name = "semester" id = "semesterid" value = "1ST SEMESTER" class="form-control <?php echo (!empty($semestererror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $semester; ?>" />
							<span class="invalid-feedback"><?php echo $semestererror; ?></span>
					  <input type = "hidden" name = "preenrollment" value = "Pre-Enrolled"/>
			<br><br>
		                                                                <input type = "submit" value = "Update" />
			</form>
			
			</div>
		</div>
	</div>
</div>
</body>	
</html>