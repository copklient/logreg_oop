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
						<td><input type="text" name="uname" placeholder="User Name" required maxlength="15"/></td>
					</tr>
					<tr>
						<td><input type="email" name="email" placeholder="Your Email" required maxlength="30"/></td>
					</tr>
					<tr>
						<td><input type="password" name="pass" placeholder="Your Password" required maxlength="12"/></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
					</tr>
					<tr>
						<td><a href="index.php">Sign In Here</a></td>
					</tr>
				</table>
					<?php
						session_start();
						if(isset($_SESSION['user']))
						{
							header("Location: home.php");
						}

						if(isset($_POST['btn-signup']))
						{
							$uname = $_POST['uname'];
							$email = $_POST['email'];
							$upass = $_POST['pass'];

							if(!empty($uname) && !empty($email) && !empty($upass)){
								require_once 'user.class.php';
								$User = new User();	

								$result = $User->registration(['user_email'=>$email,'user_pass'=>$upass,'user_name'=>$uname]);		
							}
							else{
								echo "<h2 class='danger'>Please enter all</h2>";
							}
						}
					?>
			</form>
		</div>
	</center>
</body>
</html>