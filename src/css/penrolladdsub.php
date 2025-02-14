<?php

require_once "penrollconfig.php";

$studnum = trim($_GET['student_number']);
$subject = "";
$stop = 0;

$subject = trim($_GET['subject']);
	switch($subject) {
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
					
					case 9:
					$scode = "GEC 02";
					$section = "FL (Le)";
					$sdesc = "Understanding The Self";
					$units = "3";
					$day = "MoWeFr";
					$time = "10:20 - 11:20";
					break;
					
					case 10:
					$scode = "GEC 03";
					$section = "FL (Le)";
					$sdesc = "Reading in the Philippine History";
					$units = "3";
					$day = "TuTh";
					$time = "9:00 - 10:30";
					break;
					
					case 11:
					$scode = "GEC 05";
					$section = "FL (Le)";
					$sdesc = "Purposive Communication";
					$units = "3";
					$day = "MoWeFr";
					$time = "12:30 – 14:30";
					break;
					
					case 12:
					$scode = "GEC 11";
					$section = "FL (Le)";
					$sdesc = "Filipino sa Iba’t Ibang Disiplina";
					$units = "3";
					$day = "TuTh";
					$time = "10:00 – 12:00";
					break;
					
					case 13:
					$scode = "PE 002";
					$section = "FL (Le)";
					$sdesc = "Rhythmic Activities";
					$units = "2";
					$day = "Mo";
					$time = "7:30 – 9:30";
					break;
					
					case 14:
					$scode = "ITE 02";
					$section = "FL (Le)";
					$sdesc = "Computer Programming 1";
					$units = "2";
					$day = "MoWe";
					$time = "14:30 – 16:30";
					break;
					
					case 15:
					$scode = "ITE 02";
					$section = "FL (Lab)";
					$sdesc = "Computer Programming 1 (LAB)";
					$units = "1";
					$day = "TuTh";
					$time = "14:30 – 16:30";
					break;
					
					case 16:
					$scode = "NST 02";
					$section = "FL (Le)";
					$sdesc = "National Service Training Program 2";
					$units = "3";
					$day = "Fr";
					$time = "13:30 – 16:00";
					break;
					
					case 17:
					$scode = "GEC 01";
					$section = "FL (Le)";
					$sdesc = "The Life and the Works of Rizal";
					$units = "3";
					$day = "MoWeFr";
					$time = "14:30 – 16:30";
					break;
					
					case 18:
					$scode = "GEC 09";
					$section = "FL (Le)";
					$sdesc = "Ethics";
					$units = "3";
					$day = "WeFr";
					$time = "9:00 – 10:30";
					break;
					
					case 19:
					$scode = "ITE 03";
					$section = "FL (Le)";
					$sdesc = "Human Computer Interaction";
					$units = "3";
					$day = "MoWeFr";
					$time = "8:00 – 9:00";
					break;
					
					case 20:
					$scode = "ITE 04";
					$section = "FL (Le)";
					$sdesc = "Discrete Mathematics";
					$units = "3";
					$day = "TuTh";
					$time = "15:00 – 16:30";
					break;
					
					case 21:
					$scode = "PE 03";
					$section = "FL (Le)";
					$sdesc = "Individual/Dual Sports";
					$units = "2";
					$day = "We";
					$time = "16:30 – 17:30";
					break;
					
					case 22:
					$scode = "ITE 05";
					$section = "FL (Le)";
					$sdesc = "Computer Programming 2";
					$units = "2";
					$day = "Th";
					$time = "11:30 – 13:30";
					break;
					
					case 23:
					$scode = "ITE 05";
					$section = "FL (Lab)";
					$sdesc = "Computer Programming 2 (LAB)";
					$units = "1";
					$day = "Tu";
					$time = "10:30 – 13:30";
					break;
					
					case 24:
					$scode = "ITE 06";
					$section = "FL (Le)";
					$sdesc = "Visual Graphic Design";
					$units = "2";
					$day = "Tu";
					$time = "8:00 – 10:00";
					break;
					
					case 25:
					$scode = "ITE 06";
					$section = "FL (Lab)";
					$sdesc = "Visual Graphic Design (LAB)";
					$units = "1";
					$day = "Th";
					$time = "10:30 – 13:30";
					break;
					
					case 26:
					$scode = "ITE 07";
					$section = "FL (Le)";
					$sdesc = "Database Management Systems 1";
					$units = "2";
					$day = "MoFr";
					$time = "17:30 – 18:30";
					break;
					
					case 27:
					$scode = "ITE 11";
					$section = "FL (Lab)";
					$sdesc = "Database Management Systems 1 (LAB)";
					$units = "1";
					$day = "TuTh";
					$time = "17:00 – 18:30";
					break;
					
					case 28:
					$scode = "GEC 07";
					$section = "FL (Le)";
					$sdesc = "Art Appreciation";
					$units = "3";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 29:
					$scode = "GEC 13";
					$section = "FL (Le)";
					$sdesc = "Literature of the Philippines";
					$units = "3";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 30:
					$scode = "PE 004";
					$section = "FL (Le)";
					$sdesc = "Team Sports and Games";
					$units = "2";
					$day = "We";
					$time = "9:30 – 11:30";
					break;
					
					case 31:
					$scode = "ITE 08";
					$section = "FL (Le)";
					$sdesc = "Data Structures and Algorithms";
					$units = "2";
					$day = "Mo";
					$time = "17:00 – 19:00";
					break;
					
					case 32:
					$scode = "ITE 08";
					$section = "FL (Lab)";
					$sdesc = "Data Structures and Algorithms (LAB)";
					$units = "1";
					$day = "Tu";
					$time = "17:00 – 19:00";
					break;
					
					case 33:
					$scode = "ITE 09";
					$section = "FL (Le)";
					$sdesc = "Quantitative Methods";
					$units = "2";
					$day = "MoWe";
					$time = "7:30 – 8:30";
					break;
					
					case 34:
					$scode = "ITE 09";
					$section = "FL (Lab)";
					$sdesc = "Quantitative Methods (LAB)";
					$units = "1";
					$day = "Fr";
					$time = "10:30 – 13:30";
					break;
					
					case 35:
					$scode = "ITE 10";
					$section = "FL (Le)";
					$sdesc = "Front-End Development";
					$units = "2";
					$day = "Mo";
					$time = "13:00 – 16:00";
					break;
					
					case 36:
					$scode = "ITE 10";
					$section = "FL (Lab)";
					$sdesc = "Front-End Development (LAB)";
					$units = "1";
					$day = "We";
					$time = "13:30 – 16:30";
					break;
					
					case 37:
					$scode = "ITE 11";
					$section = "FL (Le)";
					$sdesc = "Database Management Systems 2";
					$units = "2";
					$day = "We";
					$time = "17:00 – 19:00";
					break;
					
					case 38:
					$scode = "ITE 11";
					$section = "FL (Lab)";
					$sdesc = "Database Management Systems 2 (LAB)";
					$units = "1";
					$day = "Th";
					$time = "16:30 – 19:30";
					break;
				}
				
	if(isset($_GET['subject']) && !empty($_GET['subject'])) {
			$stop = 0;
		$sqlsubj = "INSERT INTO `subject_info`(`subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$sqlchecksub = "SELECT `subject_code` FROM `subject_info` WHERE `student_number` = '$studnum'";
		$sqlquerycsub = mysqli_query($link, $sqlchecksub);
		while($checksub = mysqli_fetch_array($sqlquerycsub)) {
			if ($scode === $checksub['subject_code']) {
				$stop = 1;
			}
		}
		mysqli_free_result($sqlquerycsub);
		if ($stop == 1) {
			echo "<script>alert('SUBJECT $scode IS ALREADY ASSIGNED TO STUDENT #$studnum RECORD');</script>";
		}	else {
			$stop = 0;
		if($stmtsubj = mysqli_prepare($link, $sqlsubj)){
			mysqli_stmt_bind_param($stmtsubj, "sssssss", $setscode, $setstudnum, $setsdesc, $setunits, $setsection, $setday, $settime);
			$setscode = $scode; 
			$setstudnum = $studnum;
			$setsdesc = $sdesc;
			$setunits = $units; 
			$setsection = $section;
			$setday = $day;
			$settime = $time;
			
			mysqli_stmt_execute($stmtsubj);
				
			
			
			}
				mysqli_stmt_close($stmtsubj);
		}
		
	}
		//mysqli_close($link);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href = "css/penrolladdsub.css">
	<link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,900&display=swap"
        rel="stylesheet">
		
