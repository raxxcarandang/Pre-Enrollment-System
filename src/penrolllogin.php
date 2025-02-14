<?php 
require_once "penrollconfig.php";
$user = $pass = NULL;
if (isset($_POST["user"]) && !empty($_POST["user"])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$checklog = "SELECT * FROM login_info";
$querylogin = mysqli_query($link, $checklog);
		while($checklogin = mysqli_fetch_array($querylogin)) {
			$fail = 0;
			if ($user === $checklogin['user'] && $pass === $checklogin['pass']) {
			$studnum = $checklogin['student_number'];
			$checkname = "SELECT * FROM student_info WHERE student_number = '$studnum'";
			$queryname = mysqli_query($link, $checkname);
			while($name= mysqli_fetch_array($queryname)) {
				$fname = $name['student_name'];
			}
				if ($checklogin['type'] === "STUDENT") {
				echo "<script>alert('WELCOME! $fname')</script>"; 
				header("location: penrollstudent.php?student_number=$studnum");
				} else if ($checklogin['type'] === "ADMIN") {
				header("location: penrolladmin.php");
				echo "<script>alert('WELCOME! $fname')</script>"; 
				} else {
					$fail = 1;
				}
				
			}
		}
		mysqli_free_result($querylogin);
		mysqli_close($link);
	if ($fail = 1) {
		echo "<script>alert('INVALID USERNAME OR PASSWORD')</script>"; 
	}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <meta charset=utf-8>
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href= "css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/penrolllogin.css">
<link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,900&display=swap"
        rel="stylesheet">

</head>

<body>

  <div class="huhu"> <header style = "color: #28a745" ;><h1><strong>PRE-ENROLLMENT</strong></h1></header></div> 
    <form id="bfv" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
        <label for="username"> <b> Username: </b> </label>
        <input type="text" name = "user" class = "form-control" id="username" label placeholder="Username" required>
        <label for="password"><b>Password:</b> </label>
        <input type="password" name = "pass" class = "form-control" id="password" placeholder="Password" required>
		<input type="submit" class= "btn btn-success" value="Login" id = "button" />
		<input type="button" class= "btn btn-danger" onclick="erase()" value="Clear"  id = "button"/>
		<input type="button" class= "btn btn-success" onclick="preenroll()" value="Pre-Enroll" id = "button"/>
    </form>

<?php
	echo "<script type='text/javascript'>
        function validate_input() {
            event.preventDefault();
            var form = document.getElementById('bfv')
            var username = document.getElementById('username')
            var password = document.getElementById('password')

			if (username.value == '' || password.value == '') {
                alert('Fields cannot be blank!');
                return false;
            } 
        }
		function preenroll() {
			window.location.href = 'penrollstart.php';
		}
		function erase() {
		document.getElementById('username').value = '';
        document.getElementById('password').value = '';
		}
    </script>";
	?>
<footer>© 2023 | Southern Luzon State University  Philippines</footer>
</body>

</html>