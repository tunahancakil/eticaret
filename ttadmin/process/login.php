<?php 
	session_start();
	include("../connect/connection.php");
	if (isset($_POST['login'])==true) {
		$username = $_POST['USERNAME'];
		$password = md5($_POST['PASSWORD']);

		if ($username && $password) {
			$sql_admin = "SELECT * FROM user WHERE ACTIVE = 1 AND USERNAME = '".$username."' AND PASSWORD = '".$password."' ";
            $result_admin = mysqli_query($conn,$sql_admin);			
			$sql_count = mysqli_num_rows($result_admin);

			if ($sql_count > "0") {
				$_SESSION['USER'] = $username;
				header('Location:../index.php');
			} else {
				header('Location:../login.php?action=no');
			}
		}
	}
?>