</head>
<body>
<br>
<input type = "button" class = "btn btn-danger" value = "RETURN TO SUBJECT MANAGEMENT" onclick = "dashboard()" id = "returnsubject" />
 <input type = "button" class = "btn btn-danger" value = "DELETE ALL SUBJECTS" onclick = "delall()" id = "deleteall" />
	<div class = "wrapper">
	<div class = "controller-fluid">
	<div class = "row">
	<article id = "table1" >
	  <table class = "table table-responsive" id = "intable2">
	  <thead class = "table" align="center" id = "thead">
        <tr>
            <th>SUBJECT DESCRIPTION</th>
            <th>UNITS</th>
            <th>TIME</th>
            <th>SCHEDULE</th>
            <th>ACTION</th>
        </tr>
		</thead>
		<tbody class = "table table=striped" align="center" id = 'tbody'>
		<tr>
            <td>The Contemporary World</td>
            <td>3</td>
            <td>15:30 - 18:30</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=1"); ?>" method = "post"><input type = "hidden" name = "subject" value = "1"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC04   " /></form></td>
        </tr>
        <tr>
            <td>Mathematics in the Modern World</td>
            <td>3</td>
            <td>7:30 - 8:30</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=2"); ?>" method = "post"><input type = "hidden" name = "subject" value = "2"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC06   " /></form></td>
        </tr>
        <tr>
            <td>Science, Technology and Society</td>
            <td>3</td>
            <td>15:00 – 16:30</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=3"); ?>" method = "post"><input type = "hidden" name = "subject" value = "3"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC08   " /></form></td>
        </tr>
        <tr>
            <td>Kontekstwalisadong Komunikasyon sa Filipino</td>
            <td>3</td>
            <td>8:30 – 9:30</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=4"); ?>" method = "post"><input type = "hidden" name = "subject" value = "4"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC10   " /></form></td>
        </tr>
        <tr>
            <td>Physical Fitness</td>
            <td>2</td>
            <td>11:30 – 13:30</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=5"); ?>" method = "post"><input type = "hidden" name = "subject" value = "5"/><input type = "submit" class = "btn btn-success" value = "    ADD PE01    " /></form></td>
        </tr>
        <tr>
            <td>Introduction To Computing</td>
            <td>2</td>
            <td>14:30 – 16:30</td>
            <td>MoWe</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=6"); ?>" method = "post"><input type = "hidden" name = "subject" value = "6"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE01   " /></form></td>
        </tr>
        <tr>
            <td>Introduction To Computing</td>
            <td>1</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=7"); ?>" method = "post"><input type = "hidden" name = "subject" value = "7"/><input type = "submit" class = "btn btn-success" value = "ADD ITE01(LAB)" /></form></td>
        </tr>
        <tr>
            <td>National Service Training Program 1</td>
            <td>3</td>
            <td>16:30 – 18:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=8"); ?>" method = "post"><input type = "hidden" name = "subject" value = "8"/><input type = "submit" class = "btn btn-success" value = "   ADD NST01   " /></form></td>
        </tr> 
		<tr>
		<td>2ND SEMESTER</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        <td>2ND SEMESTER</td>
		</tr>
        <tr>
            <td>Understanding The Self</td>
            <td>3</td>
            <td>10:20 - 11:20</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=9"); ?>" method = "post"><input type = "hidden" name = "subject" value = "9"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC02   " /></form></td>
        </tr>
        <tr>
            <td>Readings in the Philippine History</td>
            <td>3</td>
            <td>9:00 - 10:30</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=10"); ?>" method = "post"><input type = "hidden" name = "subject" value = "10"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC03   " /></form></td>
        </tr>
        <tr>
            <td>Purposive Communication</td>
            <td>3</td>
            <td>12:30 – 14:30</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=11"); ?>" method = "post"><input type = "hidden" name = "subject" value = "11"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC05   " /></form></td>
        </tr>
        <tr>
            <td>Filipino sa Iba’t Ibang Disiplina</td>
            <td>3</td>
            <td>10:00 – 12:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=12"); ?>" method = "post"><input type = "hidden" name = "subject" value = "12"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC11   " /></form></td>
        </tr>
        <tr>
            <td>Rhythmic Activities</td>
            <td>2</td>
            <td>7:30 – 9:30</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=13"); ?>" method = "post"><input type = "hidden" name = "subject" value = "13"/><input type = "submit" class = "btn btn-success" value = "    ADD PE02    " /></form></td>
        </tr>
        <tr>
            <td>Computer Programming 1</td>
            <td>2</td>
            <td>14:30 – 16:30</td>
            <td>MoWe</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=14"); ?>" method = "post"><input type = "hidden" name = "subject" value = "14"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE02   " /></form></td>
        </tr>
        <tr>
            <td>Computer Programming 1</td>
            <td>1</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=15"); ?>" method = "post"><input type = "hidden" name = "subject" value = "15"/><input type = "submit" class = "btn btn-success" value = "ADD ITE02(LAB)" /></form></td>
        </tr>
        <tr>
            <td>National Service Training Program 2</td>
            <td>3</td>
            <td>13:30 – 16:00</td>
            <td>Fr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=16"); ?>" method = "post"><input type = "hidden" name = "subject" value = "16"/><input type = "submit" class = "btn btn-success" value = "   ADD NST02   " /></form></td>
        </tr>
		</tbody>
    </table>
	<input type = "button" class = "btn btn-success" value = "ADD 1STYR1STSEM SUBJECTS" onclick = "addfirsty()" id = "add1y1st"/> <input type = "button" class = "btn btn-success" value = "ADD 1STYR2NDSEM SUBJECTS" onclick = "addfirsty2()" id = "add1y2nd" />
	</article>
	<article id = "table2" >
    <table class = "table table-responsive" id = "intable1">
	<thead class = "table table-info" align="center" id = "thead">
        <tr>
            <th>SUBJECT DESCRIPTION</th>
            <th>UNITS</th>
            <th>TIME</th>
            <th>SCHEDULE</th>
            <th>ACTION</th>
        </tr>
		</thead>
		<tbody class = "table table" align="center" id = 'tbody'>
		<tr>
            <td>The Life and the Works of Rizal</td>
            <td>3</td>
            <td>14:30 – 16:30</td>
            <td>MoWeFr</td>
            <td> <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=17"); ?>" method = "post"><input type = "hidden" name = "subject" value = "17"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC01   "  /></form> </td>
        </tr>
        <tr>
            <td>Ethics</td>
            <td>3</td>
            <td>9:00 – 10:30</td>
            <td>WeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=18"); ?>" method = "post"><input type = "hidden" name = "subject" value = "18"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC09   " /></form></td>
        </tr>
        <tr>
            <td>Human Computer Interaction</td>
            <td>3</td>
            <td>8:00 – 9:00</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=19"); ?>" method = "post"><input type = "hidden" name = "subject" value = "19"/><input type = "submit" class = "btn btn-success" value = "    ADD ITE03    " /></form></td>
        </tr>
        <tr>
            <td>Discrete Mathematics</td>
            <td>3</td>
            <td>15:00 – 16:30</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=20"); ?>" method = "post"><input type = "hidden" name = "subject" value = "20"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE04   " /></form></td>
        </tr>
        <tr>
            <td>Individual/Dual Sports</td>
            <td>2</td>
            <td>16:30 – 17:30</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=21"); ?>" method = "post"><input type = "hidden" name = "subject" value = "21"/><input type = "submit" class = "btn btn-success" value = "ADD PE03" /></form></td>
        </tr>
        <tr>
            <td>Computer Programming 2</td>
            <td>2</td>
            <td>11:30 - 13:30</td>
            <td>Th</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=22"); ?>" method = "post"><input type = "hidden" name = "subject" value = "22"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE05   " /></form></td>
        </tr>
        <tr>
            <td>Computer Programming 2 (LAB)</td>
            <td>1</td>
            <td>10:30 – 13:30</td>
            <td>Fr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=23"); ?>" method = "post"><input type = "hidden" name = "subject" value = "23"/><input type = "submit" class = "btn btn-success" value = "ADD ITE05(LAB)" /></form></td>
        </tr>
        <tr>
            <td>Visual Graphic Design</td>
            <td>2</td>
            <td>8:00 – 10:00</td>
            <td>Tu</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=24"); ?>" method = "post"><input type = "hidden" name = "subject" value = "24"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE06   " /></form></td>
        </tr>
        <tr>
            <td>Visual Graphic Design (LAB)</td>
            <td>1</td>
            <td>7:30 – 10:30</td>
            <td>Th</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=25"); ?>" method = "post"><input type = "hidden" name = "subject" value = "25"/><input type = "submit" class = "btn btn-success" value = "ADD ITE06(LAB)" /></form></td>
        </tr>
        <tr>
            <td>Database Management Systems 1</td>
            <td>2</td>
            <td>17:30 – 18:30</td>
            <td>MoFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=26"); ?>" method = "post"><input type = "hidden" name = "subject" value = "26"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE07   " /></form></td>
        </tr>
        <tr>
            <td>Database Management Systems 1 (LAB)</td>
            <td>1</td>
            <td>17:00 – 18:30</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=27"); ?>" method = "post"><input type = "hidden" name = "subject" value = "27"/><input type = "submit" class = "btn btn-success" value = "ADD ITE07(LAB)" /></form></td>
        </tr>
		<tr>
            <td>2ND SEMESTER</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>2ND SEMESTER</td>
        </tr>
        <tr>
            <td>Art Appreciation</td>
            <td>3</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td> <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=28"); ?>" method = "post"><input type = "hidden" name = "subject" value = "28"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC07   "  /></form> </td>
        </tr>
        <tr>
            <td>Literature of the Philippines</td>
            <td>3</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=29"); ?>" method = "post"><input type = "hidden" name = "subject" value = "29"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC13   " /></form></td>
        </tr>
        <tr>
            <td>Team Sports and Games</td>
            <td>2</td>
            <td>9:30 – 11:30</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=30"); ?>" method = "post"><input type = "hidden" name = "subject" value = "30"/><input type = "submit" class = "btn btn-success" value = "    ADD PE04    " /></form></td>
        </tr>
        <tr>
            <td>Data Structures and Algorithms</td>
            <td>2</td>
            <td>17:00 – 19:00</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=31"); ?>" method = "post"><input type = "hidden" name = "subject" value = "31"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE08   " /></form></td>
        </tr>
        <tr>
            <td>Data Structures and Algorithms</td>
            <td>1</td>
            <td>16:30 – 19:30</td>
            <td>Tu</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=32"); ?>" method = "post"><input type = "hidden" name = "subject" value = "32"/><input type = "submit" class = "btn btn-success" value = "ADD ITE08(LAB)" /></form></td>
        </tr>
        <tr>
            <td>Quantitative Methods</td>
            <td>2</td>
            <td>7:30 – 8:30</td>
            <td>MoWe</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=33"); ?>" method = "post"><input type = "hidden" name = "subject" value = "33"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE09   " /></form></td>
        </tr>
        <tr>
            <td>Quantitative Methods</td>
            <td>1</td>
            <td>10:30 – 13:30</td>
            <td>Fr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=34"); ?>" method = "post"><input type = "hidden" name = "subject" value = "34"/><input type = "submit" class = "btn btn-success" value = "ADD ITE09(LAB)" /></form></td>
        </tr>
        <tr>
            <td>Front-End Development</td>
            <td>2</td>
            <td>13:00 – 16:00</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=35"); ?>" method = "post"><input type = "hidden" name = "subject" value = "35"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE10   " /></form></td>
        </tr>
        <tr>
            <td>Front-End Development</td>
            <td>1</td>
            <td>13:30 – 16:30</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=36"); ?>" method = "post"><input type = "hidden" name = "subject" value = "36"/><input type = "submit" class = "btn btn-success" value = "ADD ITE10(LAB)" /></form></td>
        </tr>
        <tr>
            <td>Database Management Systems 2</td>
            <td>2</td>
            <td>17:00 – 19:00</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=37"); ?>" method = "post"><input type = "hidden" name = "subject" value = "37"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE11   " /></form></td>
        </tr>
        <tr>
            <td>Database Management Systems 2</td>
            <td>1</td>
            <td>16:30 – 19:30</td>
            <td>Th</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=38"); ?>" method = "post"><input type = "hidden" name = "subject" value = "38"/><input type = "submit" class = "btn btn-success" value = "ADD ITE11(LAB)" /></form></td>
        </tr>
		</tbody>
    </table>
