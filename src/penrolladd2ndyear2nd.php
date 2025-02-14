<?php 

require_once "penrollconfig.php";
$studnum = $_GET['student_number'];
for ($i = 1; $i<12; $i++) {
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
				}

		$sqlsubj = "INSERT INTO `subject_info`(`subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
	
		if($stmtsubj = mysqli_prepare($link, $sqlsubj)){
			mysqli_stmt_bind_param($stmtsubj, "sssssss", $setscode, $setstudnum, $setsdesc, $setunits, $setsection, $setday, $settime);
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
	mysqli_close($link);
	header("location: penrolladdsub.php?student_number=$studnum&subject=0");
?>