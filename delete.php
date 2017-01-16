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
      .post{
        border: 1px solid;
        margin: 0 auto;
        margin-left: 100px;
        margin-right: 100px;
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
            <a href="posts.php">Post Add</a>
            &nbsp;
            <a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
<div id="body">
    <?php 
    if(!isset($_SESSION['username']))
    {
      header("Location: index.php");
    }
    if(isset($_SESSION['user_id'])){
        require_once 'user.class.php';
        $User = new User();

        $result = $User->postshow();
        $delresult = $User->postdel();
      }
     ?>
</div>


</body>
</html>