<input type = "button" class = "btn btn-success" value = "ADD 2NDYR1STSEM SUBJECTS" onclick = "addsecondy()" id = "add2y1st" /> <input type = "button" class = "btn btn-success" value = "ADD 2NDYR2NDSEM SUBJECTS" onclick = "addsecondy2()" id = "add2y2nd" />

		</article>
			<?php echo "<script> 
function dashboard() {
	window.location.href = 'penrollsetsubject.php?student_number=$studnum';
}

function delall() {
	window.location.href = 'penrolldeleteallsubj2.php?student_number=$studnum';
}
function addfirsty() {
	window.location.href = 'penrolladd1styear1st.php?student_number=$studnum';
}
function addfirsty2() {
	window.location.href = 'penrolladd1styear2nd.php?student_number=$studnum';
}
function addsecondy() {
	window.location.href = 'penrolladd2ndyear1st.php?student_number=$studnum';
}
function addsecondy2() {
	window.location.href = 'penrolladd2ndyear2nd.php?student_number=$studnum';
}
</script>"
			?>
		                                                                
		</div>
	</div>
	</div>
	</div>
<?php 
require_once "penrollconfig.php";
$sqlsubj = "SELECT * FROM subject_info WHERE student_number = '$studnum'" ;
					if($resultsubj = mysqli_query($link, $sqlsubj)){
						if(mysqli_num_rows($resultsubj) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table3">';
								echo "<thead class = 'table table-info' id = 'thead' >";
									echo "<tr>";
										echo "<th width=200px>Student Number</th>";
										echo "<th>Subject Code</th>";
										echo "<th width=562px>Subject Description</th>";
										echo "<th>Units</th>";
										echo "<th>Section</th>";
										echo "<th>Schedule</th>";
										echo "<th>Time</th>";
										echo "<th>Action</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table' id = 'tbody'>";
								while($rowsubj = mysqli_fetch_array($resultsubj)){
									echo "<tr>";
										echo "<td>" . $rowsubj['student_number'] . "</td>";
										echo "<td>" . $rowsubj['subject_code'] . "</td>";
										echo "<td>" . $rowsubj['subject_desc'] . "</td>";
										echo "<td>" . $rowsubj['units'] . "</td>";
										echo "<td>" . $rowsubj['section'] . "</td>";
										echo "<td>" . $rowsubj['day'] . "</td>";
										echo "<td>" . $rowsubj['time'] . "</td>";
										echo "<td>";
											echo '<a href="penrolldeletesubj2.php?subjectid=' . $rowsubj['subjectid'] . "&student_number=" . $rowsubj['student_number'] . '" class = "mr-3" title = "Delete Record" data-toggle="tooltip"><span class="deleteicon">DELETE</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($resultsubj);
						}
						else {
							echo '<div class ="alert alert-danger" align="center"><b>NO SUBJECTS ADDED.</b></div>';
						}
						}
					else {
						echo "Oops! Something wnet wrong. Please try again later.";
					}
					
					mysqli_close($link);
?>
</body>
</html>