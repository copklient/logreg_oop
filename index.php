<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
	<div id="login-form">
	<form method="post">
		<table align="center" width="30%" border="0">
		<tr>
		<td><input type="email" name="email" placeholder="Your Email" required maxlength="30"/></td>
		</tr>
		<tr>
		<td><input type="password" name="pass" placeholder="Your Password" required maxlength="12"/></td>
		</tr>
		<tr>
		<td><button type="submit" name="btn-login">Sign In</button></td>
		</tr>
		<tr>
		<td><a href="register.php">Sign Up Here</a></td>
		</tr>
		</table>
		<?php
			

			if(isset($_SESSION['user']))
			{
				header("Location: home.php");
			}

			 if(isset($_POST['btn-login']))
			 {
			 	session_start();
			 	require_once 'user.class.php';

			 	$User = new User();

			 	$email = $_POST['email'];
				$upass = $_POST['pass'];

				$result = $User->login(['user_email'=>$email,'user_pass'=>$upass]);

			 }
		?>
	</form>
	</div>
	</center>
</body>
</html>