<?php
session_start();

require_once 'user.class.php';

$User = new User();

$logout = $User->logout();
?>