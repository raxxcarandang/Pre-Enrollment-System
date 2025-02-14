<?php

require_once "penrollconfig.php";

$studname = $studnum = $cyear = $syear = $payment = $semester = "";
$studnameerror = $studnumerror = $cyearerror = $syearerror = $paymenterror = $semestererror = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$enterstudname = trim($_POST["studname"]);
	if(empty($enterstudname)){
		$studnameerror = "Student Name Must be Filled Out!";
	} else if (!filter_var($enterstudname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z .,ñ A-Z\s]+$/")))){
		$studnameerror = "Student Name is not Valid!.";
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
				header("location: penrollstudent.php?student_number=$studnum");
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
			
		}
		/*
		$sql = "INSERT INTO `subject_info`(`subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
	
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "sssssss", $setscode, $setstudnum, $setsdesc, $setunits, $setsection, $setday, $settime);
			$setscode = $scode; 
			$setstudnum = $studnum
			$setsdesc = $sdesc;
			$setunits = $units; 
			$setsection = $section;
			$setday = $day;
			$settime = $time;
			
			if(mysqli_stmt_execute($stmt)){
				header("location: penrollstudent.php?student_number=$studnum");
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		*/
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
body {
	background-image: url(img/slsufield.jpg);
	background-size: cover;
	background-repeat: no-repeat;
}
		.wrapper{
			width: 600px;
			margin: 0 auto;
		}
	</style>
<body>
	<div id = "term" class = "col-md-12" style= "background-color: white">
<br>
<h1 align = "center" style = "color: red;">DATA PRIVACY NOTICE AND CONSENT</h1>
<p align = "justify">SOUTHERN LUZON STATE UNIVERSITY is committed to protecting the privacy of its data subjects, and ensuring the safety and security of personal data under its control and custody. This policy provides information on what personal data is gathered by the the company about its current, past, and prospective students; how it will use and process this; how it will keep this secure; and how it will dispose of it when it is no longer needed. This information is provided in compliance with the Philippine Republic Act No. 10173, also known as, the Data Privacy Act of 2012 (DPA) and its Implementing Rules and Regulations (DPA-IRR). It sets out Southern Luzon State University’s data protection practices designed to safeguard the personal data of individuals it deals with, and also to inform such individuals of their rights under the Act.
<br><br>
This Data Privacy Notice and Consent Form may be amended at any time without prior notice, and such amendments will be notified to you via email. 
<br>
PRIVACY NOTICE
<br>
Information Collected
<br>
SOUTHERN LUZON STATE UNIVERSITY collects, stores, and processes personal data from its current, past and prospective scholars, starting with the information provided at application through to information collected throughout the whole course of his scholarship. This will include:
<br><br>
Contact information, such as, name, addresses, telephone numbers, email addresses and other contact details
Personal information, such as date of birth, educational background, awards received, leadership experience, and trainings attended
Use of Information
<br>
The collected personal data is used solely for the following purpose of processing evaluation of the scholarship application. 
<br><br>
Information Sharing
<br>
Personal data under the custody of SOUTHERN LUZON STATE UNIVERSITY shall be disclosed only to authorized recipients of such data. Otherwise, we will share your personal data with third parties, other than your parents and/or guardian on record for minors, only with your consent, or when required or permitted by our policies and applicable law, such as with service providers who perform services for us and help us evaluate your application.
<br><br>
If you have a concern or complaint about the way we are collecting or using your personal data, you may reach us through our email at slsuadmissions@gmail.com
</p>
<form name = "welcome">
                                                                                                                  <input type = button value = "Leave" onclick = "leave()"></input> <input type = "button" value = "Agree" onclick = "proceed()"></input> 
</form>
</div>
	
	<div class = "wrapper">
	<div class = "controller-fluid">
	<div class = "row">
		<div id = "student" class = "col-md-12" style = "display: none;">
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
		<br>
		<p><b>Fill this form out to Pre-Enroll:</b></p>
		Student Number: <input type = "text" name = "studnum" id = "studnumid" class="form-control <?php echo (!empty($studnumerror)) ? 'is-invalid' : ''; ?>"/>
		<span class="invalid-feedback"><?php echo $studnumerror; ?></span> <br>
		Student Name: <input type = "text" name = "studname" class="form-control <?php echo (!empty($studnameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $studname; ?>"/>
							<span class="invalid-feedback"><?php echo $studnameerror; ?></span>					
		<br>
		                  Student Status: <select name = "sstatus" onchange = "status(this.value)"><option value ="Regular">Regular</option><option value ="Irregular">Irregular</option></select>
		                  Course Year: <select name = "cyear" ><option value = "1ST YEAR">1ST YEAR</option><option value = "2ND YEAR">2ND YEAR</option><option value = "3RD YEAR">3RD YEAR</option><option value = "4TH YEAR">4TH YEAR</option></select> 
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
		                                                                <input type = "submit" value = "Pre-enroll" />
			
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