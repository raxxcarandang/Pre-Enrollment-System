<?php

require_once "penrollconfig.php";

$studname = $studnum = $cyear = $syear = $payment = $semester = $username = $password = "";
$studnameerror = $studnumerror = $cyearerror = $syearerror = $paymenterror = $semestererror = $usernameerror = $passworderror = "";
$year = "20" . date('y');
$nextyear = "20" . date('y', strtotime('+1 year'));
$fyear = $year . '-' . $nextyear;
$show = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$enterstudname = trim($_POST["studname"]);
	if(empty($enterstudname)){
		$studnameerror = "Student Name Must be Filled In!";
	} else if (!filter_var($enterstudname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z .,ñ A-Z\s]+$/")))){
		$studnameerror = "Student Name Is Not Valid!";
	} else {
		$studname = $enterstudname;
	}
	
	$enterstudnum = trim($_POST["studnum"]);
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
		$semestererror = "Semester Must Be Filled In!";
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
		$temp = "";
		$inc = "";
		$i = "";
		$subjid = "";
		$sqlsubjinc = "SELECT * FROM `subject_info`";
		$tbdt = "";
		$tbd = "TO BE DETERMINED";
		$temp = mysqli_query($link, $sqlsubjinc);
		while ($scode = mysqli_fetch_assoc($temp)) {
			$inc++;
		}
		if ($inc == $i) {
			++$inc;
		}
		
		if ($semester === "1ST SEMESTER") {
			$smax = 9;
		}else {
			$smax = 12;
		}
		
		for ($i = 1; $i<$smax; $i++) {
			++$inc;
			
			if ($inc < 10){
			$tbdt = "TBD" . "-000";
			} else if ($inc >= 10){
			$tbdt = "TBD" . "-00";
			} else if ($inc >= 100){
			$tbdt = "TBD" . "-0";
			} else if ($inc >= 1000){
			$tbdt = "TBD" . "-";
			}
			
			if ($inc < 10){
			$subjid = "SUBJECT" . "-000";
			} else if ($inc >= 10){
			$subjid = "SUBJECT" . "-00";
			} else if ($inc >= 100){
			$subjid = "SUBJECT" . "-0";
			} else if ($inc >= 1000){
			$subjid = "SUBJECT" . "-";
			}
			
			if ($cyear === "1ST YEAR") {
				$smax = 9;
				if ($semester === "1ST SEMESTER") {
					switch ($i) {
					case 1:
					$scode = "GEC 04";
					$section = "FL (Le)";
					$sdesc = "The Contemporary World";
					$units = "3";
					$day = "MoWeFr";
					$time = "15:30 - 18:30";
					break;
					
					case 2:
					$scode = "GEC 06";
					$section = "FL (Le)";
					$sdesc = "Mathematics in the Modern World";
					$units = "3";
					$day = "MoWeFr";
					$time = "7:30 - 8:30";
					break;
					
					case 3:
					$scode = "GEC 08";
					$section = "FL (Le)";
					$sdesc = "Science, Technology and Society";
					$units = "3";
					$day = "TuTh";
					$time = "15:00 – 16:30";
					break;
					
					case 4:
					$scode = "GEC 10";
					$section = "FL (Le)";
					$sdesc = "Kontekswalisadong Komunikasyon sa Filipino";
					$units = "3";
					$day = "MoWeFr";
					$time = "8:30 – 9:30";
					break;
					
					case 5:
					$scode = "PE 001";
					$section = "FL (Le)";
					$sdesc = "Physical Fitness";
					$units = "2";
					$day = "Mo";
					$time = "11:30 – 13:30";
					break;
					
					case 6:
					$scode = "ITE 01";
					$section = "FL (Le)";
					$sdesc = "Introduction To Computing";
					$units = "2";
					$day = "MoWe";
					$time = "14:30 – 16:30";
					break;
					
					case 7:
					$scode = "ITE 02";
					$section = "FL (Lab)";
					$sdesc = "Introduction To Computing (LAB)";
					$units = "1";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 8:
					$scode = "NST 01";
					$section = "FL (Le)";
					$sdesc = "National Service Training Program 1";
					$units = "3";
					$day = "TuTh";
					$time = "16:30 – 18:00";
					break;
					
					default:
					break;
				}
				
			} else if ($semester === "2ND SEMESTER") {
				$smax = 9;
				switch($i) {
					case 1:
					$scode = "GEC 02";
					$section = "FL (Le)";
					$sdesc = "Understanding The Self";
					$units = "3";
					$day = "MoWeFr";
					$time = "10:20 - 11:20";
					break;
					
					case 2:
					$scode = "GEC 03";
					$section = "FL (Le)";
					$sdesc = "Reading in the Philippine History";
					$units = "3";
					$day = "TuTh";
					$time = "9:00 - 10:30";
					break;
					
					case 3:
					$scode = "GEC 05";
					$section = "FL (Le)";
					$sdesc = "Purposive Communication";
					$units = "3";
					$day = "MoWeFr";
					$time = "12:30 – 14:30";
					break;
					
					case 4:
					$scode = "GEC 11";
					$section = "FL (Le)";
					$sdesc = "Filipino sa Iba’t Ibang Disiplina";
					$units = "3";
					$day = "TuTh";
					$time = "10:00 – 12:00";
					break;
					
					case 5:
					$scode = "PE 002";
					$section = "FL (Le)";
					$sdesc = "Rhythmic Activities";
					$units = "2";
					$day = "Mo";
					$time = "7:30 – 9:30";
					break;
					
					case 6:
					$scode = "ITE 02";
					$section = "FL (Le)";
					$sdesc = "Computer Programming 1";
					$units = "2";
					$day = "MoWe";
					$time = "14:30 – 16:30";
					break;
					
					case 7:
					$scode = "ITE 02";
					$section = "FL (Lab)";
					$sdesc = "Computer Programming 1 (LAB)";
					$units = "1";
					$day = "TuTh";
					$time = "14:30 – 16:30";
					break;
					
					case 8:
					$scode = "NST 02";
					$section = "FL (Le)";
					$sdesc = "National Service Training Program 2";
					$units = "3";
					$day = "Fr";
					$time = "13:30 – 16:00";
					break;
					
					default:
					break;
				}
			} 
			}else if ($cyear === "2ND YEAR"){
				$smax = 12;
				if ($semester === "1ST SEMESTER") { 
				switch($i) {
					case 1:
					$scode = "GEC 01";
					$section = "FL (Le)";
					$sdesc = "The Life and the Works of Rizal";
					$units = "3";
					$day = "MoWeFr";
					$time = "14:30 – 16:30";
					break;
					
					case 2:
					$scode = "GEC 09";
					$section = "FL (Le)";
					$sdesc = "Ethics";
					$units = "3";
					$day = "WeFr";
					$time = "9:00 – 10:30";
					break;
					
					case 3:
					$scode = "ITE 03";
					$section = "FL (Le)";
					$sdesc = "Human Computer Interaction";
					$units = "3";
					$day = "MoWeFr";
					$time = "8:00 – 9:00";
					break;
					
					case 4:
					$scode = "ITE 04";
					$section = "FL (Le)";
					$sdesc = "Discrete Mathematics";
					$units = "3";
					$day = "TuTh";
					$time = "15:00 – 16:30";
					break;
					
					case 5:
					$scode = "PE 03";
					$section = "FL (Le)";
					$sdesc = "Individual/Dual Sports";
					$units = "2";
					$day = "We";
					$time = "16:30 – 17:30";
					break;
					
					case 6:
					$scode = "ITE 05";
					$section = "FL (Le)";
					$sdesc = "Computer Programming 2";
					$units = "2";
					$day = "Th";
					$time = "11:30 – 13:30";
					break;
					
					case 7:
					$scode = "ITE 05";
					$section = "FL (Lab)";
					$sdesc = "Computer Programming 2 (LAB)";
					$units = "1";
					$day = "Tu";
					$time = "10:30 – 13:30";
					break;
					
					case 8:
					$scode = "ITE 06";
					$section = "FL (Le)";
					$sdesc = "Visual Graphic Design";
					$units = "2";
					$day = "Tu";
					$time = "8:00 – 10:00";
					break;
					
					case 9:
					$scode = "ITE 06";
					$section = "FL (Lab)";
					$sdesc = "Visual Graphic Design (LAB)";
					$units = "1";
					$day = "Th";
					$time = "10:30 – 13:30";
					break;
					
					case 10:
					$scode = "ITE 07";
					$section = "FL (Le)";
					$sdesc = "Database Management Systems 1";
					$units = "2";
					$day = "MoFr";
					$time = "17:30 – 18:30";
					break;
					
					case 11:
					$scode = "ITE 11";
					$section = "FL (Lab)";
					$sdesc = "Database Management Systems 1 (LAB)";
					$units = "1";
					$day = "TuTh";
					$time = "17:00 – 18:30";
					break;
					
					default:
					break;
				}
				} else if ($semester === "2ND SEMESTER"){
				switch($i) {
					case 1:
					$scode = "GEC 07";
					$section = "FL (Le)";
					$sdesc = "Art Appreciation";
					$units = "3";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 2:
					$scode = "GEC 13";
					$section = "FL (Le)";
					$sdesc = "Literature of the Philippines";
					$units = "3";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 3:
					$scode = "PE 004";
					$section = "FL (Le)";
					$sdesc = "Team Sports and Games";
					$units = "2";
					$day = "We";
					$time = "9:30 – 11:30";
					break;
					
					case 4:
					$scode = "ITE 08";
					$section = "FL (Le)";
					$sdesc = "Data Structures and Algorithms";
					$units = "2";
					$day = "Mo";
					$time = "17:00 – 19:00";
					break;
					
					case 5:
					$scode = "ITE 08";
					$section = "FL (Lab)";
					$sdesc = "Data Structures and Algorithms (LAB)";
					$units = "1";
					$day = "Tu";
					$time = "17:00 – 19:00";
					break;
					
					case 6:
					$scode = "ITE 09";
					$section = "FL (Le)";
					$sdesc = "Quantitative Methods";
					$units = "2";
					$day = "MoWe";
					$time = "7:30 – 8:30";
					break;
					
					case 7:
					$scode = "ITE 09";
					$section = "FL (Lab)";
					$sdesc = "Quantitative Methods (LAB)";
					$units = "1";
					$day = "Fr";
					$time = "10:30 – 13:30";
					break;
					
					case 8:
					$scode = "ITE 10";
					$section = "FL (Le)";
					$sdesc = "Front-End Development";
					$units = "2";
					$day = "Mo";
					$time = "13:00 – 16:00";
					break;
					
					case 9:
					$scode = "ITE 10";
					$section = "FL (Lab)";
					$sdesc = "Front-End Development (LAB)";
					$units = "1";
					$day = "We";
					$time = "13:30 – 16:30";
					break;
					
					case 10:
					$scode = "ITE 11";
					$section = "FL (Le)";
					$sdesc = "Database Management Systems 2";
					$units = "2";
					$day = "We";
					$time = "17:00 – 19:00";
					break;
					
					case 11:
					$scode = "ITE 11";
					$section = "FL (Lab)";
					$sdesc = "Database Management Systems 2 (LAB)";
					$units = "1";
					$day = "Th";
					$time = "16:30 – 19:30";
					break;
					
					default:
					break;
				}
			}
			}
		
		/*
		if($stmtsubj = mysqli_prepare($link, $sqlsubj)){
			mysqli_stmt_bind_param($stmtsubj, "sssssss", $setscode, $setstudnum, $setsdesc, $setunits, $setsection, $setday, $settime);
			$setscode = $tbdt . $inc; 
			$setstudnum = $studnum;
			$setsdesc = $tbd;
			$setunits = $tbd; 
			$setsection = $tbd;
			$setday = $tbd;
			$settime = $tbd;
			mysqli_stmt_execute($stmtsubj);
		}
				mysqli_stmt_close($stmtsubj);
		*/
		if (($cyear === "1ST YEAR") || ($cyear === "2ND YEAR")) {
		$sqlsubj = "INSERT INTO `subject_info`(`subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		if($stmtsubj = mysqli_prepare($link, $sqlsubj)){
			mysqli_stmt_bind_param($stmtsubj, "sssssss", $setscode, $setstudnum, $setsdesc, $setunits, $setsection, $setday, $settime);
			if ($status === "Regular") {
			//$setsubjid = $subjid . $inc;
			$setscode = $scode; 
			$setstudnum = $studnum;
			$setsdesc = $sdesc;
			$setunits = $units; 
			$setsection = $section;
			$setday = $day;
			$settime = $time;
			mysqli_stmt_execute($stmtsubj);
			}
			}
				mysqli_stmt_close($stmtsubj);
		}
		}
	
		
		$sqllogin = "INSERT INTO `login_info`(`student_number`, `user`, `pass`, `type`) VALUES (?, ?, ?, ?)";
		
		if($stmtlogin = mysqli_prepare($link, $sqllogin)){
			mysqli_stmt_bind_param($stmtlogin, "ssss", $setstudnum, $setusername, $setpassword, $settype);
			$setstudnum = $studnum;
			$setusername = $username;
			$setpassword = $password;
			$settype = "STUDENT";

			mysqli_stmt_execute($stmtlogin);
			}
			mysqli_stmt_close($stmtlogin);
		
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
				echo "<script>alert('Congratulations! You are now a student of Southern Luzon State University!');</script>";
				header("location: penrollstudent.php?student_number=$studnum");
				exit();
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
			
		}
		mysqli_stmt_close($stmt);
	}
	}
		mysqli_close($link);

