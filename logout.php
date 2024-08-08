<?php session_start();
	
	if(isset($_SESSION['login'])){
		unset($_SESSION['login']);
        unset($_SESSION['id_user']);
        unset($_SESSION['role']);
		unset($_SESSION['username']);
        unset($_SESSION['email']);
		session_destroy();

		header("location: index.php");
	}

?>