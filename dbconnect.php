<?php
class DB{
	private $mysqli;

	public function __construct(){
		$this->mysqli = mysqli_connect("localhost","root","","dbtest") or die(mysqli_connect_error());
	}

	public function insert(array $insert){
		$fileds = '';
		$values = '';
		foreach ($insert as $field => $value) {
			$fileds .= $field.",";
			$values .= "'".$value."',";
		}
		// mysqli_reale_escape_string();
		$fileds = rtrim($fileds,",");
		$values = rtrim($values,",");

		$query = "INSERT INTO `users` ($fileds) VALUES($values)";
		$result = $this->mysqli->query($query);
		return $result;
	}
	public function select(array $select){
		$fileds = '';
		$values = '';
		foreach ($select as $field => $value) {
			$values .= $field."='".$value."' AND ";
		}
		$values = rtrim($values," AND ");
			
		// mysqli_reale_escape_string();
		
		$selectQuery = "SELECT `user_id`,`user_name`,`user_email` FROM `users` WHERE $values";
		$answer = mysqli_query($this->mysqli, $selectQuery);
		if($answer){
			echo "<h2 class='danger'> Username or Password invalid</h2>";
		}

		if($answer->num_rows == 1){
			$row = mysqli_fetch_assoc($answer);	
			if($row){
				$_SESSION["username"] = $row['user_name'];
				$_SESSION['user_id'] = $row['user_id'];
				// $_SESSION['user_email'] = $row['user_email'];
				header("Location: home.php");

			}
		} else if($answer->num_rows == 0) {
			return false;
			echo "<h2 class='danger'> Username or Password invalid</h2>";
		} else {
			while($row = mysqli_fetch_assoc($answer) ) {
				// do
			}
		}
		return $row;
	}
	public function postadd(array $postadd){
		$fileds = '';
		$values = '';
		foreach ($postadd as $field => $value) {
			$fileds .= '`'.$field."`,";
			$values .= "'".$value."',";
		}
		// mysqli_reale_escape_string();
		$fileds = rtrim($fileds,",");
		$values = rtrim($values,",");

		$query = "INSERT INTO `posts` ($fileds) VALUES ($values)";
		$result = $this->mysqli->query($query);
		return $result;
	}
	public function postshow(){			
		// $fileds = '';
		// $values = '';
		// foreach ($postadd as $field => $value) {
		// 	$fileds .= '`'.$field."`,";
		// 	$values .= "'".$value."',";
		// }
		

		$select = "SELECT `id`,`post_name`,`post_content`,`author_name` FROM `posts`";
		$answer = mysqli_query($this->mysqli, $select);

		// $select1 = "SELECT `user_name` FROM `users`";
		// $answer1 = mysqli_query($this->mysqli, $select1);
		// $author_id = $select['author_id'];
		
		
			
		if($answer->num_rows == 1){
			$row = mysqli_fetch_assoc($answer);	
			$post_id = $row['id'];
			
				echo "<div class='post'><h2 class='name'>".$row['post_name']."</h2><h3 class='content'>".$row['post_content']."</h3><h2 class='admin'>Author: ".$row['author_name']."</h2><form action='#' method='get'><a href='edit.php?id=".$row['id']."'>Edit  </a><a href='delete.php?id=".$row["id"]."'>Delete</a></div>";
		} else if($answer->num_rows == 0) {
			echo "<h2 class='danger'> Post not found</h2>";
			return false;
		}else if($answer->num_rows == 0){
			echo "<h2 class='danger'> Post not found</h2>";
		}else {	
			while($row = mysqli_fetch_assoc($answer)) {	
				$post_id = $row['id'];		
				echo "<div class='post'><h2 class='name'>".$row['post_name']."</h2><h3 class='content'>".$row['post_content']."</h3><h2 class='admin'>Author: ".$row['author_name']."</h2><form action='#' method='get'><a href='edit.php?id=".$row['id']."'>Edit  </a><a href='delete.php?id=".$row["id"]."'>Delete</a></div>";
			}

		}
		return $row;
	}
	public function edit(array $edit){	
		$fileds = '';
		$values = '';
		foreach ($edit as $field => $value) {
			$values .= '`'.$field."`='".$value."', ";
		}
		$values = rtrim($values,", ");

		// mysqli_reale_escape_string();
		$fileds = rtrim($fileds,",");
		$values = rtrim($values,",");

		$id = $_GET['id'];

		$query = "UPDATE `posts` SET $fileds $values WHERE `id`=$id";
		$result = $this->mysqli->query($query);
		return $result;
		return $row;
	}
	public function del(){
		$url = $_GET['id'];

		$query = "DELETE FROM `posts` WHERE `id`=$url";
		$result = $this->mysqli->query($query);
	}
	public function editarray(){
		$id = $_GET['id'];
		$select = "SELECT `id`,`post_name`,`post_content` FROM `posts` WHERE `id`=$id";
		$answer = mysqli_query($this->mysqli, $select);
		$row = mysqli_fetch_assoc($answer);	
		$_SESSION['post_name'] = $row['post_name'];
		$_SESSION['post_content'] = $row['post_content'];
	}

}
?>