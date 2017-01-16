<?php 
	session_start();

	 if(!isset($_SESSION['user_id']))
    {
    	header("Location: index.php");
    }
 ?>
 <html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
    h2{
        color: lightblue;
        transition: color 2s;
    }
    h2:hover{
        color: gold;
    }
      form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
      form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
      form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
      #messages { list-style-type: none; margin: 0; padding: 0; }
      #messages li { padding: 5px 10px; }
      #messages li:nth-child(odd) { background: #eee; }
      .post{
        width: 100%;
      }
      .post input{
        margin: 0 auto;
        float: left;
      }
    </style>
</head>
<body>
	<?php 
		require_once 'user.class.php';
		$User = new User();

		?>
<div id="header">
	<div id="left">
        <label>BeeOnCode</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $_SESSION["username"]; ?>&nbsp;
            <a href="home.php">Home</a>
            &nbsp;
            <a href="postshow.php">Posts</a>
            &nbsp;
            <a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
<div id="body">
    <?php 
    if(isset($_POST['add'])){
        
        require_once 'user.class.php';
        $User = new User();

        $story = $_POST['story'];
        $name = $_POST['name'];
        $uname = $_SESSION['username'];

        $result = $User->postadd(['author_id'=>$_SESSION['user_id'],'user_name'=>$uname,'post_name'=>$name,'post_content'=>$story]);

    }
     ?>
    <form name="form1" method="post">
  <table width="50%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;" class="post">
        <input type="hidden" name="<?php $result['user_id']; ?>">
    <tr> 
      <td width="50%">Name</td>
      <td><input name="name" type="text" id="name"></td>
    </tr>
    <tr> 
      <td>News Story</td>
      <td><!-- <textarea name="story" id="story"></textarea> --><input name="story" type="text" id="story"></td>
    </tr>
    <tr> 
        <td colspan="2">
            <div align="center">
              <input name="hiddenField" type="hidden" value="add_n">
              <input name="add" type="submit" id="add" value="Submit">
            </div>
        </td>
    </tr>
  </table>
</div>


</body>
</html>