?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href = "css/penrollstart.css">
	<link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,900&display=swap"
        rel="stylesheet">
</head>
<body>
	<div id = "term" class = "col-md-12" style= width: 1000; height: 100;" <?php echo $show; ?>>
<h1 align = "center" style = "color: # 84b21;"><br> <b>DATA PRIVACY NOTICE AND CONSENT</b></h1>
<br>
<p align = "justify"> <b>
<strong>SOUTHERN LUZON STATE UNIVERSITY</strong> is committed to protecting the privacy of its data subjects, 
	and ensuring the safety and security of personal data under its control and custody. This policy provides information on what personal data
	is gathered by the the company about its current, past, and prospective students; how it will use and process this; how it will keep this secure; 
	and how it will dispose of it when it is no longer needed. This information is provided in compliance with the <b>Philippine Republic Act No. 10173</b>, 
	also known as, the <b>Data Privacy Act of 2012 (DPA) and its Implementing Rules and Regulations (DPA-IRR)</b>. It sets out Southern Luzon State University’s
	data protection practices designed to safeguard the personal data of individuals it deals with, and also to inform such individuals of their rights under 
	the Act. This Data Privacy Notice and Consent Form may be amended at any time without prior notice, and such amendments will be notified to you via email. </b>

<br>
<br>
<h2><b>                                               PRIVACY NOTICE</b></h2>
<br>
<h2><b> > Information Collected</b></h2>
	<p align = "justify">	<b> <b>SOUTHERN LUZON STATE UNIVERSITY </b>collects, stores, and processes personal data from its current, past and prospective scholars, 
		starting with the information provided at application through to information collected throughout the whole course of his scholarship. This will include:
		contact information, such as, name, addresses, telephone numbers, email addresses and other contact details
		Personal information, such as date of birth, educational background, awards received, leadership experience, and trainings attended
		Use of Information.
