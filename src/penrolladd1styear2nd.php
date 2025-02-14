<?php 

require_once "penrollconfig.php";
$studnum = $_GET['student_number'];

for ($i = 1; $i<9; $i++) {
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
				}

		$sqlsubj = "INSERT INTO `subject_info`(`subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		/*$sqlchecksub = "SELECT `subject_code` FROM `subject_info` WHERE `student_number` = '$studnum'";
		$sqlquerycsub = mysqli_query($link, $sqlchecksub);
		while($checksub = mysqli_fetch_array($sqlquerycsub)) {
			if ($scode === $checksub['subject_code']) {
				$s++;
				$stop = 1;
			}
		}
				mysqli_free_result($sqlquerycsub);*/

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
	header("location: penrolladdsub.php?student_number=$studnum&subject=0");
	mysqli_close($link);

?>