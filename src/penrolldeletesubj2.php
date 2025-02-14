<?php 
	require_once "penrollconfig.php";
	
		$studnum = trim($_GET["student_number"]);
		$sqldelsub = "DELETE FROM `subject_info` WHERE subjectid = ?";
		
		if($stmtdelsub = mysqli_prepare($link, $sqldelsub)){
			mysqli_stmt_bind_param($stmtdelsub, "s", $setsubj);
			$setsubj = trim($_GET["subjectid"]);
			
			if (mysqli_stmt_execute($stmtdelsub)) {
			header("location: penrolladdsub.php?student_number=$studnum&subject=0");
			}
		}
		
		mysqli_stmt_close($stmtdelsub);
		mysqli_close($link);

	?>