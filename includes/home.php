<?php 
session_start();
include_once 'class_admin.php';
$user = new Admin(); $ID = $_SESSION['ID'];
if (!$admin->get_session()){
 header("location:login.php");
}

if (isset($_GET['q'])){
 $user->user_logout();
 header("location:login.php");
 }

?>