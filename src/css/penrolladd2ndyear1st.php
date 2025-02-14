<?php 

require_once "penrollconfig.php";
$studnum = $_GET['student_number'];
for ($i = 1; $i<12; $i++) {
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