<?php

require_once "penrollconfig.php";

$studname = $studnum = $cyear = $syear = $payment = $semester = "";
$studnameerror = $studnumerror = $cyearerror = $syearerror = $paymenterror = $semestererror = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$enterstudname = trim($_POST["studname"]);
	if(empty($enterstudname)){
		$studnameerror = "Please enter a name.";
	} else if (!filter_var($enterstudname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z .ñ A-Z\s]+$/")))){
		$studnameerror = "Please enter a valid name.";
	} else {
		$studname = $enterstudname;
	}
	
	$enterstudnum = trim($_POST["studnum"]);
	if(empty($enterstudnum)){
		$studnumerror = "Please enter a positive integer value.";
	} else{
		$studnum= $enterstudnum;
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
	
	if(empty($studnumerror) && empty($studnameerror) && empty($cyearerror) && empty($syearerror) && empty($paymenterror) && empty($semestererror)){
		$status = trim($_POST["sstatus"]);
		$preenrollment = trim($_POST["preenrollment"]);

		$sql = "INSERT INTO `student_info` (`student_number`, `student_name`, `course_year`, `payment`, `school_year`, `semester`, `status`, `preenrollment`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "ssssssss", $setstudnum, $setstudname, $setcyear, $setpayment, $setsyear, $setsemester, $setstatus, $setpreenrollment);
			$setstudnum = $studnum;
			$setstudname = $studname;
			$setcyear = $cyear;
			$setpayment = $payment;
			$setsyear = $syear;
			$setsemester = $semester;
			$setstatus = $status;
			$setpreenrollment = $preenrollment;
			
			if(mysqli_stmt_execute($stmt)){
				header("location: penrolladmin.php");
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		mysqli_stmt_close($stmt);
	}
		mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<link rel = "stylesheet" href = "bootstrap.min.css">
</head>
	<style>
		.wrapper{
			width: 600px;
			margin: 0 auto;
		}
		body {
			background-image: url(img/slsu.gif);
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
<body>

	
	<div class = "wrapper">
	<div class = "controller-fluid">
	<div class = "row">
		<div id = "student" class = "col-md-12">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
		<br>
		Student Number: <input type = "text" name = "studnum" id = "studnumid" class="form-control <?php echo (!empty($studnumerror)) ? 'is-invalid' : ''; ?>"/>
		<span class="invalid-feedback"><?php echo $studnumerror; ?></span> <br>
		Student Name: <input type = "text" name = "studname" class="form-control <?php echo (!empty($studnameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $studname; ?>"/>
							<span class="invalid-feedback"><?php echo $studnameerror; ?></span>					
		<br>
		                  Student Status: <select name = "sstatus" onchange = "status(this.value)"><option value ="Regular">Regular</option><option value ="Irregular">Irregular</option></select>
		                  Course Year: <select name = "cyear" value = "To Be Determined"><option value = "1ST YEAR">1ST YEAR</option><option value = "2ND YEAR">2ND YEAR</option><option value = "3RD YEAR">3RD YEAR</option><option value = "4TH YEAR">4TH YEAR</option></select> 
		<div id = "exform" style = "display: none;">
		<br>
			Payment:     <input type = "radio" name = "payment" id = "paymentid" value = "FULL" checked /> FULL           <input type = "radio" name = "payment" value = "PARTIAL"/> PARTIAL <br><br>
			School Year: <input type = "text" name = "syear" id = "syearid" value = "2023-2024" class="form-control <?php echo (!empty($syearerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $syear; ?>"/>
							<span class="invalid-feedback"><?php echo $syearerror; ?></span> <br><br>
			Semester: <input type = "text" name = "semester" id = "semesterid" value = "1ST SEMESTER" class="form-control <?php echo (!empty($semestererror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $semester; ?>"/>
							<span class="invalid-feedback"><?php echo $semestererror; ?></span>
					  <input type = "hidden" name = "preenrollment" value = "Pre-Enrolled"/>
			</div>
			<br><br>
		                                                                <input type = "submit" value = "ADD STUDENT" />
			
		</div>
	</div>
	</div>
	</div>
</body>
<script>
function proceed() {
	
	const aghide = document.getElementById('term');
	const studshow = document.getElementById('student');
	
	aghide.style.display = 'none';
	studshow.style.display = "block";
}

function leave() {
window.location.href("preenrollmentlogin.php");
}

function status(answer) {
	const exform = document.getElementById('exform');
	
	if (answer == "Irregular") {
		exform.style.display = "block";
		document.getElementById('syearid').value = "";
		document.getElementById('semesterid').value = "";
	}
	else {
		exform.style.display = "none";
	}
}
</script>
</html>