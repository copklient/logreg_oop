<?php 

	class User{

		public function Login(array $login){

			if(!empty($login)){
				
				require_once 'dbconnect.php';
				$db = new db();

				$email = $_POST['email'];
				$upass = $_POST['pass'];

				$login = $db->select(['user_email'=>$email,'user_pass'=>$upass]);
				
			}
			else{
				echo "<h2 class='danger'> Username or Password invalid</h2>";
			}
		}

		public function logout(){
			if(isset($_GET['logout']))
			{
				session_destroy();
				header("Location: index.php");
			}
		}

		public function registration(array $register){
			// require_once 'dbconnect.php';
			// $db = new db();
			if(!empty($register)){
				require_once 'dbconnect.php';
				$db = new db();
				
				$email = $_POST['email'];
				$upass = $_POST['pass'];
				$uname = $_POST['uname'];
				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				    // echo("$email is a valid email address");
				    $result = $db->insert(['user_email'=>$email,'user_pass'=>$upass,'user_name'=>$uname]);

						if($result) {
							echo "<h2 class='successfully'>Successfully registered</h2>";
						}
						 else {
							echo "<h2 class='danger'>Email used</h2><br><h2 class='danger'>".$_POST['email']."</h2>";	
						}		
				} else {
				  echo("<h2 class='danger'>$email is not a valid email address</h2>");
				}

				
			}
		}
		public function postadd(array $post){
			require_once 'dbconnect.php';
			$db = new db();

			$story = $_POST['story'];
			$name = $_POST['name'];

			if(!empty($story) && !empty($name) && !empty($_SESSION['user_id'])){

				$result = $db->postadd(['author_name'=>$_SESSION['username'],'post_name'=>$name,'post_content'=>$story]);	

				if($result) {
					echo "<h2 class='successfully'>Post added</h2>";
				}
				 else {
					echo "<h2 class='danger'>Post is invalid</h2>";	
				}	
			}
			else {
					echo "<h2 class='danger'>Post is invalid</h2>";	
			}
		}
		public function postshow(){
			require_once "dbconnect.php";
			$db = new db();

			$result = $db->postshow();	

			return $result;

		}
		public function edit(array $post){
			require_once 'dbconnect.php';
			$db = new db();

			$story = $_POST['story'];
			$name = $_POST['name'];

			if(!empty($story) && !empty($name)){

				$result = $db->edit(['post_name'=>$name,'post_content'=>$story]);	
				if($result) {
					echo "<h2 class='successfully'>Post edit</h2>";
				}
				 else {
					echo "<h2 class='danger'>Post is invalid</h2>";	
				}	
			}
			else {
					echo "<h2 class='danger'>Post is invalid</h2>";	
			}
		}
		public function postdel(){
			require_once 'dbconnect.php';
			$db = new db();

			$result = $db->del();
		}
		public function editarray(){
			require_once 'dbconnect.php';
			$db = new db();

			$result = $db->editarray();
		}
	}

 ?>