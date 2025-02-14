<?php

require_once "penrollconfig.php";

$studnum = trim($_GET['student_number']);
$temp = "";
$inc = "";
$i = 0;
$subjid = "";
$subject = "";
$stop = "";

if ($stop == 1) {
	$stop = 0;
}

$subject = trim($_GET['subject']);
	switch($subject) {
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
					
					case 9:
					$scode = "GEC 07";
					$section = "FL (Le)";
					$sdesc = "Art Appreciation";
					$units = "3";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 10:
					$scode = "GEC 13";
					$section = "FL (Le)";
					$sdesc = "Literature of the Philippines";
					$units = "3";
					$day = "TuTh";
					$time = "13:30 – 16:00";
					break;
					
					case 11:
					$scode = "PE 004";
					$section = "FL (Le)";
					$sdesc = "Team Sports and Games";
					$units = "2";
					$day = "We";
					$time = "9:30 – 11:30";
					break;
					
					case 12:
					$scode = "ITE 08";
					$section = "FL (Le)";
					$sdesc = "Data Structures and Algorithms";
					$units = "2";
					$day = "Mo";
					$time = "17:00 – 19:00";
					break;
					
					case 13:
					$scode = "ITE 08";
					$section = "FL (Lab)";
					$sdesc = "Data Structures and Algorithms (LAB)";
					$units = "1";
					$day = "Tu";
					$time = "17:00 – 19:00";
					break;
					
					case 14:
					$scode = "ITE 09";
					$section = "FL (Le)";
					$sdesc = "Quantitative Methods";
					$units = "2";
					$day = "MoWe";
					$time = "7:30 – 8:30";
					break;
					
					case 15:
					$scode = "ITE 09";
					$section = "FL (Lab)";
					$sdesc = "Quantitative Methods (LAB)";
					$units = "1";
					$day = "Fr";
					$time = "10:30 – 13:30";
					break;
					
					case 16:
					$scode = "ITE 10";
					$section = "FL (Le)";
					$sdesc = "Front-End Development";
					$units = "2";
					$day = "Mo";
					$time = "13:00 – 16:00";
					break;
					
					case 17:
					$scode = "ITE 10";
					$section = "FL (Lab)";
					$sdesc = "Front-End Development (LAB)";
					$units = "1";
					$day = "We";
					$time = "13:30 – 16:30";
					break;
					
					case 18:
					$scode = "ITE 11";
					$section = "FL (Le)";
					$sdesc = "Database Management Systems 2";
					$units = "2";
					$day = "We";
					$time = "17:00 – 19:00";
					break;
					
					case 19:
					$scode = "ITE 11";
					$section = "FL (Lab)";
					$sdesc = "Database Management Systems 2 (LAB)";
					$units = "1";
					$day = "Th";
					$time = "16:30 – 19:30";
					break;
				}
				
	if(isset($_GET['subject']) && !empty($_GET['subject'])) {
		$sqlsubjinc = "SELECT * FROM `subject_info`";
		$temp = mysqli_query($link, $sqlsubjinc);
		while ($query = mysqli_fetch_assoc($temp)) {
			$inc++;
			$i = $i + 1;
			
			if ($inc == $i) {
			++$inc;
			}
		}
		if ($inc == $i) {
			++$inc;
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
			$subjectid = $subjid . $inc;
			$stop = 0;
		$sqlsubj = "INSERT INTO `subject_info`(`subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$sqlchecksub = 'SELECT `subject_code` FROM `subject_info` WHERE `student_number` = "$studnum"';
		$sqlquerycsub = mysqli_query($link, $sqlchecksub);
		while($checksub = mysqli_fetch_array($sqlquerycsub)) {
			if ($scode === $checksub['subject_code']) {
				$stop = 1;
			}
		}
		mysqli_free_result($sqlquerycsub);
		if ($stop = 1) {
			echo "<script>alert('SUBJECT IS ALREADY ASSIGNED TO STUDENT#$studnum's RECORD');</script>";
		}

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

		//mysqli_close($link);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href = "bootstrap.min.css">
<?php 
require_once "penrollconfig.php";
$sqlsubj = "SELECT * FROM subject_info WHERE student_number = '$studnum'" ;
					if($resultsubj = mysqli_query($link, $sqlsubj)){
						if(mysqli_num_rows($resultsubj) > 0) {
							echo '<table class="table table-bordered table=striped" id = "outtable2">';
								echo "<thead class = 'table table-info'>";
									echo "<tr>";
										echo "<th>Student Number</th>";
										echo "<th>Subject Code</th>";
										echo "<th>Subject Description</th>";
										echo "<th>Units</th>";
										echo "<th>Section</th>";
										echo "<th>Schedule</th>";
										echo "<th>Time</th>";
										echo "<th>Action</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table table-dark'>";
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
</head>
	<style>
		article {
			display: inline-block;
			float: left;
			margin: auto;
			width: auto;
			height: auto;
		}
		body {
			background-image: url(img/slsufield.jpg);
			background-size: 150% 150%;
			background-repeat: no-repeat;
		}
		.wrapper{
			width: 1080px;
			height: 1000px;
			margin: 0 auto;
		}
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
		#table1 {
			display: inline-block;
			clear: both;
			width: 49%;
			height: 50%;
			margin: 0px -70px 0px;

		}
		#table2 {
			display: inline-block;
			clear: both;
			width: 49%;
			height: 100%;
			margin: 0px 70px 0px;

		}
	</style>
<body>
                                                                                                               <input type = "button" class = "btn btn-danger" value = "RETURN TO SUBJECT MANAGEMENT" onclick = "dashboard()" /> 
<input type = "button" class = "btn btn-danger" value = "DELETE ALL SUBJECTS" onclick = "delall()" />
	<div class = "wrapper">
	<div class = "controller-fluid">
	<div class = "row">
	<article id = "table1" >
    <table class = "table col-1 mx-auto">
	<thead class = "table table-info" align="center">
        <tr>
            <th>CODE</th> 
            <th>SECTION</th> 
            <th>SUBJECT DESCRIPTION</th>
            <th>UNITS</th>
            <th>TIME</th>
            <th>SCHEDULE</th>
            <th>ACTION</th>
        </tr>
		</thead>
		<tbody class = "table table-dark" align="center">
        <tr>
            <td>GEC 07</td>
            <td>FL (Le)</td>
            <td>Art Appreciation</td>
            <td>3</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td> <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=9"); ?>" method = "post"><input type = "hidden" name = "subject" value = "9"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC07   "  /></form> </td>
        </tr>
        <tr>
            <td>GEC 13</td>
            <td>FL (Le)</td>
            <td>Literature of the Philippines</td>
            <td>3</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=10"); ?>" method = "post"><input type = "hidden" name = "subject" value = "10"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC13   " /></form></td>
        </tr>
        <tr>
            <td>PE 04</td>
            <td>FL (Le)</td>
            <td>Team Sports and Games</td>
            <td>2</td>
            <td>9:30 – 11:30</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=11"); ?>" method = "post"><input type = "hidden" name = "subject" value = "11"/><input type = "submit" class = "btn btn-success" value = "    ADD PE04    " /></form></td>
        </tr>
        <tr>
            <td>ITE 08</td>
            <td>FL (Le)</td>
            <td>Data Structures and Algorithms</td>
            <td>2</td>
            <td>17:00 – 19:00</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=12"); ?>" method = "post"><input type = "hidden" name = "subject" value = "12"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE08   " /></form></td>
        </tr>
        <tr>
            <td>ITE 08</td>
            <td>FL (Lab)</td>
            <td>Data Structures and Algorithms</td>
            <td>1</td>
            <td>16:30 – 19:30</td>
            <td>Tu</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=13"); ?>" method = "post"><input type = "hidden" name = "subject" value = "13"/><input type = "submit" class = "btn btn-success" value = "ADD ITE08(LAB)" /></form></td>
        </tr>
        <tr>
            <td>ITE 09</td>
            <td>FL (Le)</td>
            <td>Quantitative Methods</td>
            <td>2</td>
            <td>7:30 – 8:30</td>
            <td>MoWe</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=14"); ?>" method = "post"><input type = "hidden" name = "subject" value = "14"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE09   " /></form></td>
        </tr>
        <tr>
            <td>ITE 09</td>
            <td>FL (Lab)</td>
            <td>Quantitative Methods</td>
            <td>1</td>
            <td>10:30 – 13:30</td>
            <td>Fr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=15"); ?>" method = "post"><input type = "hidden" name = "subject" value = "15"/><input type = "submit" class = "btn btn-success" value = "ADD ITE09(LAB)" /></form></td>
        </tr>
        <tr>
            <td>ITE 10</td>
            <td>FL (Le)</td>
            <td>Front-End Development</td>
            <td>2</td>
            <td>13:00 – 16:00</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=16"); ?>" method = "post"><input type = "hidden" name = "subject" value = "16"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE10   " /></form></td>
        </tr>
        <tr>
            <td>ITE 10</td>
            <td>FL (Lab)</td>
            <td>Front-End Development</td>
            <td>1</td>
            <td>13:30 – 16:30</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=17"); ?>" method = "post"><input type = "hidden" name = "subject" value = "17"/><input type = "submit" class = "btn btn-success" value = "ADD ITE10(LAB)" /></form></td>
        </tr>
        <tr>
            <td>ITE 11</td>
            <td>FL (Le)</td>
            <td>Database Management Systems 2</td>
            <td>2</td>
            <td>17:00 – 19:00</td>
            <td>We</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=18"); ?>" method = "post"><input type = "hidden" name = "subject" value = "18"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE11   " /></form></td>
        </tr>
        <tr>
            <td>ITE 11</td>
            <td>FL (Lab)</td>
            <td>Database Management Systems 2</td>
            <td>1</td>
            <td>16:30 – 19:30</td>
            <td>Th</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=19"); ?>" method = "post"><input type = "hidden" name = "subject" value = "19"/><input type = "submit" class = "btn btn-success" value = "ADD ITE11(LAB)" /></form></td>
        </tr>
		</tbody>
    </table>
		</article>
				<article id = "table2" >

	  <table class = "table">
	  <thead class = "table table-info" align="center">
        <tr>
            <th>CODE</th>
            <th>SECTION</th>
            <th>SUBJECT DESCRIPTION</th>
            <th>UNITS</th>
            <th>TIME</th>
            <th>SCHEDULE</th>
            <th>ACTION</th>
        </tr>
		</thead>
		<tbody class = "table table-dark table=striped" align="center">
        <tr>
            <td>GEC 02</td>
            <td>FL (Le)</td>
            <td>Understanding The Self</td>
            <td>3</td>
            <td>10:20 - 11:20</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=1"); ?>" method = "post"><input type = "hidden" name = "subject" value = "1"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC02   " /></form></td>
        </tr>
        <tr>
            <td>GEC 03</td>
            <td>FL (Le)</td>
            <td>Readings in the Philippine History</td>
            <td>3</td>
            <td>9:00 - 10:30</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=2"); ?>" method = "post"><input type = "hidden" name = "subject" value = "2"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC03   " /></form></td>
        </tr>
        <tr>
            <td>GEC 05</td>
            <td>FL (Le)</td>
            <td>Purposive Communication</td>
            <td>3</td>
            <td>12:30 – 14:30</td>
            <td>MoWeFr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=3"); ?>" method = "post"><input type = "hidden" name = "subject" value = "3"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC05   " /></form></td>
        </tr>
        <tr>
            <td>GEC 11</td>
            <td>FL (Le)</td>
            <td>Filipino sa Iba’t Ibang Disiplina</td>
            <td>3</td>
            <td>10:00 – 12:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=4"); ?>" method = "post"><input type = "hidden" name = "subject" value = "4"/><input type = "submit" class = "btn btn-success" value = "   ADD GEC11   " /></form></td>
        </tr>
        <tr>
            <td>PE 002</td>
            <td>FL (Le)</td>
            <td>Rhythmic Activities</td>
            <td>2</td>
            <td>7:30 – 9:30</td>
            <td>Mo</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=5"); ?>" method = "post"><input type = "hidden" name = "subject" value = "5"/><input type = "submit" class = "btn btn-success" value = "    ADD PE02    " /></form></td>
        </tr>
        <tr>
            <td>ITE 02</td>
            <td>FL (Le)</td>
            <td>Computer Programming 1</td>
            <td>2</td>
            <td>14:30 – 16:30</td>
            <td>MoWe</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=6"); ?>" method = "post"><input type = "hidden" name = "subject" value = "6"/><input type = "submit" class = "btn btn-success" value = "   ADD ITE02   " /></form></td>
        </tr>
        <tr>
            <td>ITE 02</td>
            <td>FL (Lab)</td>
            <td>Computer Programming 1</td>
            <td>1</td>
            <td>13:30 – 16:00</td>
            <td>TuTh</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=7"); ?>" method = "post"><input type = "hidden" name = "subject" value = "7"/><input type = "submit" class = "btn btn-success" value = "ADD ITE02(LAB)" /></form></td>
        </tr>
        <tr>
            <td>NST 02</td>
            <td>FL (Le)</td>
            <td>National Service Training Program 2</td>
            <td>3</td>
            <td>13:30 – 16:00</td>
            <td>Fr</td>
            <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?student_number=$studnum&subject=8"); ?>" method = "post"><input type = "hidden" name = "subject" value = "8"/><input type = "submit" class = "btn btn-success" value = "   ADD NST02   " /></form></td>
        </tr>
		</tbody>
    </table>
	</article>
			<br><br><br>
			<?php echo "<script> 
function dashboard() {
	window.location.href = 'penrollsetsubject.php?student_number=$studnum';
}
function delall() {
	window.location.href = 'penrolldeleteallsubj2.php?student_number=$studnum';
}
</script>"
			?>
		                                                                
		</div>
	</div>
	</div>
	</div>
	<br><br>
</body>
</html>