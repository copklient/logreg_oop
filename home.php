<?php
    session_start();

    if(!isset($_SESSION['username']))
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
    a{
        text-decoration: none;
    }
    </style>
</head>
<body>
<div id="header">
	<div id="left">
        
        <label>BeeOnCode</label>
    
    </div>
    <div id="right">
    	<div id="content">
            <?php 
                require 'dbconnect.php';
                $db = new db();
             ?>
        	hi' <?php echo $_SESSION["username"] ?>&nbsp;
            <a href="posts.php">Post Add</a>
            &nbsp;
            <a href="postshow.php">Posts</a>
            &nbsp;
            <a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
    <img src="beeoncode.jpg">
    <h2>Welcome to BeeOnCode <?php echo $_SESSION["username"]; ?></h2>
    
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

</body>
</html>