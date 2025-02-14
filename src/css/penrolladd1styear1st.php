<?php 

require_once "penrollconfig.php";
$studnum = $_GET['student_number'];

for ($i = 1; $i<9; $i++) {
				switch($i) {
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