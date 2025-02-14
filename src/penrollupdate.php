<?php

require_once "penrollconfig.php";

$studname = $studnum = $cyear = $syear = $payment = $semester = $status = $username = $password = $preenrollment = "";
$studnameerror = $studnumerror = $cyearerror = $syearerror = $paymenterror = $semestererror = "";
$select1st = "";
$select2nd = "";
$select3rd = "";
$select4th = "";
$selectsem = "";
$checkfull = "";
$checkpartial = "";
$reg = "";
$irreg = "";
$checkdrop = "";
if (isset($_POST["student_number"]) && !empty($_POST["student_number"])){
	$student_number = $_POST["student_number"];
	
	$enterstudname = trim($_POST["studname"]);
	if(empty($enterstudname)){
		$studnameerror = "Student Name Must be Filled In!";
	} else if (!filter_var($enterstudname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z .,ñ A-Z\s]+$/")))){
		$studnameerror = "Student Name Is Not Valid!.";
	} else {
		$studname = $enterstudname;
	}
	
	$enterstudnum = trim($_GET["student_number"]);
	if(empty($enterstudnum)){
		$studnumerror = "Student Number Must Be Filled In!";
	} else{
		$studnum= $enterstudnum;
	}
	
	$entercyear = trim($_POST["cyear"]);
	if(empty($entercyear)){
		$cyearerror = "Course Year Must Be Filled In!";
	} else {
		$cyear = $entercyear;
	}
	
	$entersyear = trim($_POST["syear"]);
	if(empty($entersyear)){
		$syearerror = "School Year Must Be Filled In!";
	} else {
		$syear = $entersyear;
	}
	
	$enterpayment = trim($_POST["payment"]);
	if(empty($enterstudnum)){
		$paymenterror = "Payment Must Be Filled In!";
	} else{
		$payment = $enterpayment;
	}
	
	$entersemester = trim($_POST["semester"]);
	if(empty($entersemester)){
		$semestererror = "Semester Must Be Filled In!.";
	} else{
		$semester = $entersemester;
	}
	
	$enterusername = trim($_POST['username']);
	if(empty($enterusername)){
		$usernameerror = "Username Must Be Filled In!";
	} else{
		$username = $enterusername;
	}
	
	$enterpassword = trim($_POST['password']);
	if(empty($enterpassword)){
		$passworderror = "Password Must Be Filled In!";
	} else{
		$password = $enterpassword;
	}
	
	if(empty($studnumerror) && empty($studnameerror) && empty($cyearerror) && empty($syearerror) && empty($paymenterror) && empty($semestererror)){
		$status = trim($_POST["sstatus"]);
		$preenrollment = trim($_POST["preenrollment"]);
		
		$sqluplog = "UPDATE login_info SET user=?, pass=? WHERE student_number=?";
		
		if($stmtuplog = mysqli_prepare($link, $sqluplog)){
			mysqli_stmt_bind_param($stmtuplog, "sss", $setuser, $setpass, $setstudnum);
			$setuser = $username;
			$setpass = $password;
			$setstudnum = $student_number;
			mysqli_stmt_execute($stmtuplog);
		}
		
		mysqli_stmt_close($stmtuplog);
		
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
				header("location: penrolladmin.php");
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		mysqli_stmt_close($stmt);
	}	
	
		mysqli_close($link);
} else {
	if(isset($_GET["student_number"]) && !empty(trim($_GET["student_number"]))){
		$student_number = trim($_GET["student_number"]);
		$sqllog = "SELECT * FROM login_info WHERE student_number =?";
		$sql = "SELECT * FROM student_info WHERE student_number =?";
		
		if($stmtlog = mysqli_prepare($link, $sqllog)) {
			mysqli_stmt_bind_param($stmtlog, "s", $setstudnum);
			$setstudnum = $student_number;
			
			if(mysqli_stmt_execute($stmtlog)){
				$resultlog = mysqli_stmt_get_result($stmtlog);
				
				if(mysqli_num_rows($resultlog)){
				$rowlog = mysqli_fetch_array($resultlog, MYSQLI_ASSOC);
			$username = $rowlog['user'];
			$password = $rowlog['pass'];
				}
				
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
		
		if ($cyear === "1ST YEAR") {
			$select1st = "selected";
		} else if ($cyear === "2ND YEAR") {
			$select2nd = "selected";
		} else if ($cyear === "3RD YEAR") {
			$select3rd = "selected";
		} else if ($cyear === "4TH YEAR") {
			$select4th = "selected";
		}
		
		if ($payment === "FULL") {
			$checkfull = "checked";
		} else {
			$checkpartial = "checked";
		}
		
		if ($status === "Irregular") {
		$irreg = "selected";
		}

		if ($semester === "2ND SEMESTER") {
			$selectsem = "selected";
		}
		if ($preenrollment === "DROP-OUT") {
			$checkdrop = "selected";
		}
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
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Student Record</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/penrollupdate.css">
</head>
<body>
<div class = "wrapper">
	<div class = "controller-fluid">
		<div class = "row">
			<div id = "student" class = "col-md-12">
		<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
		<p5><b>[UPDATE STUDENT PRE-ENROLLMENT RECORD]</b></p5>
		<input type = "hidden" name = "student_number" value = "<?php echo $student_number; ?>"/>
		<div class = "stdform">USERNAME: <input type = "text" required name = "username" class="form-control <?php echo (!empty($usernameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $username; ?>"/>
							<span class="invalid-feedback"><?php echo $usernameerror; ?></span></div>	<br>
		<div class = "stdform">PASSWORD: <input type = "text" required name = "password" class="form-control <?php echo (!empty($passworderror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $password; ?>"/>
							<span class="invalid-feedback"><?php echo $pasworderror; ?></span></div>	<br>	
		<div class = "stdform">STUDENT NAME: <input type = "text" required name = "studname" class="form-control <?php echo (!empty($studnameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $studname; ?>"/>
							<span class="invalid-feedback"><?php echo $studnameerror; ?></span>	</div><br> 
		
		<div class = "raxx">
		<div class = "stdform">STUDENT STATUS: <select name = "sstatus"><option value ="Regular">Regular</option><option value ="Irregular" <?php echo $irreg; ?>>Irregular</option></select></div>
		<div class = "stdform">COURSE YEAR: <select name = "cyear" ><option value = "1ST YEAR" <?php echo $select1st; ?>>1ST YEAR</option><option value = "2ND YEAR" <?php echo $select2nd; ?>>2ND YEAR</option><option value = "3RD YEAR" <?php echo $select3rd; ?>>3RD YEAR</option><option value = "4TH YEAR" <?php echo $select4th; ?>>4TH YEAR</option></select></div> 
		<div class = "stdform">SEMESTER: <select name="semester"> <option value = "1ST SEMESTER">1ST SEMESTER</option> <option value = "2ND SEMESTER" <?php echo $selectsem; ?>>2ND SEMESTER</option></select></div>
	</div>
	<div id = "exform"><br>
		<div class = "stdform1">	                   PAYMENT:           <input type = "radio" name = "payment" id = "paymentid" value = "FULL" <?php echo $checkfull; ?> /> FULL           <input type = "radio" name = "payment" value = "PARTIAL" <?php echo $checkpartial; ?> /> PARTIAL                              PRE-ENROLLMENT: <select name = "preenrollment"> <option value = "PRE-ENROLLED" >PRE-ENROLLED</option><option value = "DROP-OUT" <?php echo $checkdrop ?>>DROP-OUT</option></select></div><br>
		<div class = "stdform">	SCHOOL YEAR: <input type = "text" required name = "syear" value = "<?php echo $syear; ?>" id = "syearid" class="form-control <?php echo (!empty($syearerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $syear; ?>" />
							<span class="invalid-feedback"><?php echo $syearerror; ?></span></div> 
					  
			</div><br>
		                                                                        <div class = "button"> <input type = "button"  value = "Cancel" onclick ="cancel()" id = "butt" />   <input type = "submit" id = "butt" value = "Update" /></div>
			</form>
			
			</div>
		</div>
	</div>
</div>
</body>	
<script> 
function cancel() {
	window.location.href = 'penrolladmin.php';
}
</script>

</html>