The collected personal data is used solely for the following purpose of processing evaluation of the scholarship application. </b> </p>
<h2><b> > Information Sharing</b></h2>
<p>
<b>Personal data under the custody of <b>SOUTHERN LUZON STATE UNIVERSITY</b> shall be disclosed only to authorized recipients of such data. 
Otherwise, we will share your personal data with third parties, other than your parents and/or guardian on record for minors, only with your consent,
or when required or permitted by our policies and applicable law, such as with service providers who perform services for us and help us evaluate your application.
If you have a concern or complaint about the way we are collecting or using your personal data, you may reach us through our email at slsuadmissions@gmail.com </b>
</p>
<form name = "welcome">
<div class = "button">
<input type = button value = "Leave" onclick = "leave()" align="center" id = "logout" ></input>     <input type = "button" value = "Agree" onclick = "proceed()" align="center" id = "addbutton" ></input></div>
</form>
</div>
	
	<div class = "wrapper">
	<div class = "controller-fluid">
	<div class = "row">
		<div id = "student" class = "col-md-12" style = "display:none;">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
		<p5><b>FILL THIS FORM OUT TO PRE-ENROLL:</b></p5>
		<div class = "stdform">USERNAME: <input type = "text" required name = "username" class="form-control <?php echo (!empty($usernameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $username; ?>"/>
							<span class="invalid-feedback"><?php echo $usernameerror; ?></span></div>	<br>
		<div class = "stdform">PASSWORD: <input type = "password" required name = "password" class="form-control <?php echo (!empty($passworderror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $password; ?>"/>
							<span class="invalid-feedback"><?php echo $pasworderror; ?></span></div>	<br>	
		<div class = "stdform">STUDENT NUMBER: <input type = "text" required name = "studnum" id = "studnumid" class="form-control <?php echo (!empty($studnumerror)) ? 'is-invalid' : ''; ?>"/>
		<span class="invalid-feedback"><?php echo $studnumerror; ?></span></div> <br> 
		<div class = "stdform">STUDENT NAME: <input type = "text" required name = "studname" class="form-control <?php echo (!empty($studnameerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $studname; ?>"/>
							<span class="invalid-feedback"><?php echo $studnameerror; ?></span>	</div><br> 
		
		<div class = "raxx">
		<div class = "stdform">STUDENT STATUS: <select name = "sstatus" onchange = "status(this.value)"><option value ="Regular">Regular</option><option value ="Irregular">Irregular</option></select></div>
		<div class = "stdform">COURSE YEAR: <select name = "cyear" ><option value = "1ST YEAR">1ST YEAR</option><option value = "2ND YEAR">2ND YEAR</option><option value = "3RD YEAR">3RD YEAR</option><option value = "4TH YEAR">4TH YEAR</option></select></div> 
		<div class = "stdform">SEMESTER: <select name="semester"> <option value = "1ST SEMESTER" selected>1ST SEMESTER</option> <option value = "2ND SEMESTER">2ND SEMESTER</option></select></div>
	</div>
	<div id = "exform" style = "display: none;"><br>
		<div class = "stdform1">	PAYMENT:           <input type = "radio" name = "payment" id = "paymentid" value = "FULL" checked /> FULL           <input type = "radio" name = "payment" value = "PARTIAL"/> PARTIAL </div><br>
		<div class = "stdform">	SCHOOL YEAR: <input type = "text" required name = "syear" value = "<?php echo $fyear; ?>" id = "syearid" class="form-control <?php echo (!empty($syearerror)) ? 'is-invalid' : ''; ?>" value = "<?php echo $syear; ?>" />
							<span class="invalid-feedback"><?php echo $syearerror; ?></span></div> 
					  <input type = "hidden" name = "preenrollment" value = "PRE-ENROLLED"/>
			</div><br>
		                                                               <div class = "button2"> <input type = "submit" value = "PRE-ENROLL" /></div>
			
		</div>
	</div>
	</div>
	</div>
</body>
<script>
	const aghide = document.getElementById('term');
	const studshow = document.getElementById('student');
	const exform = document.getElementById('exform');
	
	if (sessionStorage.getItem("hide") == 1) {
		aghide.style.display = 'none';
		studshow.style.display = "block";
	}
function proceed() {

	aghide.style.display = 'none';
	studshow.style.display = "block";
	sessionStorage.setItem("hide", "1");
}

function leave() {
window.location.href = "penrolllogin.php";
}

function status(answer) {

	
	if (answer == "Irregular") {
		exform.style.display = "block";
		document.getElementById('syearid').value = "";
	}
	else {
		exform.style.display = "none";
	}
}
</script>
</html>